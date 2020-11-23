<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "members".
 *
 * @property int $member_id
 * @property string $member_code
 * @property string $member_username
 * @property string $member_password
 * @property string $member_fullname
 * @property string $member_email
 * @property string $member_phone
 * @property string $member_birthday
 * @property string $member_registerday
 * @property string $member_codeauthencation
 * @property int $member_authentication
 * @property int $member_block
 * @property string $member_description
 * @property string $member_ip
 * @property string $member_coderesetpass
 * @property int $member_getgiftcode
 * @property string $member_giftcode
 * @property string $member_logintime
 * @property string $member_loginserverslug
 * @property int $member_xu
 * @property int $member_is_gift
 * @property string $member_gift
 * @property int $member_2usd
 * @property int $member_ogames_id
 * @property string $member_facebook_url
 */
class Members extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_username', 'member_password', 'member_email'], 'required'],
            [['member_birthday', 'member_registerday', 'member_logintime'], 'safe'],
            [['member_authentication', 'member_block', 'member_getgiftcode', 'member_xu', 'member_is_gift', 'member_2usd', 'member_ogames_id'], 'integer'],
            [['member_description'], 'string'],
            [['member_code', 'member_username', 'member_password', 'member_giftcode', 'member_gift'], 'string', 'max' => 50],
            [['member_fullname', 'member_email'], 'string', 'max' => 100],
            [['member_phone', 'member_codeauthencation'], 'string', 'max' => 20],
            [['member_ip'], 'string', 'max' => 32],
            [['member_coderesetpass'], 'string', 'max' => 10],
            [['member_loginserverslug'], 'string', 'max' => 30],
            [['member_facebook_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'member_id' => 'Id',
            'member_code' => 'Member Code',
            'member_username' => 'Tài khoản',
            'member_password' => 'Mật khẩu',
            'member_fullname' => 'Họ tên',
            'member_email' => 'Email',
            'member_phone' => 'Sđt',
            'member_birthday' => 'Ngày sinh',
            'member_registerday' => 'Ngày đăng ký',
            'member_codeauthencation' => 'Member Codeauthencation',
            'member_authentication' => 'Member Authentication',
            'member_block' => 'Khóa',
            'member_description' => 'Member Description',
            'member_ip' => 'Ip',
            'member_coderesetpass' => 'Member Coderesetpass',
            'member_getgiftcode' => 'Member Getgiftcode',
            'member_giftcode' => 'Member Giftcode',
            'member_logintime' => 'Member Logintime',
            'member_loginserverslug' => 'Member Loginserverslug',
            'member_xu' => 'Xu',
            'member_is_gift' => 'Member Is Gift',
            'member_gift' => 'Member Gift',
            'member_2usd' => 'Member 2usd',
            'member_ogames_id' => 'Member Ogames ID',
            'member_facebook_url' => 'Member Facebook Url',
        ];
    }
}
