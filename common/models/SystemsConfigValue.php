<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "systems_config_value".
 *
 * @property int $systems_config_id
 * @property string $value
 */
class SystemsConfigValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'systems_config_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['systems_config_id'], 'required'],
            [['systems_config_id'], 'integer'],
            [['value'], 'string'],
            [['systems_config_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'systems_config_id' => 'Systems Config ID',
            'value' => 'Value',
        ];
    }
	
	public function getConfig(){
		return $this->hasOne(SystemsConfig::className(),['id' => 'systems_config_id']);
	}
}
