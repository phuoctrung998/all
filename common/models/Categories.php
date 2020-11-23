<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $cat_id
 * @property string $cat_name
 * @property string $cat_desc
 * @property int $cat_parent_id
 * @property string $cat_slug
 * @property string $cat_metakey
 * @property string $cat_metadesc
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_parent_id'], 'integer'],
            [['cat_metakey', 'cat_metadesc'], 'string'],
            [['cat_name', 'cat_desc'], 'string', 'max' => 250],
            [['cat_slug'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_name' 		=> 'Tên chuyên mục',
            'cat_desc' 		=> 'Mô tả',
            'cat_parent_id' => 'Danh mục gốc',
            'cat_slug' 		=> 'Slug',
            'cat_metakey' 	=> 'Meta Keywords',
            'cat_metadesc' 	=> 'Meta Description',
        ];
    }
	
	public function getCat(){
		return $this->hasOne(Categories::className(),['cat_id' => 'cat_parent_id']);
	}
}
