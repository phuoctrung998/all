<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction_tam".
 *
 * @property int $trans_id
 * @property int $server_id
 * @property int $member_id
 * @property string $trans_type
 * @property string $trans_code
 * @property string $trans_serial
 * @property int $trans_money
 * @property int $trans_moneyreal
 * @property string $trans_time
 * @property string $trans_desc
 * @property int $trans_status
 * @property int $trans_compensation
 * @property string $trans_compensation_time
 */
class TransactionTam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_tam';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['server_id', 'member_id', 'trans_money', 'trans_moneyreal', 'trans_status', 'trans_compensation'], 'integer'],
            [['trans_time', 'trans_compensation_time'], 'safe'],
            [['trans_desc'], 'string'],
            [['trans_type'], 'string', 'max' => 20],
            [['trans_code', 'trans_serial'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'trans_id' => 'Trans ID',
            'server_id' => 'Server ID',
            'member_id' => 'Member ID',
            'trans_type' => 'Trans Type',
            'trans_code' => 'Trans Code',
            'trans_serial' => 'Trans Serial',
            'trans_money' => 'Trans Money',
            'trans_moneyreal' => 'Trans Moneyreal',
            'trans_time' => 'Trans Time',
            'trans_desc' => 'Trans Desc',
            'trans_status' => 'Trans Status',
            'trans_compensation' => 'Trans Compensation',
            'trans_compensation_time' => 'Trans Compensation Time',
        ];
    }
}
