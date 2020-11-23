<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "giftcode_hoangkim".
 *
 * @property int $id
 * @property string $giftcode
 * @property int $status 0: not use, 1: is used by member
 * @property int $level
 * @property string $username
 * @property string $email
 */
class GiftcodeHoangkim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'giftcode_hoangkim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'level'], 'integer'],
            [['giftcode', 'username'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'giftcode' => 'Giftcode',
            'status' => 'Status',
            'level' => 'Level',
            'username' => 'Username',
            'email' => 'Email',
        ];
    }
}
