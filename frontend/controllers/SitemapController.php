<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\View;
use yii\web\Request;
use yii\db\Expression;
use yii\db\Query;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use common\models\AppsCategorys;
use common\models\Apps;
/**
 * Site controller
 */
class SitemapController extends Controller
{
   
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
	
	public function actionCategory()
    {
        
        $models = AppsCategorys::find()->select("id,name,slug,create_time")->where('status = 1')
		->orderBy([
		  'create_time' => SORT_DESC,
		])->all();
        $this->layout = false;
        
        //set content type xml in response
       Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
       $headers = Yii::$app->response->headers;
       $headers->add('Content-Type', 'text/xml');
       
        return $this->renderPartial('sitemap-category',['models'=>$models]);
        
    }
	
	public function actionListApps()
    {
        
        $models = Apps::find()->select("id,name,slug,create_time")->where('status = 1')
		->orderBy([
		  'id' => SORT_ASC,
		])->count();
        $this->layout = false;
        
        //set content type xml in response
       Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
       $headers = Yii::$app->response->headers;
       $headers->add('Content-Type', 'text/xml');
       
        return $this->renderPartial('sitemap-list-apps',['models'=>$models]);
        
    }
	
	
	public function actionApps()
    {
        $id 			= Yii::$app->request->get('id');
		$num_record 	= 5000;
		$page = intval($id);
		if($page == 1){
			$start_record 	= 0;
			$end_record 	= $id*$num_record;
		}elseif($page > 1){
			$prev_page		= $page - 1;
			$start_record 	= $prev_page * $num_record;
			$end_record		= $page * $num_record;
		}
		
        $models = Apps::find()->select("id,name,slug,vid,create_time")->where('status = 1')
		->orderBy([
		  'id' => SORT_ASC,
		])->limit($end_record)->offset($start_record)->all();
        $this->layout = false;
        
        //set content type xml in response
       Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
       $headers = Yii::$app->response->headers;
       $headers->add('Content-Type', 'text/xml');
       
        return $this->renderPartial('sitemap-apps',['models'=>$models]);
        
    }
	
}
