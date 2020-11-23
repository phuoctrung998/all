<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Servers;
use common\models\Transaction;
use common\models\TransactionFirst;
use common\models\PublishertransactionFirst;

class TransactionModel extends \yii\db\ActiveRecord{
	

	public function translogOne (
		$server_id, 
		$member_id, 
		$trans_money, 
		$trans_moneyreal, 
		$trans_compensation, 
		$trans_type, 
		$trans_code, 
		$trans_serial,
		$trans_partner,
		$trans_loainap
	){
		$model = new Transaction();
		$model->server_id 		= $server_id;
		$model->member_id		= $member_id;
		$model->trans_money 			= $trans_money;
		$model->trans_moneyreal 		= $trans_moneyreal;
		$model->trans_compensation = $trans_compensation;
		$model->trans_type 		= $trans_type;
		$model->trans_code 		= $trans_code;
		$model->trans_serial 		= $trans_serial;
		$model->trans_partner 	= $trans_partner;
		$model->trans_loainap 			= $trans_loainap;
		$model->trans_status		= 0;
		if(!$model->save())
		{
			return false;
		}
		return $model;
    }
	
	public function countFirstTransaction($member_id){
		$model = Transaction::find()->where([
			'member_id' => $member_id
		])->count();
		return $model;
	}
	
	
	public function addFirstPayment($trans_id)
	{
		$model = new TransactionFirst();
		$model->transaction_id = $trans_id;
		$model->save();
	}
	
	public function addPublicsherFirstPayment($trans_id)
	{
		$model = new PublishertransactionFirst();
		$model->transaction_id = $trans_id;
		$model->save();
	}
	
	public function getTransactionByTranCompensation($trans_compensation){
		$model = Transaction::find()->where([
			'trans_compensation' => $trans_compensation
		])->one();
		if(!empty($model)){
			return $model;
		}
		return false;
	}
	
	
	//transactionStepTwo2($trans_compensation, $transaction_status, $msg, $order_amount, $amount)
	public function transactionStepTwo2($trans_compensation, $trans_status, $trans_desc,$trans_money,$trans_moneyreal)
	{
		$model = Transaction::find()->where([
			'trans_compensation' => $trans_compensation
		])->one();
		if(!empty($model)){
			$model->trans_status 	= $trans_status;
			$model->trans_desc 		= $trans_desc;
			$model->trans_money 	= $trans_money;
			$model->trans_moneyreal = $trans_moneyreal;
			if($model->validate()){
				$model->save();
			}
			
		}
	}
	
	public function MembersGiaodichProvider($member_id){
		$query = Transaction::find()->where(['member_id' => $member_id]);
		
		$dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'	=> ['defaultOrder' =>['trans_id' => SORT_DESC]],
			'pagination' => [
                'pageSize' => 10,
            ]
        ]);
		
		return $dataProvider;
	}
}