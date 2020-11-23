<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use common\models\AppsCategorys;
use common\models\Apps;
use common\models\AppsVersions;
use common\models\AppsSiteReviews;
use common\models\IndexAppsTags;
use common\models\PageMeta;
use common\models\ManagerRedirects;
use frontend\models\SystemConfigModel;

class GlobalModel extends \yii\db\ActiveRecord{
	
	/** TEASER **/
	public $teaser_dangnhap_maychumoinhat = 1;
	public $teaser_dangnhap_maychuchoigandaynhat = 2;
	public $teaser_dangnhap_url_tuychinh = 3;
	
	public $teaser_dangky_maychumoinhat = 1;
	public $teaser_dangky_url_tuychinh = 2;
	
	/** HOMEPAGE **/
	public $homepage_dangnhap_maychumoinhat = 1;
	public $homepage_dangnhap_maychuchoigandaynhat = 2;
	public $homepage_dangnhap_url_tuychinh = 3;
	
	public $homepage_dangky_maychumoinhat = 1;
	public $homepage_dangky_url_tuychinh = 2;
	
	/** LANDING **/
	public $landing_dangnhap_maychumoinhat = 1;
	public $landing_dangnhap_maychuchoigandaynhat = 2;
	public $landing_dangnhap_url_tuychinh = 3;
	
	public $landing_dangky_maychumoinhat = 1;
	public $landing_dangky_url_tuychinh = 2;
	
	/** CUSTOM CHOI NGAY BUTTON**/
	public $homepage_choingay_url_tuychinh 	= 4;
	public $teaser_choingay_url_tuychinh 	= 4;
	public $landing_choingay_url_tuychinh 	= 4;
	
	public $action_dangnhap = 1;
	public $action_dangky 	= 2;
	public $action_choingay = 3;
	
	public $domainUrl		= 'http://sieuxayda.vn';
	
	public function getPageMeta($code)
	{
		$model = PageMeta::find()->where('code =:code',['code' => $code])->one();
		if(empty($model)){
			return false;
		}
		return $model;
	}
	
	public function RedirectPage($page,$action)
	{
		$model 			= ManagerRedirects::find()->one();
		$serverModel 	= new ServerModel();
		$slug			= "";
		
		if($page == 'teaser'){ //TEASER
			if($action == $this->action_dangnhap){// teaser dang nhap
				if($model->teaser_login_type == $this->teaser_dangnhap_maychumoinhat){
					/** may chu moi nhat **/
					$modelServerNew = $serverModel->getNewServer();
					if(!empty($modelServerNew)){
						$slug = $modelServerNew->server_slug;
						$slug = $this->domainUrl.'/may-chu/'.$slug;
					}
				}elseif($model->teaser_login_type == $this->teaser_dangnhap_maychuchoigandaynhat){
					/** may chu choi gan nhat **/
					if(!Yii::$app->user->isGuest){
						$slug = Yii::$app->user->identity->member_loginserverslug;
						$slug = $this->domainUrl.'/may-chu/'.$slug;
					}
				}elseif($model->teaser_login_type == $this->teaser_dangnhap_url_tuychinh){
					/** may chu choi gan nhat **/
					if(!Yii::$app->user->isGuest){
						if($model->teaser_login_customurl != ""){
							$slug = $model->teaser_login_customurl;
						}
					}
				}
			}elseif($action == $this->action_dangky){ // teaser dang ky
				if($model->teaser_register_type == $this->teaser_dangky_maychumoinhat){
					/** may chu moi nhat **/
					$modelServerNew = $serverModel->getNewServer();
					if(!empty($modelServerNew)){
						$slug = $modelServerNew->server_slug;
						$slug = $this->domainUrl.'/may-chu/'.$slug;
					}
				}elseif($model->teaser_register_type == $this->teaser_dangky_url_tuychinh){
					/** may chu choi gan nhat **/
					if(!Yii::$app->user->isGuest){
						if($model->teaser_register_customurl != ""){
							$slug = $model->teaser_register_customurl;
						}
					}
				}
			}elseif($action == $this->action_choingay){
				if(!Yii::$app->user->isGuest){
					if($model->teaser_choingay_customurl != ""){
						$slug = $model->teaser_choingay_customurl;
					}
				}
			}
		}elseif($page == 'landing'){ //LANDING
			if($action == $this->action_dangnhap){
				//landing login 
				if($model->landing_login_type == $this->landing_dangnhap_maychumoinhat){
					/** may chu moi nhat **/
					$modelServerNew = $serverModel->getNewServer();
					if(!empty($modelServerNew)){
						$slug = $modelServerNew->server_slug;
						$slug = $this->domainUrl.'/may-chu/'.$slug;
					}
				}elseif($model->landing_login_type == $this->landing_dangnhap_maychuchoigandaynhat){
					/** may chu choi gan nhat **/
					if(!Yii::$app->user->isGuest){
						$slug = Yii::$app->user->identity->member_loginserverslug;
						$slug = $this->domainUrl.'/may-chu/'.$slug;
					}
				}elseif($model->landing_login_type == $this->landing_dangnhap_url_tuychinh){
					/** may chu choi gan nhat **/
					if(!Yii::$app->user->isGuest){
						if($model->landing_login_customurl != ""){
							$slug = $model->landing_login_customurl;
						}
					}
				}
			}elseif($action == $this->action_dangky){
				if($model->landing_register_type == $this->landing_dangky_maychumoinhat){
					/** may chu moi nhat **/
					$modelServerNew = $serverModel->getNewServer();
					if(!empty($modelServerNew)){
						$slug = $modelServerNew->server_slug;
						$slug = $this->domainUrl.'/may-chu/'.$slug;
					}
				}elseif($model->landing_register_type == $this->landing_dangky_url_tuychinh){
					/** may chu choi gan nhat **/
					if(!Yii::$app->user->isGuest){
						if($model->landing_register_customurl != ""){
							$slug = $model->landing_register_customurl;
						}
					}
				}
			}elseif($action == $this->action_choingay){
				if(!Yii::$app->user->isGuest){
					if($model->landing_choingay_customurl != ""){
						$slug = $model->landing_choingay_customurl;
					}
				}
			}
			
		}elseif($page == 'homepage'){ //HOMEPAGE
			if($action == $this->action_dangnhap){
				//landing login 
				if($model->homepage_login_type == $this->homepage_dangnhap_maychumoinhat){
					/** may chu moi nhat **/
					$modelServerNew = $serverModel->getNewServer();
					if(!empty($modelServerNew)){
						$slug = $modelServerNew->server_slug;
						$slug = $this->domainUrl.'/may-chu/'.$slug;
					}
				}elseif($model->homepage_login_type == $this->homepage_dangnhap_maychuchoigandaynhat){
					/** may chu choi gan nhat **/
					if(!Yii::$app->user->isGuest){
						$slug = Yii::$app->user->identity->member_loginserverslug;
						$slug = $this->domainUrl.'/may-chu/'.$slug;
					}
				}elseif($model->homepage_login_type == $this->homepage_dangnhap_url_tuychinh){
					/** may chu choi gan nhat **/
					if(!Yii::$app->user->isGuest){
						if($model->homepage_login_customurl != ""){
							$slug = $model->homepage_login_customurl;
						}
					}
				}
			}elseif($action == $this->action_dangky){
				if($model->homepage_register_type == $this->homepage_dangky_maychumoinhat){
					/** may chu moi nhat **/
					$modelServerNew = $serverModel->getNewServer();
					if(!empty($modelServerNew)){
						$slug = $modelServerNew->server_slug;
						$slug = $this->domainUrl.'/may-chu/'.$slug;
					}
				}elseif($model->homepage_register_type == $this->homepage_dangky_url_tuychinh){
					/** may chu choi gan nhat **/
					if(!Yii::$app->user->isGuest){
						if($model->homepage_register_customurl != ""){
							$slug = $model->homepage_register_customurl;
						}
					}
				}
			}elseif($action == $this->action_choingay){
				if(!Yii::$app->user->isGuest){
					if($model->homepage_choingay_customurl != ""){
						$slug = $model->homepage_choingay_customurl;
					}
				}
			}
		}
		
		/** DEFAULT **/
		return $slug;
	}
	
	public function listIPWhiteList() {
		
		$client_ip					= getIpAddress();
		$systemConfigModel 			= new SystemConfigModel();
		$system_allow_ip 			= $systemConfigModel->getSystemConfigByCode('system_allow_ip');
		
		if(empty($system_allow_ip)){
			return false;
		}
		$strWhiteListIp 	= $system_allow_ip;
		
		/** Xu ly whitelist IP **/
		if($strWhiteListIp != ''){
			$arrayWhiteListIp = explode('|',$strWhiteListIp);
			if(in_array($client_ip,$arrayWhiteListIp)){
				return true;
			}else{
				return false;
			}
		}
		
	}
	
	public function countMemberRegister()
	{
		$count = Members::find()->count();
		return $count;
	}
	
}