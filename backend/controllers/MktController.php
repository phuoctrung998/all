<?php

namespace backend\controllers;

use Yii;
use common\models\Mkt;
use backend\models\MktSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ReportModel;
use backend\models\ThongKeNapModel;
/**
 * MktController implements the CRUD actions for Mkt model.
 */
class MktController extends Controller
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
     * Lists all Mkt models.
     * @return mixed
     */
    public function actionIndex()
    {
		$queryParams 	= array_merge(array(),Yii::$app->request->getQueryParams());
		$start_date 	= date('Y-m-d', strtotime(' -1 day'));
		$end_date 		= date("Y-m-d",time());
		if(Yii::$app->request->get('begin_time') != ''){
			$start_date 	= Yii::$app->request->get('begin_time');
		}
		if(Yii::$app->request->get('end_time') != ''){
			$end_date 		= Yii::$app->request->get('end_time');
		}
		
		$reportModel 				= new ReportModel();
		$reportModel->begin_time 	= $start_date;
		$reportModel->end_time		= $end_date;
		$napthe_theongay			= $reportModel->getDoanhThuTheoNgay();
		$mkt_theongay				= $reportModel->getMktTheoNgay();
		
		/** thống kê nạp theo ngày **/
			//$start_date			= date("Y-m-d",time());
			//$end_date 			= date("Y-m-d",time());
			$modelNap 			= new ThongKeNapModel();
			$napthe   			= $modelNap->getDoanhThuNapThe(0,$start_date,$end_date);
			$napxu_thuong   	= $modelNap->getDoanhThuNapXuThuong(0,$start_date,$end_date);
			$napxu_momo   		= $modelNap->getDoanhThuNapXuMoMo(0,$start_date,$end_date);
			
			$napxu_momo_goc		= 0;
			if((int)$napxu_momo > 0){
				$napxu_momo_goc	= $napxu_momo / 120 * 100;
			}
			
			$napvang_thuong   	= $modelNap->getDoanhThuNapVangThuong(0,$start_date,$end_date);
			$napvang_momo   	= $modelNap->getDoanhThuNapVangMoMo(0,$start_date,$end_date);
			
			$napvang_momo_goc 	= 0;
			if((int)$napvang_momo_goc > 0){
				$napvang_momo_goc   = $napvang_momo / 120 * 100;
			}
			
			$tongdoanhthu 		= $napthe + $napxu_thuong + $napxu_momo_goc + $napvang_thuong + $napvang_momo_goc;
		/** end thống kê nạp theo ngày  **/
		
		/** thống kê nạp tong **/
		$napthe_allday   			= $modelNap->getDoanhThuNapThe(1);
		$napxu_thuong_allday   		= $modelNap->getDoanhThuNapXuThuong(1);
		$napxu_momo_allday   		= $modelNap->getDoanhThuNapXuMoMo(1);
		
		$napxu_momo_goc_allday		= 0;
		if((int)$napxu_momo_allday > 0){
			$napxu_momo_goc_allday	= $napxu_momo_allday / 120 * 100;
		}
		
		$napvang_thuong_allday   	= $modelNap->getDoanhThuNapVangThuong(1);
		$napvang_momo_allday   		= $modelNap->getDoanhThuNapVangMoMo(1);
		
		$napvang_momo_goc_allday 	= 0;
		if((int)$napvang_momo_goc_allday > 0){
			$napvang_momo_goc_allday   = $napvang_momo_allday / 120 * 100;
		}
		$tongdoanhthu_allday 	= $napthe_allday + $napxu_thuong_allday + $napxu_momo_goc_allday + $napvang_thuong_allday + $napvang_momo_goc_allday;
		/** end thống kê nạp tong  **/
		
		
		/** thống kê tiêu **/
		$tructiep_napthe   		= $modelNap->getDoiSoatNapTheTrucTiep(0,$start_date,$end_date);
		$tructiep_tieuxu   		= $modelNap->getDoiSoatTieuXu(0,$start_date,$end_date);
		$tructiep_napvang_gm 	= $modelNap->getDoiSoatNapVang(0,$start_date,$end_date);
		$tongdoisoat 			= $tructiep_napthe + $tructiep_tieuxu + $tructiep_napvang_gm;
		/** end thống kê tiêu  **/
		
		
        return $this->render('index', [
            'reportModel'		=> $reportModel,
			'napthe_theongay' 	=> $napthe_theongay,
			'mkt_theongay'		=> $mkt_theongay,
			'start_date'		=> $start_date,
			'end_date'			=> $end_date,
			
			'tongdoanhthu'		=> $tongdoanhthu,
			'tongnap_the'		=> $napthe,
			'tongnap_xu'		=> $napxu_thuong + $napxu_momo_goc,
			'tongnap_vang'		=> $napvang_thuong + $napvang_momo_goc,
			
			'tongdoanhthu_allday'		=> $tongdoanhthu_allday,
			'tongnap_the_allday'		=> $napthe_allday,
			'tongnap_xu_allday'			=> $napxu_thuong_allday + $napxu_momo_goc_allday,
			'tongnap_vang_allday'		=> $napvang_thuong_allday + $napvang_momo_goc_allday,
			
			'tructiep_napthe' 		=> $tructiep_napthe,
			'tructiep_tieuxu' 		=> $tructiep_tieuxu,
			'tructiep_napvang_gm' 	=> $tructiep_napvang_gm,
			'tongdoisoat'			=> $tongdoisoat
        ]);
    }

    /**
     * Displays a single Mkt model.
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
     * Creates a new Mkt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mkt();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Mkt model.
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
     * Deletes an existing Mkt model.
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
     * Finds the Mkt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mkt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mkt::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
