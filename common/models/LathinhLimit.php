<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lathinh_limit".
 *
 * @property int $id
 * @property string $username
 * @property int $limit_user
 */
class LathinhLimit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lathinh_limit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['limit_user'], 'integer'],
            [['username'], 'string', 'max' => 200],
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
            'limit_user' => 'Limit User',
        ];
    }
}
