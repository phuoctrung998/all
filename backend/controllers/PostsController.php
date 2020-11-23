<?php

namespace backend\controllers;

use Yii;
use common\models\Posts;
use backend\models\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Categories;
use yii\web\UploadedFile;
use common\models\extmodels\UploadForm;
use yii\helpers\BaseFileHelper;
/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
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
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
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
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model 		= new Posts();
		$categories = Categories::find()->all();
        if ($model->load(Yii::$app->request->post())) {
           $transaction = \Yii::$app->db->beginTransaction();
		   try{
			   /** save images **/
				$modelUpload 		= new UploadForm();
				$modelUpload->file 	= UploadedFile::getInstance($model, 'post_featured_image');
				//var_dump($modelUpload->file);exit;
				if (!empty($modelUpload->file)) {	
					$createFolder = true;
					$uploadFolderThumb = 'posts/' . date('Y') . '/' . date('m');
					if (!is_dir(Yii::getAlias('@rootWeb/uploads/' . $uploadFolderThumb))) {
						$createFolder = BaseFileHelper::createDirectory(Yii::getAlias('@rootWeb/uploads/' . $uploadFolderThumb), 0775, TRUE);
					}
					if($createFolder){	
						$imgSaveName =  vietnamese_permalink($model->post_title).'-'.time(). '.' . $modelUpload->file->extension;	
						$imgSaveDb	 =  $uploadFolderThumb.'/'.$imgSaveName;
						$modelUpload->file->saveAs(Yii::getAlias('@rootWeb/uploads/') .  $uploadFolderThumb.'/'. $imgSaveName);
						$model->post_featured_image = $imgSaveDb;
					}
				}
				/** end save images **/
				$model->post_slug 		= \vietnamese_permalink($model->post_title);
				$model->post_datetime 	= date("Y-m-d H:i:s",time());
				if($model->save()){
					Yii::$app->session->setFlash('success', "Thêm mới phần mềm thành công!");
					$transaction->commit();
					return $this->redirect(['index']);
				}
				else{
					return $this->render('create', [
						'model' 		=> $model,
						'categories' 	=> $categories
					]);
				}
				
		   }catch(\Exception $e){
			   Yii::$app->session->setFlash('error',$e->getMessage());
			   $transaction->rollBack();
		   }
        }

        return $this->render('create', [
            'model' 		=> $model,
			'categories' 	=> $categories
        ]);
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$categories = Categories::find()->all();
		$old_images = $model->post_featured_image;
        if ($model->load(Yii::$app->request->post())) {
			
			$transaction = \Yii::$app->db->beginTransaction();
		   try{
			   /** save images **/
				$modelUpload 		= new UploadForm();
				$modelUpload->file 	= UploadedFile::getInstance($model, 'post_featured_image');
				//var_dump($modelUpload->file);exit;
				if (!empty($modelUpload->file)) {	
					$createFolder = true;
					$uploadFolderThumb = 'posts/' . date('Y') . '/' . date('m');
					if (!is_dir(Yii::getAlias('@rootWeb/uploads/' . $uploadFolderThumb))) {
						$createFolder = BaseFileHelper::createDirectory(Yii::getAlias('@rootWeb/uploads/' . $uploadFolderThumb), 0775, TRUE);
					}
					if($createFolder){	
						$imgSaveName =  vietnamese_permalink($model->post_title).'-'.time(). '.' . $modelUpload->file->extension;	
						$imgSaveDb	 =  $uploadFolderThumb.'/'.$imgSaveName;
						$modelUpload->file->saveAs(Yii::getAlias('@rootWeb/uploads/') .  $uploadFolderThumb.'/'. $imgSaveName);
						$model->post_featured_image = $imgSaveDb;
					}
				}
				else{
					$model->post_featured_image = $old_images;
				}
				/** end save images **/
				$model->post_slug = \vietnamese_permalink($model->post_title);
				if($model->save()){
					Yii::$app->session->setFlash('success', "Thêm mới phần mềm thành công!");
					$transaction->commit();
					return $this->redirect(['index']);
				}
				
		   }catch(\Exception $e){
			   Yii::$app->session->setFlash('error',$e->getMessage());
			   $transaction->rollBack();
		   }
            
        }

        return $this->render('update', [
            'model' => $model,
			'categories'	=> $categories
        ]);
    }

    /**
     * Deletes an existing Posts model.
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
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
