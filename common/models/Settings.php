<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property string $site_title
 * @property string $site_description
 * @property string $social_google
 * @property string $social_fanpage
 * @property string $social_googleplus
 * @property string $social_youtube
 * @property string $site_address
 * @property string $site_phone
 * @property string $site_fax
 * @property string $site_email
 * @property string $site_sort_about
 * @property int $id
 * @property string $logo
 * @property string $brochure
 * @property string $site_email_tieude
 * @property string $site_email_body
 * @property string $site_email_success
 * @property string $site_email_host_smtp
 * @property string $site_email_username
 * @property string $site_email_passwords
 * @property string $site_email_support
 * @property int $site_email_port
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logo', 'brochure'], 'required'],
            [['site_email_body', 'site_email_success'], 'string'],
            [['site_email_port'], 'integer'],
            [['site_title', 'site_description', 'social_google', 'social_fanpage'], 'string', 'max' => 250],
            [['social_googleplus', 'social_youtube', 'site_address', 'site_phone', 'site_fax', 'site_email', 'site_sort_about', 'logo', 'brochure', 'site_email_host_smtp', 'site_email_username', 'site_email_passwords', 'site_email_support'], 'string', 'max' => 255],
            [['site_email_tieude'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'site_title' => 'Site Title',
            'site_description' => 'Site Description',
            'social_google' => 'Social Google',
            'social_fanpage' => 'Social Fanpage',
            'social_googleplus' => 'Social Googleplus',
            'social_youtube' => 'Social Youtube',
            'site_address' => 'Site Address',
            'site_phone' => 'Site Phone',
            'site_fax' => 'Site Fax',
            'site_email' => 'Site Email',
            'site_sort_about' => 'Site Sort About',
            'id' => 'ID',
            'logo' => 'Logo',
            'brochure' => 'Brochure',
            'site_email_tieude' => 'Site Email Tieude',
            'site_email_body' => 'Site Email Body',
            'site_email_success' => 'Site Email Success',
            'site_email_host_smtp' => 'Site Email Host Smtp',
            'site_email_username' => 'Site Email Username',
            'site_email_passwords' => 'Site Email Passwords',
            'site_email_support' => 'Site Email Support',
            'site_email_port' => 'Site Email Port',
        ];
    }
}
