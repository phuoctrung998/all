<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $post_id
 * @property string $post_title
 * @property string $post_featured_image
 * @property string $post_author
 * @property int $post_cat_id
 * @property string $post_content
 * @property string $post_datetime
 * @property int $post_related_id
 * @property string $post_slug
 * @property string $post_options
 * @property string $post_metakey
 * @property string $post_metadesc
 * @property int $is_timer
 * @property string $timer
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_cat_id', 'post_related_id', 'is_timer', 'is_hot'], 'integer'],
            [['post_content', 'post_metakey', 'post_metadesc'], 'string'],
            [['post_datetime', 'post_options', 'timer'], 'safe'],
            [['post_title'], 'string', 'max' => 250],
            [['post_featured_image', 'post_slug'], 'string', 'max' => 150],
            [['post_author'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' 				=> 'Id',
            'post_title' 			=> 'Tiêu đề',
            'post_featured_image' 	=> 'Hình ảnh',
            'post_author' 			=> 'Tác giả',
            'post_cat_id' 			=> 'Chuyên mục',
            'post_content' 			=> 'Nội dung',
            'post_datetime' 		=> 'Ngày tháng',
            'post_related_id' 		=> 'Id bài viết liên quan',
            'post_slug' 			=> 'Đường dẫn',
            'post_options' 			=> 'Post Options',
            'post_metakey' 			=> 'Seo Keywords',
            'post_metadesc' 		=> 'Seo Description',
            'is_timer' 				=> 'Hẹn giờ',
			'is_hot'				=> 'Hot',
            'timer' 				=> 'Thời gian hẹn giờ',
        ];
    }
	
	public function getCat(){
		return $this->hasOne(Categories::className(),['cat_id' => 'post_cat_id']);
	}
	public function getCategories(){
		return $this->hasOne(Categories::className(),['cat_id' => 'post_cat_id']);
	}
}
