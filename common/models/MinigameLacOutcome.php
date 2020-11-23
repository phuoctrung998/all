<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minigame_lac_outcome".
 *
 * @property int $id
 * @property int $member_id
 * @property int $flag_win
 * @property string $create_time
 */
class MinigameLacOutcome extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minigame_lac_outcome';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'flag_win'], 'integer'],
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
            'flag_win' => 'Flag Win',
            'create_time' => 'Create Time',
        ];
    }
}
