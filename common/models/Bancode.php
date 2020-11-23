<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bancode".
 *
 * @property int $id
 * @property string $username
 * @property string $tencode
 * @property string $macode
 * @property string $date
 */
class Bancode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bancode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['tencode', 'macode'], 'string', 'max' => 200],
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
            'tencode' => 'Tencode',
            'macode' => 'Macode',
            'date' => 'Date',
        ];
    }
}
