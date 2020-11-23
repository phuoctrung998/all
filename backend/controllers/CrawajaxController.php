<?php
namespace backend\controllers;

use yii;
use  yii\web\Session;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use yii\base\Exception;
use common\models\AppsCategorys;
use common\models\Apps;
use common\models\CrawSettingSite;
use common\models\CrawSettingCategory;
use common\models\CrawData;
use backend\models\CrawlerCategoryModel;

class CrawajaxController extends Controller{
	
	
}	