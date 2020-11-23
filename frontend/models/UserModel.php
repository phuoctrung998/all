<?php 
namespace frontend\models;
use common\models\BaseModel;
use common\models\User;
use common\models\UserSubscribe;
use common\models\Topics;
use common\models\CredentialEmployment;
use common\models\CredentialEducation;
use common\models\CredentialLocation;
use common\models\Privacy;
use yii\data\ActiveDataProvider;
use yii\data\Sort;
use yii\db\Expression;
use yii\helpers\StringHelper;
use Yii;

class UserModel extends BaseModel
{
	public $id; // User creator
	public $profile_description;
	public $quotes;
	public $user_id;
	public $person_id;
	public $email;
	public $password;
	
	public $allow_index;
	public $allow_see_answer;
	public $allow_adult_content;
	public $allow_comment;
	public $config_message;
	
	public $notify_title;
	public $notify_email_frequency;
	public $notify_email_request;
	public $notify_best_answer;
	public $notify_can_answer;
	public $notify_request_your_answer;
	public $notify_upvote;
	public $notify_upvote_type;
	public $notify_someone_follow_you;
	public $notify_someone_follow_you_type;
	public $notify_suggest_follow;
	public $notify_new_message;
	public $notify_tag_your;
	public $notify_comment_your_action;
	public $notify_comment_your_action_type;
	public $notify_edit_action;
	public $notify_faq_topic_follow;
	/**
     * @inheritdoc
     */
    public $rules = [
        ['id', 'filter', 'filter' => 'trim'],
        ['id', 'filter', 'filter' => 'strip_tags'],
        [['id'], 'required'],
    ];
	
	public function rules()
    {
        return $this->rules;
    }

	public function attributeLabels()
    {
        return [
            'id' => 'id',
        ];
    }
	
	public function setRulesUpdateProfileDescription()
    {
        $this->rules = [
            // TODO UDPATE ID ANSWER EXITS IN TALBE ANSWER
            [['id'], 'filter', 'filter' => 'trim'],
            [['id'], 'filter', 'filter' => 'strip_tags'],
            [['id', 'profile_description'], 'required'],
        ];
    }

    public function setRulesAddEmail()
    {
        $this->rules = [
            // TODO UDPATE ID ANSWER EXITS IN TALBE ANSWER
            [['email'], 'email'],
            [['email'], 'required'],
            [['email'], 'unique', 'targetClass' => User::className()],
        ];
    }

    public function setRulesChangePassword()
    {
        $this->rules = [
            ['password', 'trim'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }


	public function setRulesUpdateProfileQuotes()
    {
        $this->rules = [
            // TODO UDPATE ID ANSWER EXITS IN TALBE ANSWER
            [['id'], 'filter', 'filter' => 'trim'],
            [['id', 'quotes'], 'filter', 'filter' => 'strip_tags'],
            [['id', 'quotes'], 'required'],
        ];
    }
	
	public function setRulesSubscribe()
	{
		$this->rules = [
			[['id'], 'filter', 'filter' => 'trim'],
			[['id'], 'integer'],
			[['id'], 'required']
		];
	}

	public function setRulesUpdatePrivacy()
	{
		$this->rules = [
		];
	}
	
	public function getUserById()
	{
		$model = User::findOne($this->id);
		if(empty($model))
		{
			throw new \Exception(" Không tìm thấy tài khoản này!",1);
		}
		return $model;
	}
	
	public function setProfileDescription()
	{
		$user = $this->getUserById();
		$user->profile_description = $this->profile_description;
		if($user->save())
		{
			return $user;
		}
		throw new \Exception("Có lỗi xảy ra vui lòng quay lại sau!", 1);
	}
	
	public function setProfileQuotes()
	{
		$user 	= $this->getUserById();
		$user->quotes = $this->quotes;
		if($user->save())
		{
			return $user;
		}
		throw new \Exception("Có lỗi xảy ra vui lòng quay lại sau!", 1);
	}
	
	
	public function subscribe()
    {
		$user = $this->getUserById();
		
        $model = UserSubscribe::find()->where([
            'person_id' => $user->id,
            'user_id' 	=> cuser()->id
        ])->one();
        if (!empty($model)) {
            return $model->delete();
        } else {
            $model = new UserSubscribe();
            $model->user_id 	= cuser()->id;
            $model->person_id 	= $this->id;
			$model->turn_on_notifications = 0;
            $model->save();
            return $model;
        }
    }
	
	public function getAuthorInfo()
	{
		$user = $this->getUserById();
		$employment = CredentialEmployment::find()->where(['user_id'=>$user->id])->one();
        $education	= CredentialEducation::find()->where(['user_id'=>$user->id])->one();
		$location	= CredentialLocation::find()->where(['user_id'=>$user->id])->one();
		if(!empty($employment)){
			return ', '.$employment->position.' tại '.$employment->topics->title;
		}
		elseif(!empty($location)){
			return ', Sống tại '.$location->topics->title;
		}
		elseif(!empty($education)){
			return ', '.$education->degree_type. 'tại' . $education->topicsconcentration->title;
		}
	}
	
	public function addEmail()
	{
		$this->id = cuser()->id;
		$user = $this->getUserById();
		$user->email = $this->email;
		return $user->save();
	}

	public function changePassword()
	{
		$this->id = cuser()->id;
		$user = $this->getUserById();
		$user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
		return $user->save();
	}

	public function updatePrivacy($name) 
	{
		$privacyModel = Privacy::find()->where(['user_id' => cuser()->id])->one();
		$privacyModel->$name = $this->$name;
		$privacyModel->save();
		return $privacyModel;
	}

	public function deactivate() 
	{
		$userModel = User::findOne(cuser()->id);
		$userModel->status = User::STATUS_DEACTIVE;
		$userModel->save();
		return $userModel;
	}

	public function deleteAccount() 
	{
		$userModel = User::findOne(cuser()->id);
		$userModel->status = User::STATUS_DELETED;
		$userModel->save();
		return $userModel;
	}
}
?>



