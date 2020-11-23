<?php
namespace frontend\models;

use frontend\models\Members;
use yii\base\Model;
use Yii;
use yii\helpers\FileHelper;
use frontend\models\TrackingModel;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $member_username;
    public $password;
    public $repassword;
    public $member_fullname;
	public $member_email;
    public $verifyCode;
    public $google_id;
    public $google_token;
    public $avatar;
    public $fbid;
    public $fbtoken;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['member_fullname', 'filter', 'filter' => 'trim'],
            ['member_fullname', 'filter', 'filter' => 'strip_tags'],
            ['member_fullname', 'string', 'max' => 255, 'message' => 'Họ và tên không quá 255 ký tự'],
            
            ['member_username', 'filter', 'filter' => 'trim'],
            ['member_username', 'filter', 'filter' => 'strip_tags'],
            ['member_username', 'required', 'message' => 'Vui lòng nhập Username'],
            ['member_username', 'string', 'max' => 255, 'message' => 'Độ dài Username không quá 255 ký tự'],
            ['member_username', 'unique', 'targetClass' => '\frontend\models\Members', 'message' => 'Username này đã được sử dụng'],

            ['password', 'filter', 'filter' => 'trim'],
            ['password', 'filter', 'filter' => 'strip_tags'],
            ['password', 'required', 'message' => 'Vui lòng nhập Mật khẩu'],
            ['password', 'string', 'min' => 6, 'message' => 'Mật khẩu ít nhất 6 ký tự'],
			
			['member_email', 'filter', 'filter' => 'trim'],
            ['member_email', 'email'],
            ['member_email', 'string', 'max' => 255],
            //['member_email', 'unique', 'targetClass' => '\frontend\models\Members', 'message' => 'This email address has already been taken.'],
		
            ['repassword', 'filter', 'filter' => 'trim'],
            ['repassword', 'filter', 'filter' => 'strip_tags'],
            ['repassword', 'required', 'message' => 'Vui lòng nhập lại Mật khẩu'],
            ['repassword', 'string', 'min' => 6, 'message' => 'Mật khẩu nhập lại ít nhất 6 ký tự'],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Mật khẩu và Mật khẩu nhập lại không giống nhau']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_username' 	=> 'Tài khoản',
			'member_email'		=> 'Email',
            'password' 			=> 'Mật khẩu',
            'repassword' 		=> 'Nhập lại Mật khẩu',
            'member_fullname' 	=> 'Họ và tên',
        ];
    }
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!empty($this->google_id)) {
            $user = Members::find()->where(['member_username' => $this->member_username])->one();
            if (!empty($user)) {
				/* Add Source MKT */
				$member_id 		= $user->member_id;
				$username 		= $user->member_username;
				$trackingModel 	= new TrackingModel();
				$trackingModel->updateSourceAction($member_id,$username,$trackingModel->action_mkt_login);
				/* End Add MKT */
                return $user;
            } else {
                $this->password 	= 'gg'.$this->google_id;
				$this->repassword 	= $this->password;
            }
        }
        if (!empty($this->fbid)) {
            // Kiểm tra user đã tồn tại chưa niếu có rồi thì login.
            $user = Members::find()->where(['member_username' => $this->member_username])->one();
            if (!empty($user)) {
				/* Add Source MKT */
				$member_id 		= $user->member_id;
				$username 		= $user->member_username;
				$trackingModel 	= new TrackingModel();
				$trackingModel->updateSourceAction($member_id,$username,$trackingModel->action_mkt_login);
				/* End Add MKT */
                return $user;
            } else {
                $this->password 		= 'fb'.$this->fbid;
				$this->repassword 		= $this->password;
                $this->member_email 	= !empty($this->member_email) ? $this->member_email : 'fb.'.$this->fbid.'@mangaplay.vn';
            }
        }
        // MANUAL REGISTER
        if ($this->validate()) {
            $user = new Members();
            $user->member_fullname 		= $this->member_fullname;
            $user->member_username     	= $this->member_username;
            $user->member_email 		= $this->member_email;
			$user->member_ip 			= getIpAddress();
            $user->member_registerday 	= date("Y-m-d H:i:s", time());
            $user->setPassword($this->password);
            //$user->generateAuthKey();
           
            if(!empty($this->google_id) && !empty($this->google_token)){
                $user->member_google_id 	= $this->google_id;
                $user->member_google_token 	= $this->google_token;
            }
            if(!empty($this->fbid) && !empty($this->fbtoken)){
                $user->member_fbid 		= $this->fbid;
                $user->member_fbtoken 	= $this->fbtoken;
            }
			
            if ($user->save()) {
				/* Add Source MKT */
				$member_id 		= $user->member_id;
				$username 		= $user->member_username;
				$trackingModel 	= new TrackingModel();
				$trackingModel->updateSourceAction($member_id,$username,$trackingModel->action_mkt_register);
				/* End Add MKT */
                return $user;
            } else {
                throw new \Exception("Lỗi Máy Chủ. Không thể đăng kí.", 1);
            }
        }else
		{
			echo $this->fbid;
			print_r($user);
			print_r($this->getErrors());
		}
        return null;
    }
}
