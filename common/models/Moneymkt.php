<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "moneymkt".
 *
 * @property int $id
 * @property string $source
 * @property int $money
 */
class Moneymkt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'moneymkt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['money'], 'integer'],
            [['source'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'source' => 'Source',
            'money' => 'Money',
        ];
    }
}
