<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "publisherplay_first".
 *
 * @property int $id
 * @property int $play_id
 */
class PublisherplayFirst extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publisherplay_first';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['play_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'play_id' => 'Play ID',
        ];
    }
}
