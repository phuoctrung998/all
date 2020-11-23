<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "publisherplay".
 *
 * @property int $id
 * @property int $member_id
 * @property string $login_game_time
 * @property int $server_id
 */
class Publisherplay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publisherplay';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'server_id'], 'integer'],
            [['login_game_time'], 'safe'],
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
            'login_game_time' => 'Login Game Time',
            'server_id' => 'Server ID',
        ];
    }
}
