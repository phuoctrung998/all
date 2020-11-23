<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "publisher".
 *
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property int $status 0: not active, 1: active, -1: deleted
 * @property string $username
 * @property string $password
 */
class Publisher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publisher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['username', 'password'], 'string', 'max' => 50],
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
            'desc' => 'Desc',
            'status' => 'Status',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
