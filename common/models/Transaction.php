<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $trans_id
 * @property string $server_id
 * @property int $member_id
 * @property string $trans_type
 * @property string $trans_code
 * @property string $trans_serial
 * @property int $trans_money
 * @property int $trans_moneyreal
 * @property string $trans_time
 * @property string $trans_desc
 * @property int $trans_status
 * @property string $trans_compensation
 * @property string $trans_compensation_time
 * @property string $trans_partner
 * @property string $trans_devices
 * @property int $trans_loainap
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          [['member_id', 'trans_money', 'trans_moneyreal', 'trans_status', 'trans_compensation', 'trans_loainap','server_id'], 'integer'],
          [['trans_time', 'trans_compensation_time'], 'safe'],
          [['trans_desc'], 'string'],
          [['trans_type'], 'string', 'max' => 20],
          [['trans_code', 'trans_serial'], 'string', 'max' => 30],
          [['trans_partner'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'trans_id' 			=> 'Id',
            'server_id' 		=> 'Máy chủ',
            'member_id' 		=> 'Tài khoản',
            'trans_type' 		=> 'Loại thẻ',
            'trans_code' 		=> 'Mã thẻ',
            'trans_serial' 		=> 'Seri thẻ',
            'trans_money' 		=> 'Vàng',
            'trans_moneyreal' 	=> 'Tiền mặt',
            'trans_time' 		=> 'Thời gian',
            'trans_desc' 		=> 'Mô tả',
            'trans_status' 		=> 'Trạng thái',
            'trans_compensation' 		=> 'Trans Compensation',
            'trans_compensation_time' 	=> 'Trans Compensation Time',
            'trans_partner' 	=> 'Đối tác',
            'trans_devices' 	=> 'Thiết bị',
            'trans_loainap' 	=> 'Loại nạp',
        ];
    }
	
	public function getMember()
	{
		return $this->hasOne(Members::className(),['member_id' => 'member_id']);
	}
	public function getMembers()
	{
		return $this->hasOne(Members::className(),['member_id' => 'member_id']);
	}
}
