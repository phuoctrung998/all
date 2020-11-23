<?php 
namespace backend\models;
use Yii;
use yii\base\Model;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use common\models\Members;
class DasboardModel extends \yii\db\ActiveRecord{
	
	public function getDoanhThuNapTheTheoNgay($date)
	{
		$sql = "SELECT SUM(trans_moneyreal) as total_money FROM `transaction` 
		WHERE `transaction`.trans_status = 1 
		AND trans_time LIKE '".$date."%'";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryOne();
	}
	
	public function getDoanhThuNapThe()
	{
		$sql = "SELECT SUM(trans_moneyreal) as total_money FROM `transaction` 
		WHERE `transaction`.trans_status = 1";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryOne();
	}
	
	public function getDoanhThuNapXuGM()
	{
		$sql = "SELECT SUM(xu) as total_money FROM `members_wallet_logs` 
		WHERE `members_wallet_logs`.gm_description <> 'test' AND `members_wallet_logs`.status = 1 
		AND `members_wallet_logs`.is_gm = 1";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryOne();
	}
	
	public function getDoanhThuNapVangGM()
	{
		$sql = "SELECT SUM(member_gold) as total_money FROM `members_gmadd_logs` 
		WHERE `members_gmadd_logs`.description <> 'test'";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryOne();
	}
	
	public function getTotalXu()
	{
		$sql = "SELECT SUM(member_xu) as total_xu FROM `members` ";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryOne();
	}
	
	public function getTotalMembersRegister()
	{
		$count = Members::find()->count();
		return $count;
	}
	
	public function getTotalMembersRegisterTotay()
	{
		$count = Members::find()->where('member_registerday LIKE :member_registerday',[
			'member_registerday' 	=> '%'.date("Y-m-d",time()).'%'
		])->count();
		return $count;
	}
	
	public function getUserTrungIp(){
		$sql  = 'select SUM(number) as total FROM (
			select count(member_ip) as number from members   group BY member_ip  HAVING number > 1
		) t';
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryOne();
	}
}
?>