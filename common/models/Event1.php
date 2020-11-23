<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event1".
 *
 * @property int $id
 * @property int $member_id
 * @property int $server_id
 * @property string $created_time
 * @property string $note
 */
class Event1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'server_id'], 'integer'],
            [['created_time'], 'safe'],
            [['note'], 'string'],
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
            'server_id' => 'Server ID',
            'created_time' => 'Created Time',
            'note' => 'Note',
        ];
    }
}
