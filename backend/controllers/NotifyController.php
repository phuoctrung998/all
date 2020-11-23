<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\models\TblEmailContact;
use backend\models\DasboardModel;
use common\models\TblSettings;
use common\models\Notify;
use backend\models\VanchuyenModel;
/**
 * Site controller
 */
class NotifyController extends Controller
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
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['mail-active-in-day', 'error'],
                        'allow' => false,
						'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className()
            ],
        ];
    }
    public function actionIndex()
    {
		
    }
	
	public function actionMailActiveInDay(){
		
		$settings 	= TblSettings::find()->one();
		$datas 		= Notify::NotifyOnDay();
		$date 		= date('d-m-Y',time());
		
		$dataProviderVanchuyen = VanchuyenModel::getDataProviderVanChuyenToday();
		
		
		$transportConfig = [
			'class' 		=> 'Swift_SmtpTransport',
			'host' 			=> 'smtp.gmail.com',
			'username' 		=> 'ductrungts@gmail.com',
			'password' 		=> 'trungdaica@123',
			'port' 		 	=> '465',
			'encryption' 	=> 'ssl',
		];
		\Yii::$app->mailer->setTransport($transportConfig);
		Yii::$app->mailer->compose('layouts/html')
			->setFrom('ductrungts@gmail.com')
			->setTo('ductrungts@gmail.com')
			->setSubject("Chập nhật tình hình kinh doanh ngày $date.")
			//->setHtmlBody($str)
			->send();
		die('thanh cong');	
	}
	
   
	
}
