<?php 
namespace backend\models;
use Yii;
use yii\base\Model;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
class ReportModel extends \yii\db\ActiveRecord{
	
	public $begin_time;
	public $end_time;
	public $nap_vang 		= 1;
	public $nap_xu 			= 2;
	public $nap_thanhcong  	= 1;
	
	public $action_dangky 	= 1;
	public $action_dangnhap = 2;
	
	public function getDoanhThuTheoNgay()
	{
		$sql = "
			SELECT IFNULL(nap_vang,0) as nap_vang,IFNULL(nap_xu,0) as nap_xu, IFNULL(nap_xu,0) + IFNULL(nap_vang,0) as tongnap FROM 
			(
			SELECT
				(
					SELECT  
						IFNULL(SUM(trans_moneyreal),0) as total_nap
					FROM `transaction` 
							WHERE `transaction`.trans_status = :nap_thanhcong AND trans_loainap = :nap_vang
							AND DATE(trans_time) BETWEEN :begin_time AND :end_time 
				) as nap_vang,
				(
					SELECT  
						IFNULL(SUM(trans_moneyreal),0) as total_nap
					FROM `transaction` 
							WHERE `transaction`.trans_status = :nap_thanhcong AND trans_loainap = :nap_xu
							AND DATE(trans_time) BETWEEN :begin_time AND :end_time
				) as nap_xu 
			) as t
		";
		$query = Yii::$app->db
            ->createCommand($sql)
			->bindValue(':begin_time', $this->begin_time)
			->bindValue(':end_time', $this->end_time)
			->bindValue(':nap_vang', $this->nap_vang)
			->bindValue(':nap_xu', $this->nap_xu)
			->bindValue(':nap_thanhcong', $this->nap_thanhcong);
		
		//echo  $query->getRawSql();  
		return $query->queryOne();
	}
	
	
	public function getDoanhThuMayChuTheoNgay()
	{
		
	}
	
	public function getMktTheoNgay()
	{
		$sql = "
		SELECT m1.source,m1.total as tong_dangnhap,m2.total as tong_dangky, m3.total as tongclick FROM ( 
			SELECT source,COUNT(source) as total FROM mkt 
			WHERE 
				action = :action_dangnhap 
			AND DATE(created_time) BETWEEN :begin_time AND :end_time
			GROUP BY source ORDER BY total DESC
		) m1 
		INNER JOIN 
		(
			SELECT source,COUNT(source) as total FROM mkt 
			WHERE 
				action = :action_dangky 
			AND DATE(created_time) BETWEEN :begin_time AND :end_time
			GROUP BY source ORDER BY total DESC
		) m2 ON m1.source = m2.source
		INNER JOIN 
		(
			SELECT source,COUNT(source) as total FROM mkt 
			WHERE 
			DATE(created_time) BETWEEN :begin_time AND :end_time
		GROUP BY source ORDER BY total DESC
		) m3 ON m1.source = m3.source
		";
		
		/*
		$query = Yii::$app->db
            ->createCommand($sql)
			->bindValue(':begin_time', $this->begin_time)
			->bindValue(':end_time', $this->end_time)
			->bindValue(':action_dangky', $this->action_dangky)
			->bindValue(':action_dangnhap', $this->action_dangnhap);
		//echo  $query->getRawSql();
		//return $query->queryAll();
		*/
		
		$dataProvider = new SqlDataProvider([
				'sql' 		=> $sql,
				'params' 	=> [
					':begin_time' 		=> $this->begin_time,
					':end_time' 		=> $this->end_time, 
					':action_dangky' 	=> $this->action_dangky, 
					':action_dangnhap' 	=> $this->action_dangnhap
				],
		]);
		//echo  $query->getRawSql();
		return $dataProvider;
	}
	
	
}
?>