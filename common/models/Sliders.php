<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sliders".
 *
 * @property int $id
 * @property string $title
 * @property string $images
 * @property string $url
 * @property string $description
 */
class Sliders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sliders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			[['sort','status'], 'integer'],
            [['description'], 'string'],
            [['title', 'images', 'url'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' 			=> 'ID',
			'status'		=> 'Trạng thái',
            'title' 		=> 'Tiêu đề',
            'images' 		=> 'Hình ảnh',
            'url' 			=> 'Url',
            'description' 	=> 'Mô tả',
			'sort' 			=> 'Số thứ tự',
        ];
    }
}
