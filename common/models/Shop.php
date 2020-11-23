<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property int $id
 * @property string $ten_code
 * @property string $ma_code
 * @property int $status
 * @property int $giashop_code
 * @property string $image
 * @property int $giagame_code
 * @property int $loai_code
 * @property string $chitiet_code
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'giashop_code', 'giagame_code', 'loai_code'], 'integer'],
            [['ten_code'], 'string', 'max' => 50],
            [['ma_code'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 1000],
            [['chitiet_code'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_code' => 'Ten Code',
            'ma_code' => 'Ma Code',
            'status' => 'Status',
            'giashop_code' => 'Giashop Code',
            'image' => 'Image',
            'giagame_code' => 'Giagame Code',
            'loai_code' => 'Loai Code',
            'chitiet_code' => 'Chitiet Code',
        ];
    }
}
