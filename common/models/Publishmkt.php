<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "publishmkt".
 *
 * @property int $id
 * @property int $zone_id
 * @property int $member_id
 * @property string $created_time
 * @property int $action 0: click, 1: register, 2: user ogames login
 */
class Publishmkt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publishmkt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zone_id', 'member_id', 'action'], 'integer'],
            [['created_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zone_id' => 'Zone ID',
            'member_id' => 'Member ID',
            'created_time' => 'Created Time',
            'action' => 'Action',
        ];
    }
}
