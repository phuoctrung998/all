<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "systems_config".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $data_type so,text,van ban..json vv
 * @property string $data
 * @property string $description
 */
class SystemsConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'systems_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			[['data_type', 'name', 'code'], 'required'],
            [['data'], 'string'],
            [['name', 'description'], 'string', 'max' => 255],
            [['code', 'data_type'], 'string', 'max' => 50],
			/*['data', 'required', 'when' => function($model) {
				return $model->data_type == 'json';
			}],*/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' 			=> 'ID',
            'name' 			=> 'Tên',
            'code' 			=> 'Mã',
            'data_type' 	=> 'Loại dữ liệu',
            'data' 			=> 'data (Chỉ xử dụng cho dạng mảng)',
            'description' 	=> 'Mô tả',
        ];
    }
	
	public function getConfigValue(){
		return $this->hasOne(SystemsConfigValue::className(),['systems_config_id' => 'id']);
	}
}
