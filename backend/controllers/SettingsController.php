<?php

namespace backend\controllers;

use Yii;
use common\models\TblSettings;
use common\models\TblSettingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\extmodels\UploadForm;
/**
 * SettingsController implements the CRUD actions for TblSettings model.
 */
class SettingsController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all TblSettings models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblSettingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblSettings model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblSettings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblSettings();

        if ($model->load(Yii::$app->request->post())) {
			
			//SET IMAGES
            $modelUpload = new UploadForm();
			$fileImgName ="";
            if (Yii::$app->request->isPost) {
                $modelUpload->file = UploadedFile::getInstance($model, 'logo');
				
				$fileImgName = 'logo_'. time();
                if ($modelUpload->validate()) {                
                    $modelUpload->file->saveAs(Yii::getAlias('@rootWeb').'/uploads/contents/' . $fileImgName . '.' . $modelUpload->file->extension);
                }
            }
            //END UPLOAD IMAGES
            $model->logo = $fileImgName . '.' . $modelUpload->file->extension;
			
			$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblSettings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model 	= $this->findModel($id);
		$oldImg 		= $model->logo;
		$oldBrochure 	= $model->brochure;
        if ($model->load(Yii::$app->request->post())) {
			
			//SET IMAGES
            $modelUpload = new UploadForm();
            $modelUpload->file = UploadedFile::getInstance($model, 'logo');
            if(isset($modelUpload->file) && $modelUpload->validate() && count($modelUpload->file)>0)
            {
                if(isset($oldImg) || $oldImg !='')
                {
                    if(file_exists(Yii::getAlias('@rootWeb').'/uploads/contents/'.$oldImg))
                    {
                        unlink(Yii::getAlias('@rootWeb').'/uploads/contents/'.$oldImg); 
                    }
                }
				$fileImgName = 'logo_'. time();
                $modelUpload->file->saveAs(Yii::getAlias('@rootWeb').'/uploads/contents/'.$fileImgName.'.'.$modelUpload->file->extension);
                $model->logo = $fileImgName . '.' . $modelUpload->file->extension;
            }
            else
            {
                $model->logo = $oldImg;
            }
            //END UPLOAD IMAGES
			
			//SET IMAGES
            $modelBrochureUpload = new UploadForm();
            $modelBrochureUpload->file = UploadedFile::getInstance($model, 'brochure');
            if(isset($modelBrochureUpload->file) && $modelBrochureUpload->validate() && count($modelBrochureUpload->file)>0)
            {
                if(isset($oldBrochure) || $oldBrochure !='')
                {
                    if(file_exists(Yii::getAlias('@rootWeb').'/uploads/contents/'.$oldBrochure))
                    {
                        unlink(Yii::getAlias('@rootWeb').'/uploads/contents/'.$oldBrochure); 
                    }
                }
				$fileBrochureName = 'brochure_'. time();
                $modelBrochureUpload->file->saveAs(Yii::getAlias('@rootWeb').'/uploads/contents/'.$fileBrochureName.'.'.$modelBrochureUpload->file->extension);
                $model->brochure = $fileBrochureName . '.' . $modelBrochureUpload->file->extension;
            }
            else
            {
                $model->brochure = $oldBrochure;
            }
            //END UPLOAD IMAGES
			
			$model->save();
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblSettings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblSettings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblSettings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblSettings::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
