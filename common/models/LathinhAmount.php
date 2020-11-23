<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lathinh_amount".
 *
 * @property int $id
 * @property int $reward
 * @property int $amount
 */
class LathinhAmount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lathinh_amount';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reward', 'amount'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reward' => 'Reward',
            'amount' => 'Amount',
        ];
    }
}
