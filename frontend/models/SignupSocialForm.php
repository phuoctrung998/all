<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form by social
 */
class SignupSocialForm extends Model
{
    public $email;
    public $password;
    public $repassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [            
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'filter', 'filter' => 'strip_tags'],
            ['email', 'required', 'message' => 'Vui lòng nhập địa chỉ Email'],
            ['email', 'email', 'message' => 'Địa chỉ Email không hợp lệ'],
            ['email', 'string', 'max' => 255, 'message' => 'Độ dài Email không quá 255 ký tự'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Địa chỉ Email này đã được sử dụng'],
            
            ['password', 'filter', 'filter' => 'trim'],
            ['password', 'filter', 'filter' => 'strip_tags'],
            ['password', 'required', 'message' => 'Vui lòng nhập Mật khẩu'],
            ['password', 'string', 'min' => 6, 'message' => 'Mật khẩu ít nhất 6 ký tự'],

            ['repassword', 'filter', 'filter' => 'trim'],
            ['repassword', 'filter', 'filter' => 'strip_tags'],
            ['repassword', 'required', 'message' => 'Vui lòng nhập lại Mật khẩu'],
            ['repassword', 'string', 'min' => 6, 'message' => 'Mật khẩu nhập lại ít nhất 6 ký tự'],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Mật khẩu và Mật khẩu nhập lại không giống nhau'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'repassword' => 'Nhập lại Mật khẩu',
        ];
    }
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($fullname)
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->email;
            $user->email = $this->email;
            $user->fullname = base64_decode($fullname);
            $user->type = 0; // is member register
            $user->created_at = date("Y-m-d H:i:s", time());
            $user->updated_at = date("Y-m-d H:i:s", time());
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
