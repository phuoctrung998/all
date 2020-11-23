<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Servers;
use common\models\MinigameLoginTime;
use common\models\MinigameInviteFriend;
use common\models\MinigameLacOutcome;
use common\models\MinigameSharefb;
use common\models\MinigameTrieuhoiOutcome;
use common\models\MinigameHero;
class MinigameModel extends \yii\db\ActiveRecord{
	
	
	/***
		Add kết qua lắc xí ngầu
	**/
	public function AddLacOutcome($member_id,$flag_win)
	{
		$model = new MinigameLacOutcome();
		$model->member_id 	= $member_id;
		$model->flag_win 	= $flag_win;
		$model->create_time = date("Y-m-d H:i:s",time());
		if($model->save()){
			return true;
		}
		return false;
	}
	
	
	/***
		Add kết qua lắc xí ngầu
	**/
	public function countLacWinToday($member_id)
	{
		$count = MinigameLacOutcome::find()->where('member_id = :member_id AND flag_win =:flag_win AND create_time LIKE :create_time',[
			'member_id' 	=> $member_id,
			'flag_win' 		=> 1,
			'create_time' 	=> '%'.date("Y-m-d",time()).'%'
		])->count();
		return $count;
	}
	
	/***
		Đếm kết qua lắc xí ngầu
	**/
	public function countLuotLacToday($member_id)
	{
		$count = MinigameLacOutcome::find()->where('member_id = :member_id AND create_time LIKE :create_time',[
			'member_id' 	=> $member_id,
			'create_time' 	=> '%'.date("Y-m-d",time()).'%'
		])->count();
		return $count;
	}
	
	/***
		Add mời bạn
	**/
	public function AddIntiveFriend($member_id,$friend_id)
	{
		$model = new MinigameInviteFriend();
		$model->member_id 			= $member_id;
		$model->member_invite_id 	= $member_invite_id;
		$model->create_time 		= date("Y-m-d H:i:s",time());
		if($model->save()){
			return true;
		}
		return false;
	}
	
	/***
		Đếm số bạn mời trong ngày
	**/
	public function countFriendIntiveToday($member_id)
	{
		$count =  MinigameInviteFriend::find()->where('member_id = :member_id AND create_time LIKE :create_time',[
			'member_id' 	=> $member_id,
			'create_time' 	=> '%'.date("Y-m-d",time()).'%'
		])->count();
		return $count;
	}
	
	
	/***
		Add member moi đăng nhập
	**/
	public function addFirstLoginToday($member_id)
	{
		$os = '';
		if (\Yii::$app->mobileDetect->isMobile()) {
			$os = "mobile";
		}elseif(\Yii::$app->mobileDetect->isTablet()){
			$os = "tablet";
		} else {
			$os = "pc";
		}

		$model = new MinigameLoginTime();
		$model->member_id 	= $member_id;
		$model->member_os 	= $os;
		$model->create_time = date("Y-m-d H:i:s",time());
		if($model->save()){
			return true;
		}
		return false;
	}
	
	/***
		Kiểm tra member đã đăng nhập hôm nay chưa
	**/
	public function checkIssetFirstLoginTotay($member_id)
	{
		$count = MinigameLoginTime::find()->where(['member_id' => $member_id])->count();
		if($count > 0){
			return true;
		}
		return false;
	}
	
	/***
		Add Member Share Facebook
	**/
	public function addSharefb($member_id)
	{
		$model = new MinigameSharefb();
		$model->member_id 		= $member_id;
		$model->ip 				= getIpAddress();
		$model->create_time 	= date("Y-m-d H:i:s",time());
		if($model->save())
		{
			return true;
		}
		return false;
	}
	
	/***
		Kiểm tra member share fb chưa
	**/
	public function countSharefbToday($member_id)
	{
		$count = MinigameSharefb::find()->where('member_id = :member_id AND create_time LIKE :create_time',[
			'member_id' 	=> $member_id,
			'create_time' 	=> '%'.date("Y-m-d",time()).'%'
		])->count();
		if($count > 0){
			return true;
		}
		return false;
	}
	
	/** 
		Đếm số lượt chơi còn lại
		Đăng nhập lần đầu 		: nhận 5 lượt chơi 
		Mời bạn > 5 			: nhận 3 lượt chơi
		Lắc win 3 lần 1 ngày 	: nhận 3 lượt chơi
		Chia sẻ kết quả lên FB  : nhận 3 lượt chơi	(code pending...)
	**/
	public function countLuotChoi($member_id)
	{
		$total_luotchoi	= 0;
		$first_login_today 				= $this->checkIssetFirstLoginTotay($member_id);
		$number_friend_invite_today 	= $this->countFriendIntiveToday($member_id);
		$number_sharefb_today 			= $this->countSharefbToday($member_id);
		$number_lacwin_today			= $this->countLacWinToday($member_id);
		$number_lac_today				= $this->countLuotLacToday($member_id);
		

		if($first_login_today){
			$total_luotchoi += 3;
		}
		if($number_friend_invite_today >= 5){
			$total_luotchoi += 3;
		}
		if($number_lacwin_today >= 3){
			$total_luotchoi += 3;
		}
		if($number_sharefb_today >= 3){
			$total_luotchoi += 3;
		}
		$total_luotchoi = $total_luotchoi - $number_lac_today;
		return $total_luotchoi;
	}
	
	/***
		Đếm số luot lac win
	**/
	public function countLuotLacWin($member_id)
	{
		$count = MinigameLacOutcome::find()->where('member_id = :member_id AND flag_win =:flag_win',[
			'member_id' 	=> $member_id,
			'flag_win' 		=> 1,
		])->count();
		return $count;
	}
	
	/***
		Đếm số luot trieu hoi
	**/
	public function countLuotTrieuHoi($member_id)
	{
		$count = MinigameTrieuhoiOutcome::find()->where('member_id = :member_id',[
			'member_id' 	=> $member_id,
		])->count();
		return $count;
	}
	
	/***
		Đếm số luot trieu hoi
	**/
	public function getLuotTrieuHoiWin($member_id)
	{
		$model = MinigameTrieuhoiOutcome::find()->where('member_id = :member_id AND flag_win = :flag_win',[
			'member_id' 	=> $member_id,
			'flag_win' 		=> 1,
		])->all();
		if(empty($model)){
			return false;
		}
		return $model;
	}
	
	/***
		LẤY HERO WIN TRIEU HOI
	**/
	public function getHeroWin($arrayHero)
	{
		if(!empty($arrayHero)){
			$model = MinigameHero::find()
			->where(['not in','id',$arrayHero])
			->orderBy(new Expression('rand()'))
			->one();
		}else{
			$model = MinigameHero::find()
			->orderBy(new Expression('rand()'))
			->one();
		}
		if(empty($model)){
			return false;
		}
		return $model;
	}
	
	/***
		Add kết qua triệu hồi anh hùng
	**/
	public function AddTrieuHoiAnhHungOutcome($member_id,$flag_win,$hero_id)
	{
		$model = new MinigameTrieuhoiOutcome();
		$model->member_id 	= $member_id;
		$model->flag_win 	= $flag_win;
		$model->hero_id 	= $hero_id;
		$model->create_time = date("Y-m-d H:i:s",time());
		if($model->save()){
			return true;
		}
		return false;
	}
	/** 
		Đếm số lượt trieu hoi còn lại
	**/
	public function countLuotTrieuHoiConLai($member_id)
	{
		$total_trieuhoi_conlai	= 0;
		$num_luotlacwin 		= $this->countLuotLacWin($member_id);
		$num_luotdatrieuhoi 	= $this->countLuotTrieuHoi($member_id);
		$total_trieuhoi_conlai  = $num_luotlacwin - $num_luotdatrieuhoi;
		
		return $total_trieuhoi_conlai;
	}

	


}