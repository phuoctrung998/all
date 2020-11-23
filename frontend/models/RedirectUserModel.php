<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\ManagerRedirects;


class ServerModel extends \yii\db\ActiveRecord{
	
	public function getRedirectUrl()
	{
		$model = ManagerRedirects::find()->one();
	}
	
	
}