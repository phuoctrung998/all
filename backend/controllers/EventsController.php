<?php

namespace backend\controllers;

use Yii;
use common\models\Transaction;
use backend\models\TransactionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ThongKeTieuVangModel;
use backend\models\ThongKeNapModel;
/**
 * TransactionController implements the CRUD actions for Transaction model.
 */
class EventsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Transaction models.
     * @return mixed
     */
    public function actionIndex()
    {
		$model 			= new ThongKeTieuVangModel();
		$begin_time 	= date('Y-m-d', strtotime(' -1 day'));
		$end_time 		= date("Y-m-d",time());
		if(Yii::$app->request->get('begin_time') != ''){
			$begin_time 	= Yii::$app->request->get('begin_time');
		}
		if(Yii::$app->request->get('end_time') != ''){
			$end_time 		= Yii::$app->request->get('end_time');
		}
		
		//print_r($searchModel);
		$model->begin_time 		= $begin_time;
		$model->end_time 		= $end_time;
        $dataProvider 			= $model->getDanhSachTieuPhi(0,$begin_time,$end_time);
		
		
        return $this->render('index', [
			'model'				=> $model,
            'dataProvider' 		=> $dataProvider,
			'begin_time'		=> $begin_time,
			'end_time'			=> $end_time,
        ]);
    }
	
	public function actionNapthe()
    {
		$model 			= new ThongKeNapModel();
		$begin_time 	= date('Y-m-d', strtotime(' -1 day'));
		$end_time 		= date("Y-m-d",time());
		if(Yii::$app->request->get('begin_time') != ''){
			$begin_time 	= Yii::$app->request->get('begin_time');
		}
		if(Yii::$app->request->get('end_time') != ''){
			$end_time 		= Yii::$app->request->get('end_time');
		}
		
		//print_r($searchModel);
        $dataProvider = $model->getDoanhThuNapByUser($begin_time,$end_time);
		
		
        return $this->render('napthe', [
			'model'				=> $model,
            'dataProvider' 		=> $dataProvider,
			'begin_time'		=> $begin_time,
			'end_time'			=> $end_time,
        ]);
    }

    
}
