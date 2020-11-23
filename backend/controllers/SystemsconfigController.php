<?php

namespace backend\controllers;

use Yii;
use common\models\SystemsConfig;
use common\models\SystemsConfigValue;
use common\models\SystemsConfigSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SystemsconfigController implements the CRUD actions for SystemsConfig model.
 */
class SystemsconfigController extends Controller
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
     * Lists all SystemsConfig models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SystemsConfigSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SystemsConfig model.
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
     * Creates a new SystemsConfig model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SystemsConfig();
		$transaction = \Yii::$app->db->beginTransaction();
		try{
			if ($model->load(Yii::$app->request->post())) {
				if($model->save()){
					$modelSystemConfigValue = new SystemsConfigValue();
					$modelSystemConfigValue->systems_config_id = $model->id;
					if($modelSystemConfigValue->save()){
						$transaction->commit();
						return $this->redirect(['index']);
					}
					else{
						$transaction->rollBack();
						
					}
				}else{
					$transaction->rollBack();
				}
				
			}
		}catch(\Exception $e){
			Yii::$app->session->setFlash('error',$e->getMessage());
			$transaction->rollBack();
		}
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SystemsConfig model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SystemsConfig model.
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
     * Finds the SystemsConfig model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SystemsConfig the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SystemsConfig::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
