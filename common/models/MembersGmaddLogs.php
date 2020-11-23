<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "members_gmadd_logs".
 *
 * @property int $id
 * @property string $member_username
 * @property int $member_gold
 * @property int $server_index
 * @property string $description
 * @property string $create_time
 */
class MembersGmaddLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'members_gmadd_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_gold', 'server_index'], 'integer'],
            [['create_time'], 'safe'],
            [['member_username', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_username' => 'Member Username',
            'member_gold' => 'Member Gold',
            'server_index' => 'Server Index',
            'description' => 'Description',
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
