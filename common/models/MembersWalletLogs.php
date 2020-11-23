<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "members_wallet_logs".
 *
 * @property int $id
 * @property int $member_id
 * @property int $trans_id
 * @property int $xu
 * @property int $status 1: add xu - 2 : doi xu thanh vang
 * @property int $type
 * @property string $desc
 * @property int $is_gm
 * @property string $gm_description
 * @property string $create_time
 */
class MembersWalletLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'members_wallet_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'trans_id', 'xu', 'status', 'type', 'is_gm', 'trade_type', 'xu_real'], 'integer'],
            [['create_time'], 'safe'],
            [['desc', 'gm_description'], 'string', 'max' => 255],
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
            'trans_id' => 'Trans ID',
            'xu' => 'Xu',
            'status' => 'Status',
            'type' => 'Type',
            'desc' => 'Desc',
            'is_gm' => 'Is Gm',
            'gm_description' => 'Gm Description',
            'create_time' => 'Create Time',
			'trade_type' => 'Loại hình nạp',
			'xu_real'	 => 'xu_real',	
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
