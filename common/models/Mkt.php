<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mkt".
 *
 * @property int $id
 * @property string $source
 * @property int $member_id
 * @property string $username
 * @property string $created_time
 * @property int $action 0: click, 1: register, 2: user ogames login
 */
class Mkt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mkt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'action'], 'integer'],
            [['created_time'], 'safe'],
            [['source'], 'string', 'max' => 200],
            [['username'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'source' => 'Source',
            'member_id' => 'Member ID',
            'username' => 'Username',
            'created_time' => 'Created Time',
            'action' => 'Action',
        ];
    }
}
