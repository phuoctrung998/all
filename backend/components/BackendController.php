<?php

namespace backend\components;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class BackendController extends Controller
{
    public function behaviors()
    {
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];

        return $behaviors;
    }
	
	public function __construct()
	{
		$user_id 	= Yii::$app->user->identity->id;
		$roleUser 	=  \Yii::$app->authManager->getRolesByUser($user_id);
	}
        
}
