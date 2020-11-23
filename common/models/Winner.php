<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "winner".
 *
 * @property int $id
 * @property string $username
 * @property int $tencode
 * @property string $macode
 * @property string $date
 */
class Winner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'winner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tencode'], 'integer'],
            [['date'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['macode'], 'string', 'max' => 200],
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
