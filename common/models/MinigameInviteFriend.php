<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minigame_invite_friend".
 *
 * @property int $id
 * @property int $member_id
 * @property int $member_invite_id
 * @property string $create_time
 */
class MinigameInviteFriend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minigame_invite_friend';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'member_invite_id'], 'integer'],
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
            'member_invite_id' => 'Member Invite ID',
            'create_time' => 'Create Time',
        ];
    }
}
