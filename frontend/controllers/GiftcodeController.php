<?php 
namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use frontend\models\GiftcodeModel;
use frontend\models\ThongKeNapModel;
use frontend\models\Members;
class GiftcodeController extends Controller
{
	
	public function actionIndex()
	{
		$loginFlag 	= 0;
		$msg 		= "";
		if(Yii::$app->user->isGuest){
			$loginFlag = 1;
			$msg = "Tiên nhân hãy đăng nhập để nhận Giftcode";
			
			if(\Yii::$app->mobileDetect->isMobile()){
				 $this->layout = 'm_main';
				 return $this->render('m_index', [
					'msg'	=> $msg
				]);
			}
			return $this->render('index', [
				'msg'	=> $msg
			]);
		}
		$member_id 		= Yii::$app->user->identity->member_id;
		
		/** CODE THAN LONG 1 **/
		$code_thanlong1 		= 3001;
		$model 					= new GiftcodeModel();
		$code_thanlong1_nhan	= $model->checkMemberIssetGiftcode($member_id,$code_thanlong1);
		if(empty($code_thanlong1_nhan)){
			$code_thanlong1_nhan = $model->getActiveGiftcode($code_thanlong1);
			if(!empty($code_thanlong1_nhan)){
				$model->updateGiftcode($code_thanlong1_nhan->id,$member_id);
			}
		}
		
		/** CODE THAN LONG 2 **/
		$code_thanlong2 		= 3002;
		$model 					= new GiftcodeModel();
		$code_thanlong2_nhan	= $model->checkMemberIssetGiftcode($member_id,$code_thanlong2);
		if(empty($code_thanlong2_nhan)){
			$code_thanlong2_nhan = $model->getActiveGiftcode($code_thanlong2);
			if(!empty($code_thanlong2_nhan)){
				$model->updateGiftcode($code_thanlong2_nhan->id,$member_id);
			}
		}
		
		/** CODE THAN LONG 3 **/
		$code_thanlong3 		= 3003;
		$model 					= new GiftcodeModel();
		$code_thanlong3_nhan	= $model->checkMemberIssetGiftcode($member_id,$code_thanlong3);
		if(empty($code_thanlong3_nhan)){
			$code_thanlong3_nhan = $model->getActiveGiftcode($code_thanlong3);
			if(!empty($code_thanlong3_nhan)){
				$model->updateGiftcode($code_thanlong3_nhan->id,$member_id);
			}
		}
		
		/** CODE THAN LONG 4 **/
		$code_thanlong4 		= 3004;
		$model 					= new GiftcodeModel();
		$code_thanlong4_nhan	= $model->checkMemberIssetGiftcode($member_id,$code_thanlong4);
		if(empty($code_thanlong4_nhan)){
			$code_thanlong4_nhan = $model->getActiveGiftcode($code_thanlong4);
			if(!empty($code_thanlong4_nhan)){
				$model->updateGiftcode($code_thanlong4_nhan->id,$member_id);
			}
		}
		
		/** CODE THAN LONG 5 **/
		$code_thanlong5 		= 3005;
		$model 					= new GiftcodeModel();
		$code_thanlong5_nhan	= $model->checkMemberIssetGiftcode($member_id,$code_thanlong5);
		if(empty($code_thanlong5_nhan)){
			$code_thanlong5_nhan = $model->getActiveGiftcode($code_thanlong5);
			if(!empty($code_thanlong5_nhan)){
				$model->updateGiftcode($code_thanlong5_nhan->id,$member_id);
			}
		}
		
		/** CODE THAN LONG 6 **/
		$code_thanlong6 		= 3006;
		$model 					= new GiftcodeModel();
		$code_thanlong6_nhan	= $model->checkMemberIssetGiftcode($member_id,$code_thanlong6);
		if(empty($code_thanlong6_nhan)){
			$code_thanlong6_nhan = $model->getActiveGiftcode($code_thanlong6);
			if(!empty($code_thanlong6_nhan)){
				$model->updateGiftcode($code_thanlong6_nhan->id,$member_id);
			}
		}
		
		/** CODE THAN LONG 7 **/
		$code_thanlong7 		= 3007;
		$model 					= new GiftcodeModel();
		$code_thanlong7_nhan	= $model->checkMemberIssetGiftcode($member_id,$code_thanlong7);
		if(empty($code_thanlong7_nhan)){
			$code_thanlong7_nhan = $model->getActiveGiftcode($code_thanlong7);
			if(!empty($code_thanlong7_nhan)){
				$model->updateGiftcode($code_thanlong7_nhan->id,$member_id);
			}
		}
		
		/** CODE THAN LONG 8 **/
		$code_thanlong8 		= 3008;
		$model 					= new GiftcodeModel();
		$code_thanlong8_nhan	= $model->checkMemberIssetGiftcode($member_id,$code_thanlong8);
		if(empty($code_thanlong8_nhan)){
			$code_thanlong8_nhan = $model->getActiveGiftcode($code_thanlong8);
			if(!empty($code_thanlong8_nhan)){
				$model->updateGiftcode($code_thanlong8_nhan->id,$member_id);
			}
		}
		
		/** CODE THAP VI **/
		$code_thapvi 		= 3009;
		$model 				= new GiftcodeModel();
		$code_thapvi_nhan	= $model->checkMemberIssetGiftcode($member_id,$code_thapvi);
		if(empty($code_thapvi_nhan)){
			$code_thapvi_nhan = $model->getActiveGiftcode($code_thapvi);
			if(!empty($code_thapvi_nhan)){
				$model->updateGiftcode($code_thapvi_nhan->id,$member_id);
			}
		}
		
		/** CODE THAP VI **/
		$code_phuonghoang 		= 3010;
		$model 				= new GiftcodeModel();
		$code_phuonghoang_nhan	= $model->checkMemberIssetGiftcode($member_id,$code_phuonghoang);
		if(empty($code_phuonghoang_nhan)){
			$code_phuonghoang_nhan = $model->getActiveGiftcode($code_phuonghoang);
			if(!empty($code_phuonghoang_nhan)){
				$model->updateGiftcode($code_phuonghoang_nhan->id,$member_id);
			}
		}
		
		return $this->render('index', [
			'code_thanlong1_nhan'	=> $code_thanlong1_nhan,
			'code_thanlong2_nhan'	=> $code_thanlong2_nhan,
			'code_thanlong3_nhan'	=> $code_thanlong3_nhan,
			'code_thanlong4_nhan'	=> $code_thanlong4_nhan,
			'code_thanlong5_nhan'	=> $code_thanlong5_nhan,
			'code_thanlong6_nhan'	=> $code_thanlong6_nhan,
			'code_thanlong7_nhan'	=> $code_thanlong7_nhan,
			'code_thanlong8_nhan'	=> $code_thanlong8_nhan,
			'code_thapvi_nhan'		=> $code_thapvi_nhan,
			'code_phuonghoang_nhan' => $code_phuonghoang_nhan,
			'msg'	=> $msg
		]);
	}
	
	public function actionTrieuHoiAmDuong()
	{
		
		if(Yii::$app->user->isGuest){
			return $this->goHome();
		}
		
		$modelNap 	= new ThongKeNapModel();
		$start_date = '2019-09-25';
		$end_date 	= '2019-09-28';
		
		
		$uid = Yii::$app->user->identity->member_username;
		if(empty($uid)){
			return $this->goHome();
		}
		
		$modelMember = Members::findByUsername($uid);
		if(empty($modelMember)){
			return $this->goHome();
		}
		$member_id 			= $modelMember->member_id;
		$member_username 	= $modelMember->member_username;
		
		$napthe   			= $modelNap->getDoanhThuNapThe($member_id,$start_date,$end_date);
		
		$napxu_thuong   	= $modelNap->getDoanhThuNapXuThuong($member_id,$start_date,$end_date);
		$napxu_momo   		= $modelNap->getDoanhThuNapXuMoMo($member_id,$start_date,$end_date);
		//echo (int)$napxu_momo;exit;
		$napxu_momo_goc		= 0;
		if((int)$napxu_momo > 0){
			$napxu_momo_goc	= $napxu_momo / 120 * 100;
		}
		
		$napvang_thuong   	= $modelNap->getDoanhThuNapVangThuong($member_username,$start_date,$end_date);
		$napvang_momo   	= $modelNap->getDoanhThuNapVangMoMo($member_username,$start_date,$end_date);
		$napvang_momo_goc 	= 0;
		if((int)$napvang_momo_goc > 0){
			$napvang_momo_goc   = $napvang_momo / 120 * 100;
		}
		
		$total = $napthe + $napxu_thuong + $napxu_momo_goc + $napvang_thuong + $napvang_momo_goc;
		/** CODE tích nạp 2000 **/
		$code_2000_nhan = '';
		
		if($total >= 2000){
			
			$code_2000 			= 2000;
			$model 				= new GiftcodeModel();
			$code_2000_nhan 	= $model->checkMemberIssetGiftcode($member_id,$code_2000);
			if(empty($code_2000_nhan)){
				$code_2000_nhan = $model->getActiveGiftcode($code_2000);
				if(!empty($code_2000_nhan)){
					$model->updateGiftcode($code_2000_nhan->id,$member_id);
				}
			}
		}
		/** CODE tích nạp 5000 **/
		$code_5000_nhan = '';
		
		if($total >= 5000){
			
			$code_5000 			= 5000;
			$model 				= new GiftcodeModel();
			$code_5000_nhan 	= $model->checkMemberIssetGiftcode($member_id,$code_5000);
			if(empty($code_5000_nhan)){
				$code_5000_nhan = $model->getActiveGiftcode($code_5000);
				if(!empty($code_5000_nhan)){
					$model->updateGiftcode($code_5000_nhan->id,$member_id);
				}
			}
		}
		
		$kccan2000 = 2000 - $total;
		if($kccan2000 <= 0){
			$kccan2000 = 0;
		}
		
		$kccan5000 = 5000 - $total;
		if($kccan5000 <= 0){
			$kccan5000 = 0;
		}
			
		return $this->render('trieu-hoi-am-duong', [
			'total' 			=> $total,
			'kccan5000'				=> $kccan5000,
			'kccan2000'				=> $kccan2000,
			'code_2000_nhan' 	=> $code_2000_nhan,
			'code_5000_nhan'	=> $code_5000_nhan
		]);
	}
}
?>