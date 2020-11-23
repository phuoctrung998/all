<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;


class ThongKeNapModel extends \yii\db\ActiveRecord{
	
	/** nạp thẻ **/
	public function getDoanhThuNapThe($flag_allday=0,$start_date='',$end_date='')
	{
		$str_query_time = " AND DATE(trans_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		$sql = "SELECT SUM(trans_money) as total_money FROM `transaction` 
		WHERE `transaction`.trans_status = 1";
	
		if($flag_allday == 0){
			$query = $sql.$str_query_time;
		}else{
			$query = $sql;
		}
		return $data = Yii::$app->db
            ->createCommand($query)
            ->queryScalar();
	}
	
	public function getDoanhThuNapXuThuong($flag_allday=0,$start_date='',$end_date='')
	{
		$str_query_time = " AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		$sql = "SELECT SUM(xu) as total_money FROM `members_wallet_logs` 
		WHERE `members_wallet_logs`.gm_description NOT LIKE '%momo%' 
		AND `members_wallet_logs`.status 	= 1
		AND is_gm = 1	/** gm nap **/			
		AND `members_wallet_logs`.type 		= 1 /** tiêu xu **/";
		
		if($flag_allday == 0){
			$query = $sql.$str_query_time;
		}else{
			$query = $sql;
		}
		return $data = Yii::$app->db
            ->createCommand($query)
            ->queryScalar();
	}
	
	public function getDoanhThuNapXuMoMo($flag_allday=0,$start_date='',$end_date='')
	{
		$str_query_time = " AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		$sql = "SELECT SUM(xu) as total_money FROM `members_wallet_logs` 
		WHERE `members_wallet_logs`.gm_description LIKE '%momo%' 
		AND `members_wallet_logs`.status 	= 1
		AND is_gm = 1	/** gm nap **/	
		AND `members_wallet_logs`.type 		= 1 /** nap xu **/";
		
		if($flag_allday == 0){
			$query = $sql.$str_query_time;
		}else{
			$query = $sql;
		}
		return $data = Yii::$app->db
            ->createCommand($query)
            ->queryScalar();
	}
	
	public function getDoanhThuNapVangThuong($flag_allday=0,$start_date='',$end_date='')
	{
		$str_query_time = " AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		$sql = "SELECT SUM(member_gold) as total_money FROM `members_gmadd_logs` 
		WHERE `members_gmadd_logs`.description NOT LIKE '%momo%'";
		
		if($flag_allday == 0){
			$query = $sql.$str_query_time;
		}else{
			$query = $sql;
		}
		return $data = Yii::$app->db
            ->createCommand($query)
            ->queryScalar();
	}
	
	public function getDoanhThuNapVangMoMo($flag_allday=0,$start_date='',$end_date='')
	{
		$str_query_time = " AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		$sql = "SELECT SUM(member_gold) as total_money FROM `members_gmadd_logs` 
		WHERE `members_gmadd_logs`.description LIKE '%momo%'";
		
		if($flag_allday == 0){
			$query = $sql.$str_query_time;
		}else{
			$query = $sql;
		}
		return $data = Yii::$app->db
            ->createCommand($query)
            ->queryScalar();
	}
	
	/** thống kê nạp theo user **/
	public function getDoanhThuNapByUser($start_date='',$end_date='')
	{
		$sql = "
		SELECT members.member_username,a.total_money FROM(	
		/** giao dich nạp thẻ **/
		SELECT SUM(trans_money) as total_money,member_id FROM `transaction` 
		WHERE `transaction`.trans_status = 1 
		AND DATE(trans_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."') 
		GROUP BY `transaction`.member_id
		
		UNION ALL
		
		SELECT SUM(xu) as total_money,member_id FROM `members_wallet_logs` 
		WHERE `members_wallet_logs`.gm_description NOT LIKE '%momo%' 
		AND `members_wallet_logs`.status 	= 1
		AND is_gm = 1	/** gm nap **/			
		AND `members_wallet_logs`.type 		= 1 /** tiêu xu **/
		AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')
		GROUP BY members_wallet_logs.member_id
		
		UNION ALL
		
		SELECT SUM(xu) as total_money,member_id FROM `members_wallet_logs` 
		WHERE `members_wallet_logs`.gm_description LIKE '%momo%' 
		AND `members_wallet_logs`.status 	= 1
		AND is_gm = 1	/** gm nap **/	
		AND `members_wallet_logs`.type 		= 1 /** nap xu **/
		AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')
		GROUP BY members_wallet_logs.member_id
		) a INNER JOIN members ON members.member_id = a.member_id
		ORDER BY a.total_money DESC
		"
		;
		
		$dataProvider = new SqlDataProvider([
			'sql' 		=> $sql,
			'pagination' => [
				'pageSize' => 100
            ],
		]);
		return $dataProvider;
	}
	/** end thống kê nạp theo user **/
	
	
	/** tiêu **/
	public function getDoiSoatNapTheTrucTiep($flag_allday=0,$start_date='',$end_date='')
	{
		$str_query_time = " AND DATE(trans_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		$sql = "SELECT SUM(trans_money) as total_money FROM `transaction` 
		WHERE `transaction`.trans_status = 1
		AND transaction.trans_loainap = 1";
	
		if($flag_allday == 0){
			$query = $sql.$str_query_time;
		}else{
			$query = $sql;
		}
		//echo $query;
		return $data = Yii::$app->db
            ->createCommand($query)
            ->queryScalar();
	}
	
	public function getDoiSoatTieuXu($flag_allday=0,$start_date='',$end_date='')
	{
		$str_query_time = " AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		$sql = "SELECT SUM(xu) as total_money FROM `members_wallet_logs` 
		WHERE `members_wallet_logs`.gm_description NOT LIKE '%momo%' 
		AND `members_wallet_logs`.status 	= 1
		AND `members_wallet_logs`.type 		= 2 /** tiêu xu **/";
		
		if($flag_allday == 0){
			$query = $sql.$str_query_time;
		}else{
			$query = $sql;
		}
		//echo $query;
		return $data = Yii::$app->db
            ->createCommand($query)
            ->queryScalar();
	}
	
	public function getDoiSoatNapVang($flag_allday=0,$start_date='',$end_date='')
	{
		$str_query_time = " AND DATE(create_time) BETWEEN DATE('".$start_date."') AND DATE('".$end_date."')";
		$sql = "SELECT SUM(member_gold) as total_money FROM `members_gmadd_logs` 
		WHERE 1 = 1 ";
		
		if($flag_allday == 0){
			$query = $sql.$str_query_time;
		}else{
			$query = $sql;
		}
		return $data = Yii::$app->db
            ->createCommand($query)
            ->queryScalar();
	}
}