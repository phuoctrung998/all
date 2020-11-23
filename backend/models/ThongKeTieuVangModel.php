<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;


class ThongKeTieuVangModel extends \yii\db\ActiveRecord{
	
	public $begin_time;
	public $end_time;
	/** nạp thẻ **/
	public function getDanhSachTieuPhi($flag_allday=0,$begin_time='',$end_time='')
	{
		$str_query_time 	= "";
		$str_query_time2 	= "";
		$str_query_time3 	= "";
		if($flag_allday == 0){
			$str_query_time = " AND DATE(create_time) BETWEEN DATE('".$begin_time."') AND DATE('".$end_time."')";
			$str_query_time2 = " AND DATE(create_time) BETWEEN DATE('".$begin_time."') AND DATE('".$end_time."')";
			$str_query_time3 = " AND DATE(trans_time) BETWEEN DATE('".$begin_time."') AND DATE('".$end_time."')";
		}
		$sql = "SELECT SUM(xu) as xu,member_username FROM (

		SELECT members.member_username,xu FROM `members_wallet_logs`
		INNER JOIN members ON members.member_id = members_wallet_logs.member_id
		WHERE `members_wallet_logs`.status 	= 1
		AND `members_wallet_logs`.type 		= 2
		$str_query_time

		UNION ALL

		SELECT members_gmadd_logs.member_username,member_gold FROM `members_gmadd_logs` 
		INNER JOIN members ON members.member_username = members_gmadd_logs.member_username
		WHERE 1 = 1 $str_query_time2

		UNION ALL 

		SELECT members.member_username,trans_money FROM `transaction` 
		INNER JOIN members ON members.member_id = transaction.member_id
		WHERE `transaction`.trans_status = 1
		AND transaction.trans_loainap = 1 $str_query_time3
		 
		) a GROUP BY member_username ORDER BY xu DESC";
		
		$dataProvider = new SqlDataProvider([
			'sql' 		=> $sql,
			'pagination' => [
				'pageSize' => 100
            ],
		]);
		return $dataProvider;
	}
}