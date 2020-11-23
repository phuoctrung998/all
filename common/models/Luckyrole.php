<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "luckyrole".
 *
 * @property int $id
 * @property string $username
 * @property int $count
 * @property int $reward_1
 * @property string $reward_2
 * @property int $reward_3
 * @property int $reward_4
 * @property string $created_time
 * @property int $count_reward
 * @property int $check_share
 */
class Luckyrole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'luckyrole';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['count', 'reward_1', 'reward_3', 'reward_4', 'count_reward', 'check_share'], 'integer'],
            [['created_time'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['reward_2'], 'string', 'max' => 200],
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
            'count' => 'Count',
            'reward_1' => 'Reward 1',
            'reward_2' => 'Reward 2',
            'reward_3' => 'Reward 3',
            'reward_4' => 'Reward 4',
            'created_time' => 'Created Time',
            'count_reward' => 'Count Reward',
            'check_share' => 'Check Share',
        ];
    }
}
