<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Sliders;


class SliderModel extends \yii\db\ActiveRecord{
	
	public function getSlideHome()
	{
		$model = Sliders::find()->where(['status' => 1])
		->orderBy([
            'sort'=>	SORT_ASC,
        ])
		->all();
		if(empty($model)){
			return false;
		}
		
		return $model;
	}
	
}