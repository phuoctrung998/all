<?php

namespace backend\controllers;

use Yii;
use common\models\Sliders;
use backend\models\SlidersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\extmodels\UploadForm;
use yii\helpers\BaseFileHelper;
/**
 * SlidersController implements the CRUD actions for Sliders model.
 */
class SlidersController extends Controller
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
     * Lists all Sliders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlidersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sliders model.
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
        $model 		= new Sliders();
        if ($model->load(Yii::$app->request->post())) {
           $transaction = \Yii::$app->db->beginTransaction();
		   try{
			   /** save images **/
				$modelUpload 		= new UploadForm();
				$modelUpload->file 	= UploadedFile::getInstance($model, 'images');
				//var_dump($modelUpload->file);exit;
				if (!empty($modelUpload->file)) {	
					$createFolder = true;
					$uploadFolderThumb = 'sliders/' . date('Y') . '/' . date('m');
					if (!is_dir(Yii::getAlias('@rootWeb/uploads/' . $uploadFolderThumb))) {
						$createFolder = BaseFileHelper::createDirectory(Yii::getAlias('@rootWeb/uploads/' . $uploadFolderThumb), 0775, TRUE);
					}
					if($createFolder){	
						$imgSaveName =  vietnamese_permalink($model->title).'-'.time(). '.' . $modelUpload->file->extension;	
						$imgSaveDb	 =  $uploadFolderThumb.'/'.$imgSaveName;
						$modelUpload->file->saveAs(Yii::getAlias('@rootWeb/uploads/') .  $uploadFolderThumb.'/'. $imgSaveName);
						$model->images = $imgSaveDb;
					}
				}
				/** end save images **/
				if($model->save()){
					Yii::$app->session->setFlash('success', "Thêm mới slider thành công!");
					$transaction->commit();
					return $this->redirect(['index']);
				}
				else{
					return $this->render('create', [
						'model' 		=> $model
					]);
				}
				
		   }catch(\Exception $e){
			   Yii::$app->session->setFlash('error',$e->getMessage());
			   $transaction->rollBack();
		   }
        }

        return $this->render('create', [
            'model' 		=> $model
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
		$old_images = $model->images;
        if ($model->load(Yii::$app->request->post())) {
			
			$transaction = \Yii::$app->db->beginTransaction();
		   try{
			   /** save images **/
				$modelUpload 		= new UploadForm();
				$modelUpload->file 	= UploadedFile::getInstance($model, 'images');
				//var_dump($modelUpload->file);exit;
				if (!empty($modelUpload->file)) {	
					$createFolder = true;
					$uploadFolderThumb = 'sliders/' . date('Y') . '/' . date('m');
					if (!is_dir(Yii::getAlias('@rootWeb/uploads/' . $uploadFolderThumb))) {
						$createFolder = BaseFileHelper::createDirectory(Yii::getAlias('@rootWeb/uploads/' . $uploadFolderThumb), 0775, TRUE);
					}
					if($createFolder){	
						$imgSaveName =  vietnamese_permalink($model->title).'-'.time(). '.' . $modelUpload->file->extension;	
						$imgSaveDb	 =  $uploadFolderThumb.'/'.$imgSaveName;
						$modelUpload->file->saveAs(Yii::getAlias('@rootWeb/uploads/') .  $uploadFolderThumb.'/'. $imgSaveName);
						$model->images = $imgSaveDb;
					}
				}
				else{
					$model->images = $old_images;
				}
				/** end save images **/
				
				if($model->save()){
					Yii::$app->session->setFlash('success', "Cập nhật slider thành công!");
					$transaction->commit();
					return $this->redirect(['index']);
				}
				
		   }catch(\Exception $e){
			   Yii::$app->session->setFlash('error',$e->getMessage());
			   $transaction->rollBack();
		   }
            
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing Sliders model.
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
     * Finds the Sliders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sliders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sliders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
