<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "giftcode_type".
 *
 * @property int $id
 * @property string $name
 * @property int $code
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 */
class GiftcodeType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'giftcode_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'status', 'create_time', 'update_time'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Loại Gifcode',
            'code' => 'Mã code',
            'status' => 'Trạng thái',
            'create_time' => 'Ngày tạo',
            'update_time' => 'Cập nhật',
        ];
    }
}
