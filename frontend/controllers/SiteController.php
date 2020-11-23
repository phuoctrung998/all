<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\View;
use yii\web\Request;
use yii\db\Expression;
use yii\db\Query;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Session;
use frontend\models\ServerModel;
use yii\web\Cookie;
use common\models\Settings;
use common\models\Search;
use frontend\models\NewsModel;
use Facebook\Facebook;
use frontend\models\GlobalModel;
use frontend\components\FrontendController;
use frontend\models\SystemConfigModel;
use frontend\models\SliderModel;
/**
 * Site controller
 */
class SiteController extends FrontendController
{
    /**
     * @inheritdoc
     */
	
	public $fb;
	public $permissions;
	public $gg;
	
	
	public function __construct($id, $module, $config = []) {
		$this->fb = new Facebook([
            'app_id' 		=> Yii::$app->params['facebook_appid'],
            'app_secret' 	=> Yii::$app->params['facebook_secret'],
        ]);
        $this->permissions = ['email, public_profile'];

        $this->gg = new \Google_Client();
        $this->gg->setApplicationName('Login to ThongLinhSuH5.Com');
        $this->gg->setClientId(Yii::$app->params['google_clientid']);
        $this->gg->setClientSecret(Yii::$app->params['google_client_secret']);
        $this->gg->setRedirectUri(cparams('google_redirect_url'));
        $this->gg->addScope("email");
        $this->gg->addScope("profile");
        parent::__construct($id, $module, $config);
		
	}

	public function beforeAction($action) {
		if (!parent::beforeAction($action)) {
			return false;
		}

		return true;
	}	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		/** Ip được phép vào coi teaser trước khi open **/
		$globalModel 		= new GlobalModel();
		$flag_allow_view 	= $globalModel->listIPWhiteList();
		/** check open homepage **/
		$modelSystemConfig 			= new SystemConfigModel();
		$system_status_homeopen 	= $modelSystemConfig->getSystemConfigByCode('system_status_homeopen');
		if($flag_allow_view == false && $system_status_homeopen==0){
			return $this->redirect(['teaser/index']);
		}
		/** End Ip được phép vào coi teaser trước khi open **/
		
		$model 			= new ServerModel();
		$list_servers	= $model->getAllServersOrderByDesc();
		
		
		$newModel 	= new NewsModel();
		$tintuc 	= $newModel->getNewsByCategoryId(2,4);
		$sukien 	= $newModel->getNewsByCategoryId(3,4);
		$camnang 	= $newModel->getNewsByCategoryId(159,4);
		$tinhnang 	= $newModel->getNewsByCategoryId(182,4);
        $noibat 	= $newModel->getNewsOrderHotDesc(4);
        
        
		
		$sliderModel = new SliderModel();
		$slides		 = $sliderModel->getSlideHome();
		
		/** Bài viết **/
		$home_noidung_hinhthucchiendau 		= $modelSystemConfig->getSystemConfigByCode('home_noidung_hinhthucchiendau');
		$home_noidung_thutaixephinh 		= $modelSystemConfig->getSystemConfigByCode('home_noidung_thutaixephinh');
		$home_noidung_6loaitranphap 		= $modelSystemConfig->getSystemConfigByCode('home_noidung_6loaitranphap');
		$home_noidung_daihoimathuat 		= $modelSystemConfig->getSystemConfigByCode('home_noidung_daihoimathuat');
		/** End bài viết **/
		
		$this->setSeoMetaHome();
		
		$url_choingay 		= '';
		$redirect_choingay 	= $globalModel->RedirectPage('homepage',3);
		if(!empty($redirect_choingay)){
			$url_choingay 	= $redirect_choingay;
		}
        return $this->render('index',[
            'server'    => $list_servers,
			'tintuc' 	=> $tintuc,
			'sukien' 	=> $sukien,
			'camnang' 	=> $camnang,
			'noibat'	=> $noibat,
			'slides'	=> $slides,
			'tinhnang'	=> $tinhnang,
			'home_noidung_hinhthucchiendau' => $home_noidung_hinhthucchiendau,
			'home_noidung_thutaixephinh' 	=> $home_noidung_thutaixephinh,
			'home_noidung_6loaitranphap' 	=> $home_noidung_6loaitranphap,
			'home_noidung_daihoimathuat' 	=> $home_noidung_daihoimathuat,
			'url_choingay' => $url_choingay
		]);
    }

    /**
     * Login user.
     * @return boolean|yii\web\Response
     */
    public function actionLogin()
    {
        // $this->enableCsrfValidation = false;
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        try {
            // our system login
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->login()) {
                    return $this->goHome();
                }
            }
            // social login
            if (!empty(Yii::$app->request->get('code')) && !empty(Yii::$app->request->get('state'))) {
                return $this->loginFacebook();
            } 
            if (isset($_GET['code']) && isset($_GET['type']) && $_GET['type'] == 'gg') {
                return $this->loginGoogle();
            }
        } catch (\Exception $e) {
            Yii::$app->session->setFlash(
                'error',
                $e->getMessage()
            );
        }
		
		$this->setSeoMetaLogin();
        return $this->render('login', [
            'model' => $model,
            'fb_login_url' => $this->getFacebookUrl(),
            'gg_login_url' => $this->gg->createAuthUrl()
        ]);
    }

	/**
		Ken Add 
		Meta Seo for Register
	**/
	private function setSeoMetaHome()
    {
        $metaTitle 			= "Chuẩn 100% Game ANIME NHẬT BẢN";
        $metaImages 		= 'https://thonglinhsuh5.com/style/pc/images/sharefb.jpg';
        $metaDescription 	= "Cực Phẩm Game ANIME NHẬT BẢN Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí THẦN THÚ + LỄ BAO 10 TRIỆU!";
		
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $metaDescription,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'og:description',
            'content' => $metaDescription,
        ]);

        $this->view->title = $metaTitle;
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => $metaTitle,
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:image',
            'content' => $metaImages,
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => 'https://thonglinhsuh5.com',
        ]);
        $this->view->registerLinkTag([
            'rel' => 'canonical',
            'href' => 'https://thonglinhsuh5.com',
            'type' => 'text/html',
        ]);
        $this->view->registerMetaTag([
            'name' => 'robots',
            'content' => 'index,follow',
        ]);
    }
	
	
	private function setSeoMetaLogin()
    {
        $metaTitle = "";
        $metaDescription = "";
        $metaImgage = "";
        $metaImages = \Yii::$app->homeUrl . '/v1/images/index_social_bg.jpg';
        $metaDescription = "Đăng nhập vào Quickrep để bắt đầu chia sẻ và kết nối với mọi người, chia sẻ thắc mắc và những điều bạn hiểu biết.";
        $metaTitle = "Đăng nhập - Quickrep.vn";
		
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $metaDescription,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'og:description',
            'content' => $metaDescription,
        ]);

        $this->view->title = $metaTitle;
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => $metaTitle,
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:image',
            'content' => $metaImages,
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => \Yii::$app->homeUrl . Url::to(["site/login"]),
        ]);
        $this->view->registerLinkTag([
            'rel' => 'canonical',
            'href' => \Yii::$app->homeUrl . Url::to(["site/login"]),
            'type' => 'text/html',
        ]);
        $this->view->registerMetaTag([
            'name' => 'robots',
            'content' => 'index,follow',
        ]);
    }
	
	/**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	
	/**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionContact()
    {
       return $this->render('contact', [
       ]);
    }
	
    

    public function actionLanguage(){
		$language = Yii::$app->request->post('language');
		Yii::$app->language = $language;

		$languageCookie = new Cookie([
			'name' => 'language',
			'value' => $language,
			'expire' => time() + 60 * 60 * 24 * 30, // 30 days
		]);
		Yii::$app->response->cookies->add($languageCookie);
	}
    /**
     * Displays about page.
     *
     * @return mixed
     */
	 
	 
	 /**
     * Login user by facebook.
     * @return boolean|yii\web\Response
     */
    private function loginFacebook()
    {
		
        $session = Yii::$app->session;
        $fb_helper = $this->fb->getRedirectLoginHelper();
        if (isset($_GET['state'])) {
            $fb_helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }
		
        // $session->set('FBRLH_state', $_REQUEST['state']);
        $accessToken 	= $fb_helper->getAccessToken();
		
        $response 		= $this->fb->get('/me?fields=id,name,email,picture,first_name,last_name', $accessToken);
        $user_fb 		= $response->getGraphUser();
        $user_fb_id 	= User::findByFbId($user_fb['id']);
        if (!empty($user_fb_id)) {
            Yii::$app->user->login($user_fb_id, cparams('loginExpire'));
            if (isset($_GET['go'])) {
                return $this->redirect(urldecode($_GET['go']));
            } else {
                return $this->redirect(Yii::$app->request->referrer);
            }
        } else {
            // register new 
            $model = new SignupForm();
            $model->fbid = $user_fb['id'];
            $model->avatar = $user_fb['picture']['url'];
            $model->fullname = $user_fb['last_name'] . ' ' . $user_fb['first_name'];
            $model->firstname = $user_fb['first_name'];
            $model->lastname = $user_fb['last_name'];
            $model->fbtoken = $accessToken->getValue();
            $model->email = isset($user_fb['email']) ? $user_fb['email'] : '';
            if ($user = $model->signup()) {
                Yii::$app->user->login($user, cparams('loginExpire'));
                $this->goHome();
            } else {
                throw new \Exception("Không thể đăng nhập bằng facebook vui long thử lại", 1);
            }
        }
    }


	/**
     * get Facebook login url.
     * @return string
     */
    private function getFacebookUrl() 
    {
        $fb_helper = $this->fb->getRedirectLoginHelper();
        $session = Yii::$app->session;
        if (isset($_GET['state'])) {
            $fb_helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }
        return $fb_helper->getLoginUrl(Yii::$app->params['facebook_redirect_url'], $this->permissions);
    }
    /**
     * Login user by google.
     * @return boolean|yii\web\Response
     */
    private function loginGoogle() {
        $this->gg->authenticate(crequest()->get('code'));
        $google_oauthV2 = new \Google_Service_Oauth2($this->gg);
        $userData = $google_oauthV2->userinfo->get();
        if (!empty($userData)) {
            $model = new SignupForm();
            $model->email = $userData->email;
            $model->fullname = $userData->familyName . ' ' . $userData->givenName;
            $model->firstname = $userData->givenName;
            $model->lastname = $userData->familyName;
            $model->avatar = $userData->picture;
            $model->google_id = $userData->id;
            $model->google_token = $this->gg->getAccessToken();
            if ($user = $model->signup()) {
                Yii::$app->user->login($user, cparams('loginExpire'));
                return $this->goHome();
            } else {
                throw new \Exception("Lỗi máy chủ, Không thể đăng nhập bằng google.", 1);
            }
        }
    }

    private function verifyReCaptcha($recaptcha)
    {
        $google_url = Yii::$app->params["google_captcha_url"];
        $secret = Yii::$app->params["google_captcha_secret"];
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = $google_url . "?secret=" . $secret . "&response=" . $recaptcha . "&remoteip=" . $ip;
        $res = CRestFull::get($url)->getResponse();
        $res = json_decode($res, true);
        return $res['success'];
    }
    
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
		// TODO config on behavior function
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		$model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            try {
                /*
				$res = $this->verifyReCaptcha($_POST['g-recaptcha-response']);
    			if (!$res) {
                    Yii::$app->session->setFlash(
                        'error',
                        'Captcha không hợp lệ.'
                    );
                    return $this->render('login', [
                        'model' => $model,
                    ]);
                }
				*/
                if ($user = $model->signup()) {
                    Yii::$app->user->login($user, true);
    				Yii::$app->session->setFlash(
    					'success',
    					'Chúc mừng bạn đã đăng ký tài khoản thành công, '
    					. 'một email kích hoạt tài khoản đã được gửi vào hòm thư của bạn, '
    					. 'vui lòng kiểm tra để kích hoạt tài khoản trước khi đăng nhập.'
    				);
    				return $this->goHome();
    			}
            } catch (\Exception $e) {
                Yii::$app->session->setFlash($e->getMessage());
            }
		}
		/** SEO META **/
       // $this->setMetaSignup();
		/** END SEO META **/

		return $this->render('login', [
			'model' => $model,
            'fb_login_url' => $this->getFacebookUrl(),
            'gg_login_url' => $this->gg->createAuthUrl()
		]);
	}
	
	 private function setMetaSignup()
    {
        $metaTitle = "";
        $metaDescription = "";
        $metaImgage = "";
        $metaImages = \Yii::$app->homeUrl . '/v1/images/index_social_bg.jpg';
        $metaDescription = "Đăng ký mạng xã hội hỏi đáp Quickrep, cùng kết nối với mọi người.";
        $metaTitle = "Đăng Ký - Quickrep.vn";
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $metaDescription,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'og:description',
            'content' => $metaDescription,
        ]);

        $this->view->title = $metaTitle;
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => $metaTitle,
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:image',
            'content' => $metaImages,
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => \Yii::$app->homeUrl . Url::to(["site/signup"]),
        ]);
        $this->view->registerLinkTag([
            'rel' => 'canonical',
            'href' => \Yii::$app->homeUrl . Url::to(["site/signup"]),
            'type' => 'text/html',
        ]);
        $this->view->registerMetaTag([
            'name' => 'robots',
            'content' => 'index,follow',
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
	
	public function actionSearch()
	{
		$numPage 	= 0;
		$ip 		= Yii::$app->request->userIP;
		if (!Yii::$app->request->isGet) 
        {
			Yii::$app->redirect(Yii::getAlias('@webDomain'));
		}	
		
		$data 			= Yii::$app->request->get();
		
		if(isset($data["page"])){
			$numPage	= (int)$data["page"];
		}
		
		$textSearch 	= isset($data['q']) ? trim(strip_tags($data['q'])) : '';
		$kt				= explode(" ",$textSearch);//Breaking the string to array of words
		$queryPost = (new \yii\db\Query())
		->select([
			"id",
			"name",
			"images",
			"slug",
			"vid",
			"create_time",
			"views",
		])
		->from('apps')
		->andWhere("status = 1");
		
		while(list($key,$val)=each($kt))
		{
			if($val<>" " and strlen($val) > 0)
			{
				$queryPost->andWhere(['LIKE','name',$val]);
			}
					
		}
			
		$dataProvider = new ActiveDataProvider([
				"query"			=> $queryPost,
				"pagination" 	=> [
					"pageSize"	=> 48,
					'defaultPageSize'=>48,
				],
			]);	
		
		$countQuery 		= clone $queryPost;
		$pagesLasted 		= new Pagination([
				'totalCount' 	=> $countQuery->count(),
				'pageParam' 	=> 'page',
				'pageSize'		=> 48,
				'defaultPageSize'	=> 48,
			]);
		
		$modelSearch = Search::find()
		->where(["ip" => $ip,"text_search"=>$textSearch,'MONTH (date)' =>' MONTH (now())'])
		->count();
		
		if($modelSearch <=0){
			$model = new Search();
			$model->ip = $ip;
			$model->text_search = $textSearch;
			$model->date = date("Y-m-d H:i:s",time());
			$model->save();
		}	
		/* SEO PAGE */
			$textPage = "";
			if($numPage > 0){
				$textPage = ", page ".(int)$numPage;
			}
			$this->view->title 	=  "'".$textSearch."'"." search ".$textPage." ";
			$strDescription 	= 	$textSearch.' Free Apps for this search '.$textPage.'.';
			
			\Yii::$app->view->registerMetaTag([
				'name' 		=> 'description',
				'content' 	=> $strDescription
			]);	
			
			\Yii::$app->view->registerMetaTag([
				'name' 		=> 'og:description',
				'content'	=> $strDescription
			]);
		/** SEO TAG **/
		
		return $this->render('search', [
			'dataProvider'	=> $dataProvider,
			'pagesLasted'	=> $pagesLasted,
			'textSearch'	=> $textSearch
		]);	
	}
	
	private function setMetaPage($seo_title,$seo_description,$images,$canonical_url)
    {
        $metaTitle 			= "";
        $metaDescription 	= "";
        $metaImgage 		= "";
        $metaImages 		= $images;
        $metaDescription 	= $seo_description;
        $metaTitle 			= $seo_title;
		$this->view->title  = $seo_title;
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $metaDescription,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'og:description',
            'content' => $metaDescription,
        ]);

        $this->view->title = $metaTitle;
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => $metaTitle,
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:image',
            'content' => $metaImages,
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => $canonical_url,
        ]);
        $this->view->registerLinkTag([
            'rel' => 'canonical',
            'href' => $canonical_url,
            'type' => 'text/html',
        ]);
        $this->view->registerMetaTag([
            'name' => 'robots',
            'content' => 'index,follow',
        ]);
    }
}
