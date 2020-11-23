<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sms".
 *
 * @property int $id
 * @property int $member_id
 * @property string $command
 * @property string $mo_message
 * @property string $msisdn
 * @property string $request_id
 * @property string $request_time
 * @property string $short_code
 * @property string $signature
 * @property int $status 0: not success, 1: success
 * @property string $created_time
 * @property int $giftcode_id
 * @property string $message
 */
class Sms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'status', 'giftcode_id'], 'integer'],
            [['mo_message', 'request_id', 'signature', 'message'], 'string'],
            [['created_time'], 'safe'],
            [['command', 'msisdn'], 'string', 'max' => 20],
            [['request_time'], 'string', 'max' => 50],
            [['short_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'command' => 'Command',
            'mo_message' => 'Mo Message',
            'msisdn' => 'Msisdn',
            'request_id' => 'Request ID',
            'request_time' => 'Request Time',
            'short_code' => 'Short Code',
            'signature' => 'Signature',
            'status' => 'Status',
            'created_time' => 'Created Time',
            'giftcode_id' => 'Giftcode ID',
            'message' => 'Message',
        ];
    }
}
