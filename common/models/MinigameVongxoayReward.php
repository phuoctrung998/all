<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minigame_vongxoay_reward".
 *
 * @property int $id
 * @property string $name
 * @property string $images
 * @property string $quote
 * @property int $percent
 */
class MinigameVongxoayReward extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minigame_vongxoay_reward';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percent'], 'integer'],
            [['name', 'images', 'quote'], 'string', 'max' => 255],
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
            'images' => 'Images',
            'quote' => 'Quote',
            'percent' => 'Percent',
        ];
    }
}
