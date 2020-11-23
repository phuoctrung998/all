<?php 
namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use frontend\models\Members;
use frontend\models\TransactionModel;
class MembersController extends Controller
{
	
	public function actionIndex()
	{
		if(Yii::$app->user->isGuest){
			return $this->goHome();
		}
		
		$username 		= Yii::$app->user->identity->member_username;
		$modelMember 	= new Members();
		$infoMember  	= $modelMember->findByUsername($username);
		$flag_active	= 'active';
		return $this->render('index',[
			'infoMember' 			=> $infoMember,
			'flag_thongtin_active' 	=> $flag_active
		]);
	}
	
	
	public function actionLichsugiaodich()
	{
		if(Yii::$app->user->isGuest){
			return $this->goHome();
		}
		
		$username 		= Yii::$app->user->identity->member_username;
		$modelMember 	= new Members();
		$infoMember  	= $modelMember->findByUsername($username);
		if(!empty($infoMember)){
			$transactionModel 		= new TransactionModel();
			$lichsugiaodichProvider = $transactionModel->MembersGiaodichProvider($infoMember->member_id);
		}else{
			return $this->goHome();
		}
		$flag_active	= 'active';
		return $this->render('lich-su-giao-dich',[
			'infoMember' 				=> $infoMember,
			'lichsugiaodichProvider' 	=> $lichsugiaodichProvider,
			'flag_giaodich_active' 	=> $flag_active
		]);
	}
	
	public function actionAccountUpdate()
	{
		if(Yii::$app->user->isGuest){
			return $this->goHome();
		}
		
		$username 		= Yii::$app->user->identity->member_username;
		$modelMember 	= new Members();
		$infoMember  	= $modelMember->findByUsername($username);
		if(!empty($infoMember)){
			$transactionModel 		= new TransactionModel();
		}else{
			return $this->goHome();
		}
		
		$flag_active	= 'active';
		return $this->render('acount-update',[
			'infoMember' 	=> $infoMember,
			'flag_capnhatthongtin_active' 	=> $flag_active
		]);
	}
	
	
	public function actionChangePassword()
	{
		if(Yii::$app->user->isGuest){
			return $this->goHome();
		}
		
		$username 		= Yii::$app->user->identity->member_username;
		$modelMember 	= new Members();
		$infoMember  	= $modelMember->findByUsername($username);
		if(!empty($infoMember)){
			$transactionModel 		= new TransactionModel();
		}else{
			return $this->goHome();
		}
		
		$flag_active	= 'active';
		return $this->render('doi-mat-khau',[
			'infoMember' 				=> $infoMember,
			'flag_doimatkhau1_active' 	=> $flag_active
		]);
	}
	
}
?>