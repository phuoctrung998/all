<?php

namespace backend\controllers;

use Yii;
use common\models\naruto\Mkt;
use backend\models\naruto\MktSearch;
use backend\models\MktModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MktController implements the CRUD actions for Mkt model.
 */
class PaymentController extends Controller
{
	public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */
   public function behaviors()
    {
        return [];
    }
	
	public static function jsonOut($error, $msg = null, $data = []) {
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = [
            'error' => $error, 
            'msg' => $msg,
            'data' => $data,
        ];
        return $response;
    }
    /**
     * Lists all Mkt models.
     * @return mixed
     */
    public function actionIndex()
    {
       
    }
	
	public function actionFirstPayment()
	{
		$get = \Yii::$app->request->get('search');
		$startDate 	= date('Y-m-d');
		$endDate	= date('Y-m-d');
		if(isset($get)){
			$startDate 	= $get['startDate'];
			$endDate	= $get['endDate'];
		}
		$model = new MktModel();
		$model->startDate 	= $startDate;
		$model->endDate		= $endDate;
		
		$dataFirtPayment  	= $model->getFirstPayment();
		return $this->render(
			'first-payment',[
				'dataFirtPayment' => $dataFirtPayment,
				'startDate'	=> $startDate,
				'endDate'	=> $endDate
			]
		);
	}
	public function actionFirstPaymentGroupByServers()
	{
		$get = \Yii::$app->request->get('search');
		$startDate 	= date('Y-m-d');
		$endDate	= date('Y-m-d');
		if(isset($get)){
			$startDate 	= $get['startDate'];
			$endDate	= $get['endDate'];
		}
		$model = new MktModel();
		$model->startDate 	= $startDate;
		$model->endDate		= $endDate;
		
		$dataFirtPaymentGroupByServers  = $model->getFirstPaymentGroupByServer();
		return $this->render(
			'first-payment-group-by-servers',[
				'dataFirtPaymentGroupByServers' => $dataFirtPaymentGroupByServers,
				'startDate'	=> $startDate,
				'endDate'	=> $endDate
			]
		);
	}
	
}
