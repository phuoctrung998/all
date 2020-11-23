<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\MembersWalletLogsSearch;
use backend\models\MembersGmaddLogsSearch;
use backend\models\DasboardModel;
use common\models\TblSettings;
use backend\models\ServerModel;
/**
 * Site controller
 */
class GmController extends Controller
{
    /**
     * @inheritdoc
     */
    
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
		$searchModel = new MembersWalletLogsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionGold()
    {
		$searchModel 	= new MembersGmaddLogsSearch();
        $dataProvider 	= $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('gold', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionAddgold(){
		$serverModel = new ServerModel();
		$server_list = $serverModel->getAllServers();
		return $this->render('addgold',[
			'server_list' => $server_list
		]);
	}
	
	public function actionAddxu(){
		return $this->render('addxu');
	}
	
	public function actionTruxu(){
		return $this->render('truxu');
	}
	
   
	
}
