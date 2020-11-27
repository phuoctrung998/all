<?php
namespace frontend\models;

use common\models\Giftcode;
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
use common\models\MinigameVongxoayOutcome;
use common\models\MinigameHero;
use common\models\MinigameVongxoayReward;
use common\models\MinigameVongxoayDoithuong;
use frontend\models\Members;
class MinigameVongXoayModel extends \yii\db\ActiveRecord{
	
	
	/***
		Add kết qua vong quay
	**/
	public function AddVongxoayOutcome($member_id,$reward_id,$point,$images,$name)
	{
		$model = new MinigameVongxoayOutcome();
		$model->member_id 	= $member_id;
		$model->reward_id 	= $reward_id;
		$model->point		= $point;
		$model->images 		= $images;
		$model->name 		= $name;
		$model->create_time = date("Y-m-d H:i:s",time());
		if($model->save()){
			return true;
		}
		return false;
	}
	
	
	/***
		Đếm kết qua lắc xí ngầu
	**/
	public function countChoiToday($member_id)
	{
		$count = MinigameVongxoayOutcome::find()->where('member_id = :member_id AND create_time LIKE :create_time',[
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
		$count = MinigameLoginTime::find()->where('member_id = :member_id AND create_time LIKE :create_time',[
			'member_id' 	=> $member_id,
			'create_time' 	=> '%'.date("Y-m-d",time()).'%'
		])->count();
		if($count > 0){
			return true;
		}
		return false;
	}
	
	/***
		Đếm số lượt đăng nhập 
	**/
	public function countNumberMemberLogin($member_id)
	{
		$sql = "SELECT COUNT(*) as total  from minigame_login_time WHERE member_id = $member_id GROUP BY DATE(minigame_login_time.create_time)";
		$data = Yii::$app->db
            ->createCommand($sql)
            ->queryOne();
		return (int)$data['total'];	
	}
	
	/***
		Đếm số ngày đăng nhập
	**/
	public function countLoginDay($member_id)
	{
		$count = MinigameLoginTime::find()->where('member_id = :member_id',[
			'member_id' 	=> $member_id
		])->count();
		return $count;
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
	
	/***
		tổng lượt chia sẻ facebook
	**/
	public function countSharefbTotal()
	{
		$count = MinigameSharefb::find()->count();
		if($count > 0){
			return $count;
		}
		return false;
	}
	
	/***
		Kiểm tra outcome mat luot
	**/
	public function countMatLuot($member_id)
	{
		$count = MinigameVongxoayOutcome::find()->where('member_id = :member_id AND reward_id IN (:reward_id)',[
			'member_id' 	=> $member_id,
			'reward_id' 	=> '4,2' //	Mất lượt
		])->count();
		if($count > 0){
			return true;
		}
		return false;
	}
	
	/***
		Kiểm tra outcome mat luot
	**/
	public function countThemLuot($member_id)
	{
		$count = MinigameVongxoayOutcome::find()->where('member_id = :member_id AND reward_id = :reward_id',[
			'member_id' 	=> $member_id,
			'reward_id' 	=> 8 //	Mất lượt
		])->count();
		if($count > 0){
			return $count;
		}
		return 0;
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
		
		$modelMember 	= new Members();
		$infoMember  	= $modelMember->findIdentity($member_id);
		
		$total_luotchoi	= 0;
		$first_login_today 				= $this->checkIssetFirstLoginTotay($member_id);
		$number_sharefb_today 			= $this->countSharefbToday($member_id);
		$number_choi_today				= $this->countChoiToday($member_id); // lượt chơi hôm nay đã chơi
		$number_choi_themluot			= $this->countThemLuot($member_id); // lượt được thêm
		
		
		//$number_choi_matluot			= $this->countMatLuot($member_id); // lượt được thêm
		
		if($first_login_today){
			$total_luotchoi += 5;
		}
		if($number_sharefb_today >= 3){
			$total_luotchoi += 0;
		}
		
		/* tieu vang */
	
		/* end tieu vang*/
		$luotchoi_conlai = $total_luotchoi - $number_choi_today + $number_choi_themluot;
		return $luotchoi_conlai;
	}
	// Lịch sử triệu hồi ngọc
	public function getLichSuNgocTrieuHoi($member_id)
	{
		$models = MinigameVongxoayOutcome::find()->where('member_id = :member_id' ,[
			'member_id' 	=> $member_id,
			
		])->all();
		return $models;
	}
	// Túi ngọc đã triệu hồi được //
	public function countNgocTrieuHoi1($member_id)
	{
		$models = MinigameVongxoayOutcome::find('COUNT(reward_id)')->where('member_id = :member_id  AND reward_id = :reward_id' ,[
			'member_id' 	=> $member_id,
			'reward_id'		=> 1,
		])->all();
		return $models;
	}
	public function countNgocTrieuHoi2($member_id)
	{
		$models = MinigameVongxoayOutcome::find('COUNT(reward_id)')->where('member_id = :member_id  AND reward_id = :reward_id' ,[
			'member_id' 	=> $member_id,
			'reward_id'		=> 2,
		])->all();
		return $models;
	}
	public function countNgocTrieuHoi3($member_id)
	{
		$models = MinigameVongxoayOutcome::find('COUNT(reward_id)')->where('member_id = :member_id  AND reward_id = :reward_id' ,[
			'member_id' 	=> $member_id,
			'reward_id'		=> 3,
		])->all();
		return $models;
	}
	public function countNgocTrieuHoi4($member_id)
	{
		$models = MinigameVongxoayOutcome::find('COUNT(reward_id)')->where('member_id = :member_id  AND reward_id = :reward_id' ,[
			'member_id' 	=> $member_id,
			'reward_id'		=> 4,
		])->all();
		return $models;
	}
	public function countNgocTrieuHoi5($member_id)
	{
		$models = MinigameVongxoayOutcome::find('COUNT(reward_id)')->where('member_id = :member_id  AND reward_id = :reward_id' ,[
			'member_id' 	=> $member_id,
			'reward_id'		=> 5,
		])->all();
		return $models;
	}
	public function countNgocTrieuHoi6($member_id)
	{
		$models = MinigameVongxoayOutcome::find('COUNT(reward_id)')->where('member_id = :member_id  AND reward_id = :reward_id' ,[
			'member_id' 	=> $member_id,
			'reward_id'		=> 6,
		])->all();
		return $models;
	}
	public function countNgocTrieuHoi7($member_id)
	{
		$models = MinigameVongxoayOutcome::find('COUNT(reward_id)')->where('member_id = :member_id  AND reward_id = :reward_id' ,[
			'member_id' 	=> $member_id,
			'reward_id'		=> 7,
		])->all();
		return $models;
	}


	/**
		Phần thưởng vòng xoay
	**/

	public function getPhanThuongVongXoay(){
		return MinigameVongxoayReward::find()->all();
	}

	public function getCode1(){
		return Giftcode::find()->all();
	}
	
	public function getDiemByMemberId($member_id){
		$models = MinigameVongxoayOutcome::find('SUM(point)')->where('member_id = :member_id' ,[
			'member_id' 	=> $member_id,
		
		])->all();
		return $models;
	}
	/*
	public function getLongPhuongHoangByMemberId($member_id){
		$sql = "
			SELECT IFNULL(SUM(point),0) as point FROM minigame_vongxoay_outcome where
			reward_id IN (3,7)	AND
			member_id = $member_id
		";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryScalar();
	}
	*/
	/* Bảng xếp hạng long phuong hoang 
	public function getTopLongPhuongHoangMemberLimit($limit){
		$sql = "select IFNULL(SUM(point),0) as point,members.member_username FROM minigame_vongxoay_outcome 
			INNER JOIN members ON members.member_id = minigame_vongxoay_outcome.member_id
			WHERE
			reward_id IN (3,7) 
			AND DATE(create_time) BETWEEN '2020-03-31' AND '2020-04-06'
			GROUP BY minigame_vongxoay_outcome.member_id ORDER BY point DESC LIMIT $limit ";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryAll();
	}
	*/
	
	/* Bảng xếp hạng điểm 
	public function getTopPointMemberLimit($limit){,
		$sql = "Select members.member_username,IFNULL(SUM(point),0) as point from minigame_vongxoay_outcome 
				INNER JOIN members ON members.member_id = minigame_vongxoay_outcome.member_id
				GROUP BY minigame_vongxoay_outcome.member_id ORDER BY point DESC LIMIT $limit ";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryAll();
	}
	*/
	public function addBuyHero($member_id,$award_id,$point){
		$model = new MinigameVongxoayDoithuong();
		$model->member_id 	= $member_id;
		$model->award_id	= $award_id;
		$model->point		= $point;
		$model->create_time	= date("Y-m-d H:i:s",time());
		
		if($model->save()){
			return true;
		}
		return false;
	}
	
	public function countPointBuyHeroByMemberId($member_id){
		$sql = "SELECT IFNULL(SUM(point),0) as point from minigame_vongxoay_doithuong where member_id = $member_id ";
		return $data = Yii::$app->db
            ->createCommand($sql)
            ->queryScalar();
	}
	
	public function getHeroByMemberId($member_id){
		$models = MinigameVongxoayDoithuong::find()->where('member_id = :member_id',[
			'member_id' 	=> $member_id
		])->all();
		return $models;
	}
	
	
}