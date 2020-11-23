<?php 
namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use frontend\models\NewsModel;
use common\models\Sharefb;
use common\models\Posts;
use Facebook\Facebook;
use frontend\components\FrontendController;
use frontend\models\SystemConfigModel;
use frontend\models\GlobalModel;
use frontend\models\MinigameModel;
use frontend\models\MinigameVongXoayModel;
class TeaserController extends FrontendController
{
	
	public function actionIndex()
	{
		$this->layout = false;
		/** Ip được phép vào coi teaser trước khi open **/
		$globalModel 		= new GlobalModel();
		$flag_allow_view 	= $globalModel->listIPWhiteList();
		/** check open homepage **/
		$modelSystemConfig 			= new SystemConfigModel();
		$system_status_teaseropen 	= $modelSystemConfig->getSystemConfigByCode('system_status_teaseropen');
		
		if($flag_allow_view == false && $system_status_teaseropen==0){
			
			return $this->render('//layouts/comingsoon');
		}
		/** End Ip được phép vào coi teaser trước khi open **/
		
		
		$number_full_member_register = 30000;
		/** Lượt đăng ký mặc định **/
		$number_default_register 	= $modelSystemConfig->getSystemConfigByCode('teaser_number_register_default');
		
		$number_member_register			= $globalModel->countMemberRegister();
		$number_member_register_event 	= $number_default_register + $number_member_register;
		$percent_number_register 		= ($number_member_register_event / $number_full_member_register) * 100;
		$percent_number_register 		= 100;
		/** End lượt đăng ký mặc định **/
		
		/** Bài viết **/
		$noidunglebao_10trieu 		= $modelSystemConfig->getSystemConfigByCode('teaser_page2_noidunglebao_10trieu');
		$noidunglebao_thiensu 		= $modelSystemConfig->getSystemConfigByCode('teaser_page2_dangnhap_nhan_lebaothiensu');
		$noidunglebao_kysidianguc 	= $modelSystemConfig->getSystemConfigByCode('teaser_page2_7ngay_nhankysidianguc');
		$noidunglebao_thanthutrouy 	= $modelSystemConfig->getSystemConfigByCode('teaser_page2_thanthutrouy');
		$huongdan_lacxingau 	= $modelSystemConfig->getSystemConfigByCode('teaser_page3_huongdan_lacxingau');
		/** End bài viết **/
		 
		$num_luotchoi 		= 0; 
		$arrayMemberHero 	= array();
		if(!Yii::$app->user->isGuest){
			$member_id 		= Yii::$app->user->identity->member_id;
			$minigameModel 	= new MinigameModel();
			$num_luotchoi 		= $minigameModel->countLuotChoi($member_id);
			$modelMemberHero	= $minigameModel->getLuotTrieuHoiWin($member_id);
			
			if(!empty($modelMemberHero)){
				foreach($modelMemberHero as $hero){
					array_push($arrayMemberHero,$hero->hero_id); 
				}
			}
		}
		
		
		/** Choi Ngay Button**/
		$globalModel = new GlobalModel();
		$redirectUrl = $globalModel->RedirectPage('teaser',3);
		if($redirectUrl != ""){
			$url_choingay = $redirectUrl;
		}else{
			$url_choingay = 'https://sieuxayda.vn/teaser';
		}
		
		/** Link trang chủ teaser **/
		$system_status_homeopen 	= $modelSystemConfig->getSystemConfigByCode('system_status_homeopen');
		$system_status_gameopen 	= $modelSystemConfig->getSystemConfigByCode('system_status_gameopen');
		
		/** Minigame Điều ước rồng thần **/

		$vongxoayModel = new MinigameVongXoayModel();

		//lịch sử triệu hồi ngọc
		if(!Yii::$app->user->isGuest){
		$lichsu = $vongxoayModel->getLichSuNgocTrieuHoi($member_id);

		// kết quả triệu hồi ngọc
	
		$ngoc1 = $vongxoayModel->countNgocTrieuHoi1($member_id);
		$ngoc2 = $vongxoayModel->countNgocTrieuHoi2($member_id);
		$ngoc3 = $vongxoayModel->countNgocTrieuHoi3($member_id);
		$ngoc4 = $vongxoayModel->countNgocTrieuHoi4($member_id);
		$ngoc5 = $vongxoayModel->countNgocTrieuHoi5($member_id);
		$ngoc6 = $vongxoayModel->countNgocTrieuHoi6($member_id);
		$ngoc7 = $vongxoayModel->countNgocTrieuHoi7($member_id);
		
		
		return $this->render('index',[
			'gg_login_url' 					=> $this->gg->createAuthUrl(),
			'number_member_register_event'	=> $number_member_register_event,
			'percent_number_register' 		=> $percent_number_register,
			'noidunglebao_10trieu' 			=> $noidunglebao_10trieu,
			'noidunglebao_thiensu' 			=> $noidunglebao_thiensu,
			'noidunglebao_kysidianguc' 		=> $noidunglebao_kysidianguc,
			'noidunglebao_thanthutrouy' 	=> $noidunglebao_thanthutrouy,
			'huongdan_lacxingau'			=> $huongdan_lacxingau,
			'url_choingay'					=> $url_choingay,
			'num_luotchoi' 					=> $num_luotchoi,
			'arrayMemberHero'				=> $arrayMemberHero,
			'system_status_homeopen' 		=> $system_status_homeopen,
			'system_status_gameopen'		=> $system_status_gameopen,					
			'lichsu'						=> $lichsu,	
			'ngoc1'							=> $ngoc1,
			'ngoc2'							=> $ngoc2,
			'ngoc3'							=> $ngoc3,
			'ngoc4'							=> $ngoc4,
			'ngoc5'							=> $ngoc5,
			'ngoc6'							=> $ngoc6,
			'ngoc7'							=> $ngoc7
				
			
		]);
		}else{
			return $this->render('index',[
				'gg_login_url' 					=> $this->gg->createAuthUrl(),
				'number_member_register_event'	=> $number_member_register_event,
				'percent_number_register' 		=> $percent_number_register,
				'noidunglebao_10trieu' 			=> $noidunglebao_10trieu,
				'noidunglebao_thiensu' 			=> $noidunglebao_thiensu,
				'noidunglebao_kysidianguc' 		=> $noidunglebao_kysidianguc,
				'noidunglebao_thanthutrouy' 	=> $noidunglebao_thanthutrouy,
				'huongdan_lacxingau'			=> $huongdan_lacxingau,
				'url_choingay'					=> $url_choingay,
				'num_luotchoi' 					=> $num_luotchoi,
				'arrayMemberHero'				=> $arrayMemberHero,
				'system_status_homeopen' 		=> $system_status_homeopen,
				'system_status_gameopen'		=> $system_status_gameopen
			]);	
		}
	}
	
	public function actionIndex2()
	{
		$numShareFb = Sharefb::find()->count();
		$num_share 	= 3500+(int)$numShareFb;
		$this->layout = false;
		return $this->render('index2',[
			'num_share' 	=> $num_share,
			'gg_login_url' 	=> $this->gg->createAuthUrl()
		]);
	}
	
	public function actionLogout()
    {
        Yii::$app->user->logout();
		return $this->redirect(Yii::$app->request->referrer);
    }
	
	public function jsonResult()
	{
		
	}
}
?>