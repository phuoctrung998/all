<?php

namespace frontend\components;

use yii\web\Controller;
use Facebook\Facebook;
use Yii;
use  yii\web\Session;
use common\models\Mkt;
use frontend\models\SystemConfigModel;
class FrontendController extends Controller {

	public $fb;
	public $permissions;
	public $gg;

	public function __construct($id, $module, $config = []) {
		
		
		$session = Yii::$app->session;
		$this->fb = new Facebook([
            'app_id' 		=> Yii::$app->params['facebook_appid'],
            'app_secret' 	=> Yii::$app->params['facebook_secret'],
        ]);
        $this->permissions = ['email, public_profile'];

        $this->gg = new \Google_Client();
        $this->gg->setApplicationName('Đăng nhập ThongLinhSuH5.com');
        $this->gg->setClientId(Yii::$app->params['google_clientid']);
        $this->gg->setClientSecret(Yii::$app->params['google_client_secret']);
        $this->gg->setRedirectUri('https://thonglinhsuh5.com/ajax/login-google-account');
        $this->gg->addScope("email");
        $this->gg->addScope("profile");
		
		/** tracking **/
		date_default_timezone_set('Asia/Saigon');
         $modelMkt = new Mkt();
         if (isset($_REQUEST["source"])) {
			$source = trim($_REQUEST["source"]);
            $source = strtolower($source);
            if (!empty($source)) {
                if (!isset($session["source_register"]) || $session["source_register"] != $source) {
					$modelMkt->source = $source;
					$modelMkt->action = 0;
					$modelMkt->created_time = date("Y-m-d H:i:s",time());
					if($modelMkt->save()){
						$session["source_register"] 					= $source;
						$session["source_register_viral"] 				= $source;
						$session['lasted_insert_source_register_id']	= $modelMkt->id;
					}
                }
            }
        }elseif (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != ''){
          
			$host_ref = $_SERVER['HTTP_REFERER'];
            $host = parse_url($host_ref, PHP_URL_HOST);
            if ($host != $_SERVER['HTTP_HOST']) {
                $host = str_replace('www.', '', $host);
                $source = $host;
				if (!isset($session["source_register"]) || $session["source_register"] != $source) {
					$modelMkt->source = $source;
					$modelMkt->action = 0;
					$modelMkt->created_time = date("Y-m-d H:i:s",time());
					if($modelMkt->save()){
						$session["source_register"] 					= $source;
						$session['lasted_insert_source_register_id']	= $modelMkt->id;
					}
				}
            }
        } 
		/** end tracking**/

        parent::__construct($id, $module, $config);
	}

	public function beforeAction($action) {
		if (!parent::beforeAction($action)) {
			return false;
		}

		return true;
	}

}
