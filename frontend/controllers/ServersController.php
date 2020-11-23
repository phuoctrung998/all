<?php 
namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use frontend\models\ServerModel;
class ServersController extends Controller
{
	
	public function actionIndex()
	{
		$model 			= new ServerModel();
		$list_servers	= $model->getAllServersOrderByDesc();
		$new_servers	= $model->getServerLimitOrderDesc(2);

		if(\Yii::$app->mobileDetect->isMobile()){
			 $this->layout = 'm_main';
			 $new_servers	= $model->getServerLimitOrderDesc(1);
			 return $this->render('m_index',[
				'list_servers' 	=> $list_servers,
				'new_servers'	=> $new_servers
			]);
		}
		
		return $this->render('index',[
			'list_servers' 	=> $list_servers,
			'new_servers'	=> $new_servers
		]);
	}
}
?>