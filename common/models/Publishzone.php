<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "publishzone".
 *
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property int $publisher_id
 * @property int $status 0: not active, 1: active, -1: deleted
 */
class Publishzone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publishzone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['publisher_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 200],
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
            'publisher_id' => 'Publisher ID',
            'status' => 'Status',
        ];
    }
}
