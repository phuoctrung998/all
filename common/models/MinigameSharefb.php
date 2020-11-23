<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minigame_sharefb".
 *
 * @property int $id
 * @property int $member_id
 * @property string $ip
 * @property string $create_time
 */
class MinigameSharefb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minigame_sharefb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id'], 'integer'],
            [['create_time'], 'safe'],
            [['ip'], 'string', 'max' => 255],
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
            'ip' => 'Ip',
            'create_time' => 'Create Time',
        ];
    }
}
