<?php

namespace backend\controllers;

use Yii;
use common\models\Giftcode;
use backend\models\GiftcodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\extmodels\UploadForm;
use common\models\GiftcodeType;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
/**
 * GiftcodeController implements the CRUD actions for Giftcode model.
 */
class GiftcodeController extends Controller
{
    public function beforeAction($action)
	{            
		if ($action->id == 'add-giftcode') {
			$this->enableCsrfValidation = false;
		}

		return parent::beforeAction($action);
	}
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
     * Lists all Giftcode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GiftcodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$model = new UploadForm();
		$loaicodes = GiftcodeType::find()->where(['status' => 1])->all();
        return $this->render('index', [
            'searchModel' 	=> $searchModel,
            'dataProvider' 	=> $dataProvider,
			'model' 		=> $model,
			'loaicodes'		=> $loaicodes
        ]);
    }

	public function actionAddGiftcode(){
		$this->enableCsrfValidation = false;
		
		$transaction = \Yii::$app->db->beginTransaction();
		try{
			if($_POST['giftcode_type'] == 0){
				$msg = 'Chưa chọn loại giftcode';
				echo json_encode($msg);
				exit;
			}
			if(isset($_FILES["myfile"]))
			{
				$ret = array();
				//	This is for custom errors;	
				/*	$custom_error= array();
					$custom_error['jquery-upload-file-error']="File already exists";
					echo json_encode($custom_error);
					die();
				*/
				$error =$_FILES["myfile"]["error"];
				//You need to handle  both cases
				//If Any browser does not support serializing of multiple files using FormData() 
				if(!is_array($_FILES["myfile"]["name"])) //single file
				{
					$createFolder = true;
					$uploadFolder = 'giftcode/';
					if (!is_dir(Yii::getAlias('@rootWeb/uploads/' . $uploadFolder))) {
						$createFolder = BaseFileHelper::createDirectory(Yii::getAlias('@rootWeb/uploads/' . $uploadFolder), 0777, TRUE);
					}
					if($createFolder){
						$fileName = $_FILES["myfile"]["name"];
						move_uploaded_file($_FILES["myfile"]["tmp_name"],Yii::getAlias('@rootWeb/uploads/' . $uploadFolder).$fileName);
						
						$ret[]= $fileName;
					}
					$lines = file(Yii::getAlias('@rootWeb/uploads/' . $uploadFolder).$fileName);
					
					
					$type_code_id 	= $_POST['giftcode_type'];
					$create_time  	= time();
					$insert_string 	= "INSERT INTO `giftcode`(`giftcode`,`status`,`type`,`create_time`) VALUES"; 
					$counter = 0; 
					$maxsize = count($lines); 
					foreach($lines as $line => $code) { 
						$insert_string .= "('".trim($code)."',0,'".$type_code_id."','".$create_time."')"; 
						$counter++; 
						if($counter < $maxsize){ 
						$insert_string .= ","; 
						}//if 
					}//foreach 
					$data = Yii::$app->db
					->createCommand($insert_string)
					->execute();
					$transaction->commit();	
					echo json_encode($maxsize);
				}
			}	
		}catch(\Exception $e){
			$transaction->rollBack();
			echo json_encode($e->getMessage());
		}	
			
		 
	}
    /**
     * Displays a single Giftcode model.
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
     * Creates a new Giftcode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Giftcode();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Giftcode model.
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
     * Deletes an existing Giftcode model.
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
     * Finds the Giftcode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Giftcode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Giftcode::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
