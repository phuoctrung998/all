<?php

namespace backend\controllers;

use Yii;
use common\models\PageMeta;
use common\models\Languages;
use backend\models\PageMetaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PageMetaContents;

/**
 * PagemetaController implements the CRUD actions for PageMeta model.
 */
class PagemetaController extends Controller
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
     * Lists all PageMeta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageMetaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PageMeta model.
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
     * Creates a new PageMeta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model 		= new PageMeta();
		$languages	= Languages::find()->where('status = :status',['status' => 1])->all();
        if ($model->load(Yii::$app->request->post())) {
			$dataPost = Yii::$app->request->post();
			/** begin transaction **/
			$transaction = \Yii::$app->db->beginTransaction();
            try{
				if($model->save()){
					foreach($languages as $lang){
						$contentModel = new PageMetaContents();
						$contentModel->load($dataPost[$lang->code]);
						$contentModel->language_code 	= $lang->code;
						$contentModel->page_meta_id 	= $model->getPrimaryKey();
						if(!$contentModel->save()){
							throw new \Exception(" Errors: ".json_encode($contentModel->errors));
						}
					}
				}else{
					throw new \Exception(" Errors: ".json_encode($model->errors));
				}
				/**
					Success
				**/
				Yii::$app->session->setFlash('success', "Thêm mới phần mềm thành công!");
				$transaction->commit();
			}catch(\Exception $e){
				Yii::$app->session->setFlash('error',$e->getMessage());
				$transaction->rollBack();
			}
			
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PageMeta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $languages		= Languages::find()->where('status = :status',['status' => 1])->all();
		if ($model->load(Yii::$app->request->post())) {
			
			$dataPost = Yii::$app->request->post();
			//var_dump($dataPost);exit;
			/** begin transaction **/
			$transaction = \Yii::$app->db->beginTransaction();
            try{
				if($model->save()){
					foreach($languages as $lang){
						$contentModel = PageMetaContents::find()
						->where('page_meta_id = :page_meta_id AND language_code = :language_code',[
							'page_meta_id' 	=> $model->id,
							'language_code' 	=> $lang->code	
						])->one();
						if(empty($contentModel))
						{
							$contentModel = new PageMetaContents();
							$contentModel->page_meta_id 	= $model->id;
							$contentModel->language_code 	= $lang->code;
						}
						$contentModel->load($dataPost[$lang->code]);
						if(!$contentModel->save()){
							throw new \Exception(" Errors: ".json_encode($contentModel->errors));
						}
					}
				}else{
					throw new \Exception(" Errors: ".json_encode($model->errors));
				}
				/**
					Success
				**/
				Yii::$app->session->setFlash('success', "Cập nhật phần mềm thành công!");
				$transaction->commit();
			}catch(\Exception $e){
				Yii::$app->session->setFlash('error',$e->getMessage());
				$transaction->rollBack();
			}
			
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PageMeta model.
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
     * Finds the PageMeta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PageMeta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PageMeta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
