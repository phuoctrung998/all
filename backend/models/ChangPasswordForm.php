<?php
namespace backend\models;

use yii\base\Model;
use Yii;
use common\models\User;

/**
 * User change password
 */
class ChangPasswordForm extends Model
{
    public $oldpassword;
    public $password;
    public $repassword;

    private $_user;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['oldpassword', 'required'],
            ['oldpassword', 'string', 'min' => 6],
            ['oldpassword', 'validateOldpassword'],
            
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['repassword', 'required'],
            ['repassword', 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'oldpassword' => 'Password',
            'password' => 'New password',
            'repassword' => 'New password repeat',
        ];
    }
    
    /**
     * Validates the old password.
     * This method serves as the inline validation for old password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateOldpassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->oldpassword)) {
                $this->addError($attribute, 'Incorrect old password.');
            }
        }
    }
    
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername(Yii::$app->user->identity->username, 1);
        }

        return $this->_user;
    }
    
    /**
     * Update new password.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function update()
    {
        if ($this->validate()) {
            if ($this->_user === null) {
                $user = User::findByUsername(Yii::$app->user->identity->username, 1);
            }else{
                $user = $this->_user;
            }            
            $user->setPassword($this->password);
            $act = $user->save(false);
            if (!$act) {
                $err = 'Update new password fail, please try again';
                $this->addError('password', $err);
            } else {
                return $user;
            }
        }

        return null;
    }
}
