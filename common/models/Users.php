<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $user_id
 * @property string $user_username
 * @property string $user_password
 * @property string $user_fullname
 * @property int $user_status
 * @property int $group_id
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_status', 'group_id'], 'integer'],
            [['user_username', 'user_fullname'], 'string', 'max' => 50],
            [['user_password'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_username' => 'User Username',
            'user_password' => 'User Password',
            'user_fullname' => 'User Fullname',
            'user_status' => 'User Status',
            'group_id' => 'Group ID',
        ];
    }
}
