<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "spam".
 *
 * @property int $id
 * @property string $username_spam
 * @property string $link_spam
 * @property string $source_spam
 */
class Spam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spam';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username_spam', 'link_spam', 'source_spam'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username_spam' => 'Username Spam',
            'link_spam' => 'Link Spam',
            'source_spam' => 'Source Spam',
        ];
    }
}
