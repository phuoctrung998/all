<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lathinh".
 *
 * @property int $id
 * @property string $username
 * @property string $date
 * @property int $reward
 */
class Lathinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lathinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['date'], 'safe'],
            [['reward'], 'integer'],
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
            'date' => 'Date',
            'reward' => 'Reward',
        ];
    }
}
