<?php 
namespace frontend\controllers;

use frontend\components\FrontendController;
use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use frontend\models\NewsModel;
use common\models\Posts;
use common\models\Sharefb;
use frontend\models\SignupForm;
use frontend\models\LoginForm;
use Facebook\Facebook;
use frontend\models\Members;
use frontend\models\TrackingModel;
use frontend\models\GlobalModel;
use frontend\models\MinigameModel;
use frontend\models\MinigameSharefb;
use frontend\models\SystemConfigModel;
use frontend\models\BiasRandom;
use frontend\models\GiftcodeModel;
class AjaxController extends Controller
{
	public function beforeAction($action) 
	{ 
		$this->enableCsrfValidation = false; 
		return parent::beforeAction($action); 
	}
	
	public static function jsonOut($error, $msg = null, $data = []) {
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = [
            'error' => $error, 
            'msg' 	=> $msg,
            'data' 	=> $data,
        ];
        return $response;
    }
	
	
	/** Action đăng nhập đăng ký  **/
	public function actionSignin()
	{
		$model = new LoginForm();
        try {
			$username = crequest()->post('username');
			$password = crequest()->post('password');
			
			$model->username = $username;
			$model->password = $password;
            // our system login
            if ($model->login()) {
				$user = Members::findByUsername($username);
				return $this->jsonOut(false, 'success',$user);
			}
			else{
				return $this->jsonOut(true,'fail','Tài khoản hoặc mật khẩu không chính xác!');
			}
        } catch (\Exception $e) {
            return $this->jsonOut(true, 'fail',$e->getMessage());
        }
	}
	
	public function actionLoginFbAccount()
	{
		$session = Yii::$app->session;
        // $session->set('FBRLH_state', $_REQUEST['state']);
		try
		{
			$user_fb		= crequest()->post('userinfo');
			$user_fb		= json_decode($user_fb);
			if(empty($user_fb)){
				return $this->jsonOut(true, 'Thiếu thông tin!','');
			}
			$member_username 	= 'fb'.$user_fb->id;
			$user_fb_id 		= Members::findByFbId($user_fb->id);
			
			if(isset($user_fb->id)){
				$model = new SignupForm();
				$model->member_username = 'fb'.$user_fb->id;
				$model->fbid 			= $user_fb->id;
				$model->avatar 			= isset($user_fb->picture->data->url) ? $user_fb->picture->data->url : '';
				$model->member_fullname = $user_fb->name;
				$model->member_email	= isset($user_fb->email) ? $user_fb->email : '';
				
				if ($user = $model->signup()) {
					$result = Yii::$app->user->login($user, cparams('loginExpire'));
					return $this->jsonOut(false, 'success', $user);
				} else {
					return $this->jsonOut(true, 'fail','Không thể đăng nhập bằng Facebook vui lòng thử lại');
				}
			}
		}catch (\Exception $e){
			return $this->jsonOut(true, 'fail','error'.$e->getMessage());
		}
        
	}
	
	public function actionLoginGoogleAccount() {
        try{
			$id 			= crequest()->post('id');
			$name 			= crequest()->post('name');
			$image 			= crequest()->post('image');
			$email 			= crequest()->post('email');
			$accessToken	= crequest()->post('access_token');
			if (!empty($id) && !empty($name) && !empty($email) ) {
				$model = new SignupForm();
				$model->member_email 		= $email;
				$model->member_fullname 	= $name;
				$model->avatar 				= $image;
				$model->google_id 			= $id;
				$model->member_username 	= 'gg'.$id;
				$model->google_token 		= $accessToken;
				if ($user = $model->signup()) {
					$result = Yii::$app->user->login($user, cparams('loginExpire'));
					return $this->jsonOut(false, 'success', $user);
				} else {
					return $this->jsonOut(true, 'fail','Không thể đăng nhập bằng Google vui lòng thử lại'.$id.'name'.$name.'email'.$email.'accessToken'.$accessToken);
				}
			}
		}catch (\Exception $e){
			return $this->jsonOut(true, 'fail',$e->getMessage());
		}
    }
	
	public function actionSignup()
	{
		try {
			$model = new SignupForm();
			$username	 	= crequest()->post('username');
			$password 		= crequest()->post('password');
			$repassword 	= crequest()->post('repassword');
			
			$model->member_username = $username;
			$model->password 	= $password;
			$model->repassword 	= $repassword;
            // our system login
			if ($user = $model->signup()) {
				$result  = Yii::$app->user->login($user, true);
				return $this->jsonOut(false, 'success', $user);
			}
			else{
				return $this->jsonOut(true, 'fail','Đăng ký thất bại vui lòng thử lại !');
			}
		} catch (\Exception $e) {
			return $this->jsonOut(true, 'fail',$e->getMessage());
		}
	}
	
	public function actionLogout()
    {
        Yii::$app->user->logout();
		return $this->jsonOut(false, 'success','');
    }
	
	
	public function actionUpdateMemberPhonenumber()
	{
		try {
			$phonenumber	= crequest()->post('phonenumber');
			$username 		= Yii::$app->user->identity->member_username;
			$user 			= Members::findByUsername($username);
			if(!empty($user)){
				$user->member_phone = $phonenumber;
				if($user->save()){
					$data 	= Members::findByUsername($username);
					return $this->jsonOut(false, 'success',$data);
				}else{
					return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin!');
				}
			}
			else{
				return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin!');
			}
		} catch (\Exception $e) {
			return $this->jsonOut(true, 'fail',$e->getMessage());
		}
	}
	
	public function actionShareFb()
	{
		try {
			$member_id 	=  Yii::$app->user->identity->member_id;
			$model 		= new MinigameModel();
			$flag_share = $model->addSharefb($member_id);
			if($flag_share){
				return $this->jsonOut(false, 'success','Chúc mừng bạn đã chia sẻ thành công !');
			}else{
				return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin!');
			}
			
		} catch (\Exception $e) {
			return $this->jsonOut(true, 'fail',$e->getMessage());
		}
	}
	
	public function actionMinigameSharefb()
	{
		try {
			$member_id 	=  Yii::$app->user->identity->member_id;
			$model 		= new MinigameModel();
			$flag_share = $model->addSharefb($member_id);
			if($flag_share){
				return $this->jsonOut(false, 'success','Chúc mừng bạn đã chia sẻ thành công !');
			}else{
				return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin!');
			}
			
		} catch (\Exception $e) {
			return $this->jsonOut(true, 'fail',$e->getMessage());
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
	
	/** End action đăng nhập đăng ký  **/
	
	public function actionGiftcodeTeaser()
	{
		$codeid	= crequest()->post('codeid');
		
		/** Lượt đăng ký mặc định **/
		$modelSystemConfig 	= new SystemConfigModel();
		$number_default_register 		= $modelSystemConfig->getSystemConfigByCode('teaser_number_register_default');
		$globalModel 					= new GlobalModel();
		$number_member_register			= $globalModel->countMemberRegister();
		$number_member_register_event 	= $number_default_register + $number_member_register;
		/** End lượt đăng ký mặc định **/
		
		if(!empty($codeid)){
			switch($codeid){
				case 1:
					$code = "THONGLINHSUH5";
					break;
				case 2:
					$code = "THONGLINHSUKIMCUONG";
					break;
				case 3:
					$code = "THONGLINHSUVIPUSER";
					break;	
				case 4:
					$code = "THONGLINHSUOPENBETA";
					break;	
				case 5:
					$code = "THONGLINHSUGAMEHAY";
					break;	
				default:
					$code = "Có lỗi xảy ra vui lòng liên hệ Admin1!";
			}
			return $this->jsonOut(false, 'error',$code);
		}
		else{
			return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin2!');
		}
	}
	
	
	public function actionGiftcodeMinigame()
	{
		$codeid	= crequest()->post('codeid');
		
		$member_id 			=  Yii::$app->user->identity->member_id;
		$minigameModel 		= new MinigameModel();
		$modelMemberHero	= $minigameModel->getLuotTrieuHoiWin($member_id);
		$code = "";	
		if(!empty($codeid)){
			switch($codeid){
				case 1:
					if(count($modelMemberHero)>=3){
						/** Code Pháp Sư Sơ Cấp **/
						$code_phapsusocap 	= 1001;
						$model 	= new GiftcodeModel();
						$phapsusocap_code 	= $model->checkMemberIssetGiftcode($member_id,$code_phapsusocap);
						if(empty($phapsusocap_code)){
							$phapsusocap_code = $model->getActiveGiftcode($code_phapsusocap);
							if(!empty($phapsusocap_code)){
								$model->updateGiftcode($phapsusocap_code->id,$member_id);
							}
						}
						if(!empty($phapsusocap_code)){
							$code = $phapsusocap_code->giftcode;	
						}else{
							$code = "Giftcode đã phát hết!";
						}
					}else{
						$code = "";
					}
					break;
				case 2:
					if(count($modelMemberHero)>=6){
						/** Code Pháp Sư Trung Cấp **/
						$code_phapsutrungcap 	= 1002;
						$model 	= new GiftcodeModel();
						$phapsutrungcap_code 	= $model->checkMemberIssetGiftcode($member_id,$code_phapsutrungcap);
						if(empty($phapsutrungcap_code)){
							$phapsutrungcap_code = $model->getActiveGiftcode($code_phapsutrungcap);
							if(!empty($phapsutrungcap_code)){
								$model->updateGiftcode($phapsutrungcap_code->id,$member_id);
							}
						}
						if(!empty($phapsutrungcap_code)){
							$code = $phapsutrungcap_code->giftcode;	
						}else{
							$code = "Giftcode đã phát hết!";
						}
						
					}else{
						$code = "";
					}
					break;
				case 3:
					if(count($modelMemberHero)>=9){
						/** Code Pháp Sư Cao Cấp **/
						$code_phapsucaocap 	= 1003;
						$model 	= new GiftcodeModel();
						$phapsucaocap_code 	= $model->checkMemberIssetGiftcode($member_id,$code_phapsucaocap);
						if(empty($phapsucaocap_code)){
							$phapsucaocap_code = $model->getActiveGiftcode($code_phapsucaocap);
							if(!empty($phapsucaocap_code)){
								$model->updateGiftcode($phapsucaocap_code->id,$member_id);
							}
						}
						if(!empty($phapsucaocap_code)){
							$code = $phapsucaocap_code->giftcode;	
						}else{
							$code = "Giftcode đã phát hết!";
						}
					}else{
						$code = "";
					}
					break;	
				case 4:
					if(count($modelMemberHero)>=12){
						/** Code Pháp Sư Vô Thượng **/
						$code_phapsuvothuong 	= 1004;
						$model 	= new GiftcodeModel();
						$phapsuvothuong_code 	= $model->checkMemberIssetGiftcode($member_id,$code_phapsuvothuong);
						if(empty($phapsuvothuong_code)){
							$phapsuvothuong_code = $model->getActiveGiftcode($code_phapsuvothuong);
							if(!empty($phapsuvothuong_code)){
								$model->updateGiftcode($phapsuvothuong_code->id,$member_id);
							}
						}
						if(!empty($phapsuvothuong_code)){
							$code = $phapsuvothuong_code->giftcode;	
						}else{
							$code = "Giftcode đã phát hết!";
						}
					}else{
						$code = "";
					}
					break;
				case 5:
					if(count($modelMemberHero)>=15){
						/** Code Pháp Sư Vô Thượng **/
						$code_satthusocap 	= 1005;
						$model 	= new GiftcodeModel();
						$satthusocap_code 	= $model->checkMemberIssetGiftcode($member_id,$code_satthusocap);
						if(empty($satthusocap_code)){
							$satthusocap_code = $model->getActiveGiftcode($code_satthusocap);
							if(!empty($satthusocap_code)){
								$model->updateGiftcode($satthusocap_code->id,$member_id);
							}
						}
						if(!empty($satthusocap_code)){
							$code = $satthusocap_code->giftcode;	
						}else{
							$code = "Giftcode đã phát hết!";
						}
					}else{
						$code = "";
					}
					break;
				case 6:
					if(count($modelMemberHero)>=18){
						/** Code Pháp Sư Vô Thượng **/
						$code_satthutrungcap 	= 1006;
						$model 	= new GiftcodeModel();
						$satthutrungcap_code 	= $model->checkMemberIssetGiftcode($member_id,$code_satthutrungcap);
						if(empty($satthutrungcap_code)){
							$satthutrungcap_code = $model->getActiveGiftcode($code_satthutrungcap);
							if(!empty($satthutrungcap_code)){
								$model->updateGiftcode($satthutrungcap_code->id,$member_id);
							}
						}
						if(!empty($satthutrungcap_code)){
							$code = $satthutrungcap_code->giftcode;	
						}else{
							$code = "Giftcode đã phát hết!";
						}
					}else{
						$code = "";
					}
					break;
				 case 7:
					if(count($modelMemberHero)>=21){
						/** Code Pháp Sư Vô Thượng **/
						$code_satthucaocap 	= 1007;
						$model 	= new GiftcodeModel();
						$satthucaocap_code 	= $model->checkMemberIssetGiftcode($member_id,$code_satthucaocap);
						if(empty($satthucaocap_code)){
							$satthucaocap_code = $model->getActiveGiftcode($code_satthucaocap);
							if(!empty($satthucaocap_code)){
								$model->updateGiftcode($satthucaocap_code->id,$member_id);
							}
						}
						if(!empty($satthucaocap_code)){
							$code = $satthucaocap_code->giftcode;	
						}else{
							$code = "Giftcode đã phát hết!";
						}
					}else{
						$code = "";
					}
					break;
				  case 8:
					if(count($modelMemberHero)>=24){
						/** Code Pháp Sư Vô Thượng **/
						$code_thandudahiep 	= 1008;
						$model 	= new GiftcodeModel();
						$thandudahiep_code 	= $model->checkMemberIssetGiftcode($member_id,$code_thandudahiep);
						if(empty($thandudahiep_code)){
							$thandudahiep_code = $model->getActiveGiftcode($code_thandudahiep);
							if(!empty($thandudahiep_code)){
								$model->updateGiftcode($thandudahiep_code->id,$member_id);
							}
						}
						if(!empty($thandudahiep_code)){
							$code = $thandudahiep_code->giftcode;	
						}else{
							$code = "Giftcode đã phát hết!";
						}
					}else{
						$code = "";
					}
					break;		
				default:
					$code = "Có lỗi xảy ra vui lòng liên hệ Admin!";
			}
			return $this->jsonOut(false, 'success',$code);
		}
		else{
			return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin!');
		}
	}
	
	
	public function actionGetLinkRedirect()
	{
		$page	= crequest()->post('page');
		$action	= crequest()->post('action');
		$model = new GlobalModel();
		
		try{
			$slug = $model->RedirectPage($page,$action);
			if($slug != ""){
				return $this->jsonOut(false, 'success',[
					'url' => $slug,
					'msg' => ''
				]);
			}else{
				return $this->jsonOut(true, 'fail',[
					'url' => '',
					'msg' => '1'
				]);
			}
		}catch(\Exception $e ){
			return $this->jsonOut(true, 'fail',[
				'url' => '',
				'msg' => $e->getMessage()
			]);
		}
		
	}
	
	public function actionChangePassword()
	{
		$password		= crequest()->post('password');
		$repassword		= crequest()->post('repassword');
		$oldpassword	= crequest()->post('oldpassword');
		try {
			if(Yii::$app->user->isGuest){
				return $this->jsonOut(true, 'fail','Vui lòng đăng nhập trước khi thực hiện thao tác này!');
			}
			if($password == "" || $repassword == "" || $oldpassword == ""){
				return $this->jsonOut(true, 'fail','Vui lòng điền đầy đủ thông tin đổi mật khẩu!');
			}
			if($password != $repassword){
				return $this->jsonOut(true, 'fail','Mật khẩu mới của bạn không trùng khớp, vui lòng kiểm tra lại!');
			}
			if(strlen($password) < 6){
				return $this->jsonOut(true, 'fail','Mật khẩu phải từ 6 ký tự trở lên !');
			}
			
			$username 	=  Yii::$app->user->identity->member_username;
			$modelMember = Members::findByUsername($username);
			if(empty($modelMember)){
				return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin hỗ trợ !');
			}
			
			if($modelMember->member_password != md5($oldpassword)){
				return $this->jsonOut(true, 'fail','Mật khẩu của bạn không chính xác, hãy xác nhận lại!');
			}
			$modelMember->member_password  = md5($password);
			
			if($modelMember->save()){
				return $this->jsonOut(false, 'success','Chúc mừng bạn đã thay đổi mật khẩu thành công!');
			}else{
				return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin hỗ trợ !');
			}
		}catch (\Exception $e) {
			return $this->jsonOut(true, 'fail',$e->getMessage());
		}
	}
	
	public function actionUpdateInfoUser()
	{
		$member_fullname	= crequest()->post('member_fullname');
		$member_phone		= crequest()->post('member_phone');
		try {
			if(Yii::$app->user->isGuest){
				return $this->jsonOut(true, 'fail','Vui lòng đăng nhập trước khi thực hiện thao tác này!');
			}
			
			$username 		=  Yii::$app->user->identity->member_username;
			$modelMember 	= Members::findByUsername($username);
			if(empty($modelMember)){
				return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin hỗ trợ !');
			}
			
			$modelMember->member_fullname  	= $member_fullname;
			$modelMember->member_phone  	= $member_phone;
			if($modelMember->save()){
				return $this->jsonOut(false, 'success','Chúc mừng bạn đã cập nhật thông tin thành công!');
			}else{
				return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin hỗ trợ !');
			}
		}catch (\Exception $e) {
			return $this->jsonOut(true, 'fail',$e->getMessage());
		}
	}
	
	/** Lắc xí ngầu **/
	public function actionLac()
	{
		try{
			if(Yii::$app->user->isGuest){
				return $this->jsonOut(true, 'fail','Vui lòng đăng nhập!');
			}
			return $this->jsonOut(true, 'fail','Sự kiện đã kết thúc!');
			$minigameModel 	= new MinigameModel();
			
			$member_id 		=  Yii::$app->user->identity->member_id;
			$luotchoiconlai = $minigameModel->countLuotChoi($member_id);
			if($luotchoiconlai > 0){
				/** random persen result **/
				$randomModel = new BiasRandom();
				$data = [
					'1' 	=> 70,
					'0' 	=> 30,
				];
				$randomModel->setData($data);
				$result 	= $randomModel->random();
				$flag_win 	= $result[0];
				
				$flag_save 	= $minigameModel->AddLacOutcome($member_id,$flag_win);
				if($flag_save){
					return $this->jsonOut(false, 'success'.$luotchoiconlai,[
						'outcome' => $flag_win
					]);
				}else{
					return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin hỗ trợ!');
				}
			}else{
				return $this->jsonOut(true, 'fail'.$luotchoiconlai,'Bạn đã hết lượt chơi!');
			}
		}catch(\Exception $e){
			return $this->jsonOut(true, 'fail',$e->getMessage());
		}
	}
	
	/** Triệu hồi anh hùng **/
	public function actionTrieuhoianhhung()
	{
		try{
			if(Yii::$app->user->isGuest){
				return $this->jsonOut(true, 'fail','Vui lòng đăng nhập!');
			}
			$minigameModel 	= new MinigameModel();
			
			$member_id 		=  Yii::$app->user->identity->member_id;
			$luotchoiconlai = $minigameModel->countLuotTrieuHoiConLai($member_id);
			if($luotchoiconlai > 0){
				/** random persen result **/
				$randomModel = new BiasRandom();
				$data = [
					'1' 	=> 20,
					'0' 	=> 80,
				];
				$randomModel->setData($data);
				$result 	= $randomModel->random();
				$flag_win 	= $result[0];
				
				if($flag_win == 0){
					$flag_save 	= $minigameModel->AddTrieuHoiAnhHungOutcome($member_id,$flag_win,0);
					if($flag_save){
						return $this->jsonOut(false, 'success',[
								'outcome' 	=> $flag_win,
								'hero' 		=> ''
							]);
					}else{
						return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin hỗ trợ!');
					}
				}else{
					$modelMemberHero = $minigameModel->getLuotTrieuHoiWin($member_id);
					$arrayMemberHero = array();
					if(!empty($modelMemberHero)){
						foreach($modelMemberHero as $hero){
							array_push($arrayMemberHero,$hero->hero_id); 
						}
					}
					$heroWin 	= $minigameModel->getHeroWin($arrayMemberHero);
					if(!empty($heroWin)){
						$flag_save 	= $minigameModel->AddTrieuHoiAnhHungOutcome($member_id,$flag_win,$heroWin->id);
						
						if($flag_save){
							return $this->jsonOut(false, 'success',[
									'outcome' 	=> $flag_win,
									'hero' 		=> $heroWin->name,
									'hero_id' 		=> $heroWin->id,
									'hero_img' 	=> $heroWin->images
								]);
						}else{
							return $this->jsonOut(true, 'fail','Có lỗi xảy ra vui lòng liên hệ Admin hỗ trợ!');
						}
					}
				}
			}else{
				return $this->jsonOut(true, 'fail','Bạn đã hết lượt triệu hồi anh hùng!');
			}
		}catch(\Exception $e){
			return $this->jsonOut(true, 'fail',$e->getMessage());
		}
	}
	
}
?>