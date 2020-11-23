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
class VongxoayController extends FrontendController
{
	
	public function actionIndex()
	{
		$this->layout 	= false;
		$modelSystemConfig 	= new SystemConfigModel();
		$thele_vongquay 	= $modelSystemConfig->getSystemConfigByCode('minigame_vongxoay_thele');
		
		$minigameModel 	= new MinigameVongXoayModel();
		$bxhTopDiem 	= $minigameModel->getTopLongPhuongHoangMemberLimit(10);
		
		$num_luotchoi 	= 0;
		$member_point   = 0;
		$result_member_longphuonghoang = 0;
		if(!Yii::$app->user->isGuest){
			$member_id 		=  Yii::$app->user->identity->member_id;
			$num_luotchoi 	=  $minigameModel->countLuotChoi($member_id);
			$member_point   = 0;
			$result_member_point = $minigameModel->getDiemByMemberId($member_id);
			$member_point 	= $result_member_point;
			$result_member_longphuonghoang = $minigameModel->getLongPhuongHoangByMemberId($member_id);
			$result_member_longphuonghoang = (int)$result_member_longphuonghoang;
		}
			
		return $this->render('index',[	
			'bxhTopDiem' 		=> $bxhTopDiem,
			'num_luotchoi' 		=> $num_luotchoi,
			'thele_vongquay'	=> $thele_vongquay,
			'member_point'		=> $member_point,
			'result_member_longphuonghoang' => $result_member_longphuonghoang
		]);
	}
	
	public function actionGioto()
	{
		$this->layout 	= false;
		$modelSystemConfig 	= new SystemConfigModel();
		$thele_vongquay 	= $modelSystemConfig->getSystemConfigByCode('minigame_vongxoay_thele');
		
		$minigameModel 	= new MinigameVongXoayModel();
		$bxhTopDiem 	= $minigameModel->getTopLongPhuongHoangMemberLimit(10);
		
		$num_luotchoi 	= 0;
		$member_point   = 0;
		$result_member_longphuonghoang = 0;
		if(!Yii::$app->user->isGuest){
			$member_id 		=  Yii::$app->user->identity->member_id;
			$num_luotchoi 	=  $minigameModel->countLuotChoi($member_id);
			$member_point   = 0;
			$result_member_point = $minigameModel->getDiemByMemberId($member_id);
			$member_point 	= $result_member_point;
			$result_member_longphuonghoang = $minigameModel->getLongPhuongHoangByMemberId($member_id);
			$result_member_longphuonghoang = (int)$result_member_longphuonghoang;
		}
			
		return $this->render('gioto',[	
			'bxhTopDiem' 		=> $bxhTopDiem,
			'num_luotchoi' 		=> $num_luotchoi,
			'thele_vongquay'	=> $thele_vongquay,
			'member_point'		=> $member_point,
			'result_member_longphuonghoang' => $result_member_longphuonghoang
		]);
	}
	
}
?>