<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "play_first".
 *
 * @property int $id
 * @property int $play_id
 */
class PlayFirst extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'play_first';
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
