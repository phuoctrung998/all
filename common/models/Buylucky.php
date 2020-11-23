<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "buylucky".
 *
 * @property int $id
 * @property string $username
 * @property int $buy_amount
 * @property string $created_time
 */
class Buylucky extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buylucky';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buy_amount'], 'integer'],
            [['created_time'], 'safe'],
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
            'buy_amount' => 'Buy Amount',
            'created_time' => 'Created Time',
        ];
    }
}
