<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minigame_login_time".
 *
 * @property int $id
 * @property int $member_id
 * @property string $member_os
 * @property string $create_time
 */
class MinigameLoginTime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minigame_login_time';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id'], 'integer'],
            [['create_time'], 'safe'],
            [['member_os'], 'string', 'max' => 50],
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
            'member_os' => 'Member Os',
            'create_time' => 'Create Time',
        ];
    }
}
