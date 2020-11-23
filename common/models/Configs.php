<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "configs".
 *
 * @property int $id
 * @property int $promotion_card
 * @property int $promotion_sms
 * @property int $down_client
 * @property int $down_patch
 * @property int $down_autopk_plugin
 */
class Configs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'configs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['promotion_card', 'promotion_sms', 'down_client', 'down_patch', 'down_autopk_plugin'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'promotion_card' => 'Promotion Card',
            'promotion_sms' => 'Promotion Sms',
            'down_client' => 'Down Client',
            'down_patch' => 'Down Patch',
            'down_autopk_plugin' => 'Down Autopk Plugin',
        ];
    }
}
