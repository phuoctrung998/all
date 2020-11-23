<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\AppsCategorys;
use common\models\Apps;
use common\models\AppsTags;
use common\models\IndexAppsTags;


class TagsModel extends \yii\db\ActiveRecord{
	
	public $app_id;
	
	public $rules = [
        ['id', 'filter', 'filter' => 'trim'],
        ['id', 'filter', 'filter' => 'strip_tags'],
        [['id'], 'required'],
    ];
	
	//lay danh muc ung dung or game
	public function getTagsByAppId(){
		$models = IndexAppsTags::find()->where('app_id = :app_id',['app_id' => $this->app_id])->all();
		return $models;
	}
	
}