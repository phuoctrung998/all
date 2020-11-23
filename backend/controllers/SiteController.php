<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\DasboardModel;
use backend\models\ThongKeNapModel;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','mail-active-in-day'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className()
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
		$today 		= date("Y-m-d",time());
		$day_prev	= date('Y-m-d', strtotime(' -1 day'));
		
		
		$model 		= new DasboardModel();
		$danhthu_today 			= $model->getDoanhThuNapTheTheoNgay($today);
		$danhthu_prev 			= $model->getDoanhThuNapTheTheoNgay($day_prev);
		$doanhthu_napthe 		= $model->getDoanhThuNapThe();
		$doanhthu_napvanggm 	= $model->getDoanhThuNapVangGM();
		$doanhthu_napxugm 		= $model->getDoanhThuNapXuGM();
		
		$doanhthu_tong = $doanhthu_napthe['total_money'] + ($doanhthu_napvanggm['total_money'] * 200) + ($doanhthu_napxugm['total_money'] * 200);
		
		$xutrongvi			= $model->getTotalXu();
		$thanhviendangky   	= $model->getTotalMembersRegister();
		$thanhviendangky_homnay = $model->getTotalMembersRegisterTotay();
		
		/** thống kê nạp trong ngày **/
		$start_date = date("Y-m-d",time());
		$end_date 	= date("Y-m-d",time());
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
		/** end thống kê nạp trong ngày  **/
		
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
		
        return $this->render('index',[
			'today'				=> $today,
			'day_prev' 			=> $day_prev,
			'danhthu_today' 	=> $danhthu_today,
			'danhthu_prev'  	=> $danhthu_prev,
			'xutrongvi'			=> $xutrongvi,
			'doanhthu_tong' 	=> $doanhthu_tong,
			'thanhviendangky'  	=> $thanhviendangky,
			'thanhviendangky_homnay' => $thanhviendangky_homnay,
			
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
	
	public function actionMailActiveInDay(){
		
		
	}
	
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = "layoutLogin";
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	
	
}
