<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "giftcode".
 *
 * @property int $id
 * @property string $giftcode
 * @property int $status
 * @property int $member_id
 * @property int $type
 * @property int $create_time
 */
class Giftcode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'giftcode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'member_id', 'type', 'create_time'], 'integer'],
            [['giftcode'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'giftcode' 		=> 'Giftcode',
            'status' 		=> 'Trạng thái',
            'member_id'		=> 'Thành viên',
            'type' 			=> 'Loại code',
            'create_time' 	=> 'Create Time',
        ];
    }
}
