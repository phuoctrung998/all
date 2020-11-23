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
use common\models\Giftcode;

class GiftcodeModel extends \yii\db\ActiveRecord{
	
	public function updateGiftcode($code_id, $member_id)
    {
        $model = Giftcode::findOne($code_id);
		if(!empty($model)){
			$model->id 			= $code_id;
			$model->member_id 	= $member_id;
			$model->status		= 1;
			if($model->save()){
				return true;
			}
		}
		return false;
    }
	
	public function getActiveGiftcode($typecode_id){
		$model = Giftcode::find()->where([
			'type' 		=> $typecode_id,
			'status' 	=> 0,
		])->one();
		if(!empty($model)){
			return $model;
		}
		return false;
	}
	
	public function checkMemberIssetGiftcode($member_id,$typecode_id){
		$model = Giftcode::find()->where([
			'type' 			=> $typecode_id,
			'member_id' 	=> $member_id,
		])->one();
		if(!empty($model)){
			return $model;
		}
		return false;
	}
}