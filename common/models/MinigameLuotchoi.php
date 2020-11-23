<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minigame_luotchoi".
 *
 * @property int $id
 * @property int $member_id
 * @property int $luotchoi
 */
class MinigameLuotchoi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minigame_luotchoi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'luotchoi'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'luotchoi' => 'Luotchoi',
        ];
    }
}
