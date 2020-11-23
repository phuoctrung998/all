<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minigame_vongxoay_outcome".
 *
 * @property int $id
 * @property int $member_id
 * @property int $flag_win
 * @property int $reward_id
 * @property string $create_time
 */
class MinigameVongxoayOutcome extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minigame_vongxoay_outcome';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'flag_win', 'reward_id'], 'integer'],
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
            'reward_id' => 'Reward ID',
            'create_time' => 'Create Time',
        ];
    }
	
	public function getMember()
	{
		return $this->hasOne(Members::className(),['member_id' => 'member_id']);
	}
	public function getMembers()
	{
		return $this->hasOne(Members::className(),['member_id' => 'member_id']);
	}
}
