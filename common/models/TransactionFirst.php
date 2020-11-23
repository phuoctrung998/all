<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction_first".
 *
 * @property int $id
 * @property int $transaction_id
 */
class TransactionFirst extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_first';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaction_id' => 'Transaction ID',
        ];
    }
}
