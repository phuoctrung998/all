<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SystemsConfig;

/**
 * SystemsConfigSearch represents the model behind the search form of `common\models\SystemsConfig`.
 */
class SystemsConfig extends SystemsConfig
{
    /**
     * {@inheritdoc}
     */
   public $value;
   
   public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['code', 'data_type'], 'string', 'max' => 20],
        ];
    }

}
