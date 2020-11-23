<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property int $role_id
 * @property string $role_name
 * @property string $role_module
 * @property string $role_controller
 * @property string $role_action
 * @property string $role_desc
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_desc'], 'string'],
            [['role_name', 'role_module', 'role_controller', 'role_action'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'role_module' => 'Role Module',
            'role_controller' => 'Role Controller',
            'role_action' => 'Role Action',
            'role_desc' => 'Role Desc',
        ];
    }
}
