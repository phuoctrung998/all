<?php

namespace backend\controllers;

use Yii;
use common\models\Games;
use backend\models\GamesSearch;
use backend\models\CrawlerCategoryModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii2tech\crontab\CronJob;
use yii2tech\crontab\CronTab;
use common\models\CrawSettingSite;
use common\models\CrawSettingCategory;
use common\models\CrawSettingAttributes;
use backend\models\CrawlerSiteModel;
use backend\models\CrawlerPostModel;
use backend\models\CrawlerQueueCategoryModel;
/**
 * GamesController implements the CRUD actions for Games model.
 */
class CrawdataController extends Controller
{
    public $status_default = 0;
	public $status_queue   = 1;
	public $status_finish  = 2;
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
     * Lists all Games models.
     * @return mixed
     */
    public function actionIndex()
    {
		$query = CrawSettingSite::find();
		$dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('index', [
			'dataProvider'	=> $dataProvider
		]);
    }
	
	public function actionRuncategory()
    {
		
		$cronJob = new CronJob();
		$cronJob->min 		= '10';
		$cronJob->hour 		= '0';
		$cronJob->command 	= 'php /home/tutho/domains/nhanthecao.com/public_html/yii admin/index.php?r=crawdata%2Fget-queue-pagination-category';

		$cronTab = new CronTab();
		$cronTab->setJobs([
			$cronJob
		]);
		$cronTab->apply();
		
        return $this->render('dashboard', [
		]);
    }
	
	public function actionDashboard()
    {
		
		$cronJob = new CronJob();
		$cronJob->min 		= '10';
		$cronJob->hour 		= '0';
		$cronJob->command 	= 'php /home/tutho/domains/nhanthecao.com/public_html/yii admin/index.php?r=crawdata%2Fget-queue-pagination-category';

		$cronTab = new CronTab();
		$cronTab->setJobs([
			$cronJob
		]);
		$cronTab->apply();
		
        return $this->render('dashboard', [
		]);
    }

    /**
     * Displays a single Games model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Games model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$model = new CrawSettingSite();
		
        return $this->render('create', [
			'model' => $model
		]);
    }

    /**
     * Updates an existing Games model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = new CrawlerSiteModel();
		$model->site_id 	= $id;
		$modelSiteSetting 	= $model->setting();
		
		$crawlerCategoryModel 	= new CrawlerCategoryModel();
		$crawlerCategoryModel->site_id 	= $id;
		$modelCateSetting 				= $crawlerCategoryModel->setting();
		
		$crawlerPostModel 			= new CrawlerPostModel();
		$crawlerPostModel->site_id 	= $id;
		$modelPostSetting 			= $crawlerPostModel->setting();
		/* danh sach url category da lay*/
		$list_cates 			= $crawlerCategoryModel->getListCates();
		$array_category_settings	= $crawlerCategoryModel->arraySettingByCategory($id,'category');
		$array_post_settings	= $crawlerPostModel->arraySettingByPost($id,'post');
		
        if ($model->load(Yii::$app->request->post()) && $modelSiteSetting->save()) {
            return $this->redirect(['view', 'id' => $modelSiteSetting->id]);
        }

        return $this->render('update', [
            'modelSiteSetting' 	=> $modelSiteSetting,
			'modelCateSetting' 	=> $modelCateSetting,
			'modelPostSetting'	=> $modelPostSetting,
			'list_cates'		=> $list_cates,
			'array_category_settings'	=> $array_category_settings,
			'array_post_settings'		=> $array_post_settings
        ]);
    }


	
	 public function actionSettings()
    {
        return $this->render('settings', [
		]);
    }
	
	
    /**
     * Deletes an existing Games model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	

	/**
		Action test get Category
	**/	
	
	public function actionGetCategory(){
		
		$craws = new CrawlerCategoryModel();
		$craws->site_id = 1;
		$craws->getUrlCategory();
		exit;
	}
	
	/**
		Lay pagination danh muc
	**/
	
	public function actionGetQueuePaginationCategory()
	{
		$flag = 0;
		$queueModel = new CrawlerQueueCategoryModel();
		$result 	= $queueModel->getCategoryQueue();
		/**
			Kiem tra danh muc da lay dc, neu chua co get page thi dung url cua chinh no
			không có dữ liệu return false;
		**/
		if(empty($result)){
			return false;
		}
		if($result->lasted_page == ''){
			$url_queue = $result->url;
		}else{
			$url_queue = $result->lasted_page;
		}
		
		$craws = new CrawlerCategoryModel();
		$craws->site_id 	 	= 1;
		$modelCategoryQueue  	= $craws->setting();
		$params_lasted_page 	= $craws->getQueuePaginationCategory($url_queue);
		$url_lasted_page		= $result->url.'?'.$params_lasted_page;
		
		/**
			Luu url vao muc data can craw bai viet
		**/
		if($url_lasted_page != ""){
			$save_flag = $queueModel->saveCategoryUrlToQueue($url_lasted_page,"category",$result->mapping_id);
			if($save_flag){
				$update_flag = $queueModel->updateCategoryPaginationQueue($result->url,$url_lasted_page,$this->status_queue);
			}
		}else{
			/** Hoan tat danh muc **/
			$update_flag = $queueModel->updateCategoryPaginationQueue($result->url,"",$this->status_finish);
		}	
		
	}
	
	/**
		Action test get post by category
	**/	
	public function actionGetPostUrl(){
		
		$craws = new CrawlerQueueCategoryModel();
		$craws->getQueueCategory();
		$craws->getUrlPost();
		exit;
	}
	
	public function actionGetPost(){
		
		$craws = new CrawlerPostModel();
		$craws->site_id = 1;
		$craws->crawItems();
		exit;
	}
	
	public function actionSavePost(){
		
		$craws = new CrawlerPostModel();
		$craws->site_id = 1;
		$craws->savePost();
		exit;
	}
    /**
     * Finds the Games model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Games the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Games::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
