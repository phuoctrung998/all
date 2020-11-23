<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Servers;

class PaymentModel extends \yii\db\ActiveRecord{
	
	public function getAllPaymentTypeList()
    {
        $query = "SELECT
			payment_type_list.id as id,
			payment_type_list.name as name,
			payment_type_list.code as code,
			payment_type_list.status as status,
			payment_type_list.hot_flag as hot_flag,
			payment_partner.name as payment_partner_name,
			payment_partner.code as payment_partner_code,
			payment_partner.id as payment_partner_id,
			payment_type.name as payment_type_name,
			payment_type.code as payment_type_code,
			payment_type.id as payment_type_id,
			payment_type_list.create_time,
			payment_type_list.update_time
		FROM
			payment_type_list
		INNER JOIN payment_partner ON payment_partner.id = payment_type_list.payment_partner_id
		INNER JOIN payment_type ON payment_type.id = payment_type_list.payment_type_id
		ORDER BY
			payment_type_list.hot_flag DESC";
        $data = \Yii::$app->db->createCommand($query);
		//$data->bindValue(':question_id',$questionId);
		return $data->queryOne();
    }
	
	public function getAllPaymentTypeListByCardType($card_type)
    {
        $query = "SELECT
			payment_type_list.id as id,
			payment_type_list.name as name,
			payment_type_list.code as code,
			payment_type_list.status as status,
			payment_partner.name as payment_partner_name,
			payment_partner.code as payment_partner_code,
			payment_partner.id as payment_partner_id,
			payment_type.name as payment_type_name,
			payment_type.code as payment_type_code,
			payment_type.id as payment_type_id,
			payment_type_list.create_time,
			payment_type_list.update_time
		FROM
			payment_type_list
		INNER JOIN payment_partner ON payment_partner.id = payment_type_list.payment_partner_id
		INNER JOIN payment_type ON payment_type.id = payment_type_list.payment_type_id
		WHERE `payment_type`.`code` = :card_type AND `payment_type`.`status` = 1 AND payment_type_list.status = 1
		ORDER BY `payment_type_list`.`name` DESC";
         $data = \Yii::$app->db->createCommand($query);
		$data->bindValue(':card_type',$card_type);
		return $data->queryOne();
    }
}