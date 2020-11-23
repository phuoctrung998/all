<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Servers;


class ServerModel extends \yii\db\ActiveRecord{
	
	public $server_slug;
	
	public function getServerBySlug()
	{
		$model = Servers::find()
		->where('server_slug =:slug ',[
			'slug'	=> $this->server_slug
		])->one();
		
		if(empty($model)){
			throw new \Exception('Not found item!');
		}
		
		return $model;
	}
	
	public function getServerById($server_id)
	{
		$model = Servers::find()->where('server_id =:server_id ',[
			'server_id'	=> $server_id
		])->one();
		
		if(empty($model)){
			throw new \Exception('Not found item!');
		}
		return $model;
	}
	
	//lay danh muc ung dung or game
	public function getAllServers(){
		$models = Servers::find()->all();
		return $models;
	}
	
	public function getAllServersOrderByDesc(){
		$models = Servers::find()
		->where([
			'server_status' => 1
		])
		->orderBy(['server_id' => SORT_DESC])->all();
		return $models;
	}
	
	public function getServerLimitOrderDesc($limit){
		$models = Servers::find()
		->where([
			'server_status' => 1
		])
		->orderBy(['server_id' => SORT_DESC])->limit($limit)->all();
		return $models;
	}
	
	
	public function getNewServer(){
		$models = Servers::find()
		->where([
			'server_status' => 1
		])
		->orderBy(['server_id' => SORT_DESC])->one();
		return $models;
	}
	
	/** Máy chủ chơi gần nhất **/
	public function getServerPlayNearWest($member_id)
	{
		$model = Members::findOne($member_id);
		if(!empty($model)){
			return $model->member_loginserverslug;
		}
		return false;
	}
}