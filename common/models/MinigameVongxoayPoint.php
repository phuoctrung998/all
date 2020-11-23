<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minigame_vongxoay_point".
 *
 * @property int $id
 * @property int $member_id
 * @property int $member_point
 * @property string $flag
 * @property string $update_time
 */
class MinigameVongxoayPoint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minigame_vongxoay_point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'member_point'], 'integer'],
            [['update_time'], 'safe'],
            [['flag'], 'string', 'max' => 255],
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
            'member_point' => 'Member Point',
            'flag' => 'Flag',
            'update_time' => 'Update Time',
        ];
    }
}
