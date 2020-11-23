<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Categories;
use common\models\Posts;


class NewsModel extends \yii\db\ActiveRecord{
	
	public $post_slug;
	public $cate_slug;
	
	
	public function getCategoryBySlug()
	{
		$model = Categories::find()->where('cat_slug =:slug ',[
			'slug'	=> $this->cate_slug
		])->one();
		
		if(empty($model)){
			return false;
		}
		
		return $model;
	}
	
	public function getPostBySlug()
	{
		$model = Posts::find()->where('post_slug =:slug ',[
			'slug'	=> $this->post_slug
		])->one();
		
		if(empty($model)){
			return false;
		}
		
		return $model;
	}
	
	public function getRelatedPosts($id)
	{
		$models = Posts::find()->where('post_id <> :post_id ',[
			'post_id' => $id
		])->limit(5)->orderBy(['post_id' => SORT_DESC])->all();
		return $models;
	}
	
	public function getNewsByCategoryId($cat_id,$limit=5){
		$models = Posts::find()
			->where('post_cat_id = :post_cat_id ',['post_cat_id' => $cat_id])
			->limit($limit)
			->orderBy(['post_id' => SORT_DESC])
			->all();
		
		return $models;
	}
	
	public function getNewsOrderDesc($limit=5){
		$models = Posts::find()
			->limit($limit)
			->orderBy(['post_id' => SORT_DESC])
			->all();
		
		return $models;
	}
	
	public function getNewsOrderHotDesc($limit=5){
		$models = Posts::find()
			->where('is_hot = :is_hot ',['is_hot' => 1])
			->limit($limit)
			->orderBy(['is_hot' => SORT_DESC,'post_id' => SORT_DESC])
			->all();
		
		return $models;
	}


}