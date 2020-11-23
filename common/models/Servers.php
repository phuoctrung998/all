<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "servers".
 *
 * @property int $server_id
 * @property string $server_index
 * @property string $server_name
 * @property int $server_status
 * @property string $server_slug
 * @property string $server_linklogingame
 * @property string $server_linkpayment
 * @property string $server_link1
 * @property string $server_link2
 * @property string $server_link3
 * @property int $server_hot
 * @property int $server_promotion
 * @property int $server_is_timer
 * @property string $server_timer
 * @property string $server_label
 */
class Servers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			 [['server_status', 'server_name', 'server_slug', 'server_index'], 'required'],
            [['server_status', 'server_hot', 'server_promotion', 'server_is_timer'], 'integer'],
            [['server_timer'], 'safe'],
            [['server_index'], 'string', 'max' => 10],
            [['server_name'], 'string', 'max' => 50],
            [['server_slug'], 'string', 'max' => 30],
            [['server_linklogingame', 'server_linkpayment', 'server_link1', 'server_link2', 'server_link3'], 'string', 'max' => 200],
            [['server_label'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'server_id' 			=> 'Id máy chủ',
            'server_index' 			=> 'Mã máy chủ',
            'server_name' 			=> 'Tên máy chủ',
            'server_status' 		=> 'Trạng thái',
            'server_slug' 			=> 'Đường dẫn',
            'server_linklogingame' 	=> 'Server Linklogingame',
            'server_linkpayment' 	=> 'Server Linkpayment',
            'server_link1' 			=> 'Server Link1',
            'server_link2' 			=> 'Server Link2',
            'server_link3' 			=> 'Server Link3',
            'server_hot' 			=> 'Server Hot',
            'server_promotion' 		=> 'Khuyến mãi',
            'server_is_timer' 		=> 'Hẹn giờ',
            'server_timer' 			=> 'Thời gian hẹn giờ',
            'server_label' 			=> 'Nhãn',
        ];
    }
}
