<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "luckyserver".
 *
 * @property int $id
 * @property string $username_server
 * @property string $server
 */
class Luckyserver extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'luckyserver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username_server', 'server'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username_server' => 'Username Server',
            'server' => 'Server',
        ];
    }
}
