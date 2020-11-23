<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minigame_hero".
 *
 * @property int $id
 * @property string $name
 */
class MinigameHero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minigame_hero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','images'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
			'images' => 'images',
        ];
    }
}
