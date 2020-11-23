<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_type_list".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $payment_partner_id
 * @property int $payment_type_id
 * @property int $status
 * @property int $hot_flag
 * @property int $create_time
 * @property int $update_time
 */
class PaymentTypeList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_type_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_partner_id', 'payment_type_id', 'status', 'hot_flag', 'create_time', 'update_time'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'payment_partner_id' => 'Payment Partner ID',
            'payment_type_id' => 'Payment Type ID',
            'status' => 'Status',
            'hot_flag' => 'Hot Flag',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
