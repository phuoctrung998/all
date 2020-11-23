<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use common\models\SystemsConfigValue;
use common\models\SystemsConfig;

class SystemConfigModel extends \yii\db\ActiveRecord{
	
	public function getSystemConfigByCode($code){
		$model = SystemsConfig::find()->where(['code' => $code])->one();
		
		if(!empty($model)){
			if(!empty($model->configValue)){
				return trim($model->configValue->value);
			}
			return false;
		}
		return false;
	}
}