<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sharefb".
 *
 * @property int $id
 * @property string $username
 * @property string $time_share
 * @property int $type
 */
class Sharefb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sharefb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time_share'], 'safe'],
            [['type'], 'integer'],
            [['username'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'time_share' => 'Time Share',
            'type' => 'Type',
        ];
    }
}
