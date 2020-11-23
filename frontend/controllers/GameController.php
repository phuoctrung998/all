<?php 
namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use common\models\Servers;
use common\models\Posts;
use frontend\models\GameModel;
use frontend\models\ServerModel;
use frontend\models\Members;
use frontend\models\GlobalModel;
use frontend\models\SystemConfigModel;
class GameController extends Controller
{
	
	public function actionPlay()
	{	
		/** Ip được phép vào coi teaser trước khi open **/
		$globalModel 		= new GlobalModel();
		$flag_allow_view 	= $globalModel->listIPWhiteList();
		/** check open homepage **/
		$modelSystemConfig 			= new SystemConfigModel();
		$system_status_gameopen 	= $modelSystemConfig->getSystemConfigByCode('system_status_gameopen');
		
		if($flag_allow_view == false && $system_status_gameopen==0){
			return $this->redirect(['teaser/index']);
		}
		/** End Ip được phép vào coi teaser trước khi open **/
		
		$this->layout = false;
		if(Yii::$app->user->isGuest){
			return $this->goHome();
		}
		$serverModel 				= new ServerModel();	
		$serverModel->server_slug 	= Yii::$app->request->get('slug');
		$result = $serverModel->getServerBySlug();
		if(empty($result)){
			return $this->goHome();
		}
		if(!$result->server_status == 1){
			return $this->goHome();
		}
		
		$model 	= new GameModel();
		$model->server_index = $result->server_index;
		$model->account		 = Yii::$app->user->identity->member_username;
		$model->userid		 = Yii::$app->user->identity->member_id;
		$result  			 = $model->apiLogin();
		
		//print_r($result);exit;
		if(isset($result->message->url)){
			$url_playgame 	= $result->message->url;
			return $this->render('play',[
				'error'			=> false,
				'url_playgame' => $url_playgame
			]);
		}else{
			return $this->render('play',[
				'error'			=> true,
				'url_playgame' 	=> ""
			]);
		}
	}
	
	public function actionPlayOneUser()
	{	
		/** Ip được phép vào coi teaser trước khi open **/
		$globalModel 		= new GlobalModel();
		$flag_allow_view 	= $globalModel->listIPWhiteList();
		/** check open homepage **/
		$modelSystemConfig 			= new SystemConfigModel();
		$system_status_gameopen 	= $modelSystemConfig->getSystemConfigByCode('system_status_gameopen');
		
		if($flag_allow_view == false && $system_status_gameopen==0){
			return $this->redirect(['teaser/index']);
		}
		/** End Ip được phép vào coi teaser trước khi open **/
		
		$this->layout = false;
		$username 	=  crequest()->get('username');
		$sign 		=  crequest()->get('sign');
		
		if(empty($username)|| empty($sign)){
			return $this->goHome();
		}
		if($username == "" || $sign ==""){
			return $this->goHome();
		}
		
		$vtpsign = md5('vtpcorp@123'.$username);
		if($vtpsign  != $sign){
			return $this->goHome();
		}
		
		$modelMember = Members::findByUsername($username);
		if(empty($modelMember)){
			return $this->goHome();
		}
		
		$model 	= new GameModel();
		//$model->server_index = 1;
		$model->account		 = $modelMember->member_username;
		$model->userid		 = $modelMember->member_id;
		$result  			 = $model->apiLoginNoChooseServer();
		
		if(!isset($result->ret)){
			return $this->render('play',[
				'error'			=> true,
				'url_playgame' 	=> ""
			]);
		}
		
		if($result->ret == 0){
			$url_playgame 	= $result->msg;
			return $this->render('play',[
				'error'			=> false,
				'url_playgame' => $url_playgame
			]);
		}else{
			return $this->render('play',[
				'error'			=> true,
				'url_playgame' 	=> ""
			]);
		}
	}
	
	public function actionPlayNow()
	{	
		/** Ip được phép vào coi teaser trước khi open **/
		$globalModel 		= new GlobalModel();
		$flag_allow_view 	= $globalModel->listIPWhiteList();
		/** check open homepage **/
		$modelSystemConfig 			= new SystemConfigModel();
		$system_status_gameopen 	= $modelSystemConfig->getSystemConfigByCode('system_status_gameopen');
		
		if($flag_allow_view == false && $system_status_gameopen==0){
			return $this->redirect(['teaser/index']);
		}
		/** End Ip được phép vào coi teaser trước khi open **/
		
		$this->layout = false;
		if(Yii::$app->user->isGuest){
			return $this->goHome();
		}
		
		if(Yii::$app->user->identity->member_block==0){
			die('Tài khoản bị khóa tạm thời, vui lòng liên hệ Admin !');
		}
		$serverModel 				= new ServerModel();	
		$model 	= new GameModel();
		$model->account		 = Yii::$app->user->identity->member_username;
		$model->userid		 = Yii::$app->user->identity->member_id;
		$result  			 = $model->apiLoginNoChooseServer();
		
		if(!isset($result->ret)){
			return $this->render('play',[
				'error'			=> true,
				'url_playgame' 	=> ""
			]);
		}
		
		if($result->ret == 0){
			$url_playgame 	= $result->msg;
			return $this->render('play',[
				'error'			=> false,
				'url_playgame' => $url_playgame
			]);
		}else{
			return $this->render('play',[
				'error'			=> true,
				'url_playgame' 	=> ""
			]);
		}
	}

	
	public function actionInfoCharacter()
	{
		$model 		= new GameModel();
		$username 	=  crequest()->get('username');
		$svid 		=  crequest()->get('svid');
		$result = $model->apiRole($username,$svid);
		print_r($result);
	}
	
	
	
	public function jsonResult()
	{
		
	}
}
?>