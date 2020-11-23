<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Categories;
use common\models\Posts;


class ThongKeNapModel extends \yii\db\ActiveRecord{
	
	public function getDoanhThuNapThe($user_id,$start_date,$end_date)
	{
		$sql = "SELECT SUM(trans_money) as total_money FROM `transaction` 
		WHERE member_id = ".$user_id." 
		AND `transaction`.trans_status 	= 1
		AND `transaction`.trans_loainap = 1
		AND DATE(trans_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."') ";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryScalar();
	}
	
	public function getDoanhThuNapXuThuong($user_id,$start_date,$end_date)
	{
		$sql = "SELECT SUM(xu) as total_money FROM `members_wallet_logs` 
		WHERE member_id = ".$user_id." 
		AND `members_wallet_logs`.gm_description NOT LIKE '%momo%' 
		AND `members_wallet_logs`.status 	= 1 
		AND `members_wallet_logs`.type 		= 2 /** tiêu xu **/
		AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryScalar();
	}
	
	public function getDoanhThuNapXuMoMo($user_id,$start_date,$end_date)
	{
		$sql = "SELECT SUM(xu) as total_money FROM `members_wallet_logs` 
		WHERE member_id = ".$user_id."
		AND`members_wallet_logs`.gm_description LIKE '%momo%' 
		AND `members_wallet_logs`.status 	= 1 
		AND `members_wallet_logs`.type 		= 2 /** tiêu xu **/	
		AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryScalar();
	}
	
	public function getDoanhThuNapVangThuong($user_username,$start_date,$end_date)
	{
		$sql = "SELECT SUM(member_gold) as total_money FROM `members_gmadd_logs` 
		WHERE member_username = '".$user_username."'
		AND `members_gmadd_logs`.description NOT LIKE '%momo%' 
		AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryScalar();
	}
	
	public function getDoanhThuNapVangMoMo($user_username,$start_date,$end_date)
	{
		$sql = "SELECT SUM(member_gold) as total_money FROM `members_gmadd_logs` 
		WHERE member_username = '".$user_username."'
		AND `members_gmadd_logs`.description LIKE '%momo%'  
		AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryScalar();
	}
}