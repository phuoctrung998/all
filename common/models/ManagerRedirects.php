<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manager_redirects".
 *
 * @property int $id
 * @property int $teaser_login_type
 * @property string $teaser_login_customurl
 * @property int $teaser_register_type
 * @property string $teaser_register_customurl
 * @property int $homepage_login_type
 * @property string $homepage_login_customurl
 * @property int $homepage_register_type
 * @property string $homepage_register_customurl
 * @property int $landing_login_type
 * @property string $landing_login_customurl
 * @property int $landing_register_type
 * @property string $landing_register_customurl
 * @property string $homepage_choingay_customurl
 * @property string $teaser_choingay_customurl
 * @property string $landing_choingay_customurl
 */
class ManagerRedirects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $population;
	public $arrayTeaserLoginType = array(
		'1' => 'Chuyển hướng tới máy chủ mới nhất',
		'2' => 'Chuyển hướng tới máy chủ chơi gần đây nhất',
		'3' => 'Đường dẫn tùy chỉnh',
	);
	
	public $arrayTeaserRegisterType = array(
		'1' => 'Chuyển hướng tới máy chủ mới nhất',
		'2' => 'Đường dẫn tùy chỉnh',
	);
	
	public $arrayHomepageLoginType = array(
		'1' => 'Chuyển hướng tới máy chủ mới nhất',
		'2' => 'Chuyển hướng tới máy chủ chơi gần đây nhất',
		'3' => 'Đường dẫn tùy chỉnh',
	);
	
	public $arrayHomepageRegisterType = array(
		'1' => 'Chuyển hướng tới máy chủ mới nhất',
		'2' => 'Đường dẫn tùy chỉnh',
	);
	
	public $arrayLandingLoginType = array(
		'1' => 'Chuyển hướng tới máy chủ mới nhất',
		'2' => 'Chuyển hướng tới máy chủ chơi gần đây nhất',
		'3' => 'Đường dẫn tùy chỉnh',
	);
	
	public $arrayLandingRegisterType = array(
		'1' => 'Chuyển hướng tới máy chủ mới nhất',
		'2' => 'Đường dẫn tùy chỉnh',
	);
	
    public static function tableName()
    {
        return 'manager_redirects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teaser_login_type', 'teaser_register_type', 'homepage_login_type', 'homepage_register_type', 'landing_login_type', 'landing_register_type'], 'integer'],
            [['teaser_login_customurl', 'teaser_register_customurl', 'homepage_login_customurl', 'homepage_register_customurl', 'landing_login_customurl', 'landing_register_customurl', 'homepage_choingay_customurl', 'teaser_choingay_customurl', 'landing_choingay_customurl'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teaser_login_type' => 'Teaser Login Type',
            'teaser_login_customurl' => 'Teaser Login Customurl',
            'teaser_register_type' => 'Teaser Register Type',
            'teaser_register_customurl' => 'Teaser Register Customurl',
            'homepage_login_type' => 'Homepage Login Type',
            'homepage_login_customurl' => 'Homepage Login Customurl',
            'homepage_register_type' => 'Homepage Register Type',
            'homepage_register_customurl' => 'Homepage Register Customurl',
            'landing_login_type' => 'Landing Login Type',
            'landing_login_customurl' => 'Landing Login Customurl',
            'landing_register_type' => 'Landing Register Type',
            'landing_register_customurl' => 'Landing Register Customurl',
            'homepage_choingay_customurl' => 'Click nút Chơi Ngay',
            'teaser_choingay_customurl' => 'Click nút Chơi Ngay',
            'landing_choingay_customurl' => 'Click nút Chơi Ngay',
        ];
    }
}
