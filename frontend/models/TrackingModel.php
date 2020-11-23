<?php
namespace frontend\models;

use Yii;
use  yii\web\Session;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Mkt;
use common\models\Members;
use common\models\MinigameLoginTime;

class TrackingModel extends \yii\db\ActiveRecord{
	
	public $action_mkt_login 	= 2;
	public $action_mkt_register = 1;
	
	public function updateRowMktById($mkt_id, $member_id, $username, $action)
    {
        $modelMkt = Mkt::findOne($mkt_id);
		if(!empty($modelMkt)){
			$modelMkt->member_id = $member_id;
			$modelMkt->username  = $username;
			$modelMkt->action	 = $action;
			if($modelMkt->validate()){
				$modelMkt->save();
			}
		}
    }
	
	public function addRow($source, $member_id, $username, $action)
    {
		$modelMkt = new Mkt();
        $modelMkt->source 		= $source;
		$modelMkt->member_id 	= $member_id;
		$modelMkt->action 		= $action;
		$modelMkt->created_time = date("Y-m-d H:i:s",time());
        if($modelMkt->validate()){
			$modelMkt->save();
		}
    }
	
	public function addLogUserLogin($member_id){
		$model = new MinigameLoginTime();
		$model->member_id 	= $member_id;
		$model->member_os 	= $this->detectDevices();
		$model->member_ip 	= getIpAddress();
		$model->create_time = date("Y-m-d H:i:s",time());
		if($model->save()){
			return true;
		}
		return false;
	}
	
	/***
		Kiểm tra member đã đăng nhập hôm nay chưa
	**/
	public function checkIssetFirstLoginTotay($member_id)
	{
		$count = MinigameLoginTime::find()->where('member_id = :member_id AND create_time LIKE :create_time',[
			'member_id' 	=> $member_id,
			'create_time' 	=> '%'.date("Y-m-d",time()).'%'
		])->count();
		if($count > 0){
			return true;
		}
		return false;
	}
	
	public function detectDevices(){
		$device = '';
		if(\Yii::$app->mobileDetect->isMobile()){
			$device = 'mobile';
			if(\Yii::$app->mobileDetect->isiOS() ){
				$device = 'mobile_ios';
			}elseif(\Yii::$app->mobileDetect->isAndroidOS()){
				$device = 'mobile_android';
			}
		}elseif(\Yii::$app->mobileDetect->isTablet()){
			$device = 'tablet';
		}elseif(\Yii::$app->mobileDetect->isDesctop()){
			$device = 'pc';
		}
		return $device;
	}
	

	public function updateSourceAction($member_id,$username,$action_type)
	{
		$session = Yii::$app->session;
		/* Add Source MKT */
		$trackingModel 	= new TrackingModel();
		if($member_id > 0 && isset($session['source_register']) && $session['source_register'] != ""){
			$source = $session['source_register'];
			unset($session['source_register']);
			$lasted_insert_source_register_id = (int)$session['lasted_insert_source_register_id'];
			if($lasted_insert_source_register_id > 0){
				$imkt = $this->updateRowMktById(
					$lasted_insert_source_register_id, 
					$member_id, 
					$username, 
					$action_type
				);
			}else{
				$imkt = $this->addRow(
					$source, 
					$member_id, 
					$username, 
					$action_type
				);
			}
			
		}
		/* End Add MKT */
	}
}