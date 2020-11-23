<?php
namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * User create form
 */
class UserCreateForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repassword;
    public $status;
	public $type;
	public $is_clone;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['repassword', 'required'],
            ['repassword', 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password'],
            
            ['status', 'integer'],
            ['status', 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'repassword' => 'Password repeat',
            'status' => 'Status',
            'is_clone' => 'Tài khoản clone',
        ];
    }
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username 	= $this->username;
            $user->email 		= $this->email;
            $user->status 		= $this->status;
            $user->created_at 	= date("Y-m-d H:i:s", time());
            $user->updated_at 	= date("Y-m-d H:i:s", time());
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
			else
			{
				var_dump($user->getErrors());
			}
        }

        return null;
    }
}
