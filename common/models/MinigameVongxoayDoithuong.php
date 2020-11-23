<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minigame_vongxoay_doithuong".
 *
 * @property int $id
 * @property int $member_id
 * @property int $point
 * @property int $award_id
 * @property string $create_time
 */
class MinigameVongxoayDoithuong extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minigame_vongxoay_doithuong';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'point', 'award_id'], 'integer'],
            [['create_time'], 'safe'],
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
            'point' => 'Point',
            'award_id' => 'Award ID',
            'create_time' => 'Create Time',
        ];
    }
}
