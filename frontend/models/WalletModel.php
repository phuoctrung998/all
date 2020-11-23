<?php 
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Servers;
use frontend\models\Members;
use common\models\MembersWalletLogs;
use common\models\MembersGmaddLogs;

class WalletModel extends Model{
	public $username;
	public $xu;
	public $trans_id;
	public $const_add_xu 	= 1;
	public $const_tieu_xu 	= 2;
	public $is_gm 			= 1;
	public $is_member		= 0;
	public $gm_description;
	
	public function getMemberXu(){
		
		$modelMember = new Members();
		$infoMember  = $modelMember->findByUsername($this->username);
		if(!empty($infoMember)){
			return $infoMember->member_xu;
		}
		return 0;
	}
	/**
		Action Nạp Xu
		- status : 0 Lỗi;
		- status : 1 thành công;
	**/
	public function addMemberXu(){
		$status = 0;
		$modelMember = new Members();
		$infoMember  = $modelMember->findByUsername($this->username);
		if(!empty($infoMember)){
			$memberXu  	=  $infoMember->member_xu;
			$xu   		=  $memberXu + $this->xu;
			$result 	=  $modelMember->updateXu($infoMember->member_id,$xu);
			if($result === true){
				$status = 1;
				$msg	= 'Bạn đã thêm xu thành công '.$this->xu.' vào ví';
			}
			else{
				$msg	= 'Có lỗi xảy ra vui lòng liên hệ Admin';
			}
			/**
				Add Log 
			**/
			$this->updateWalletLog(
				$infoMember->member_id,
				$this->xu,
				$status,
				$this->const_add_xu,
				$msg,
				$this->trans_id,
				$this->is_member
			);
		}else{
			$msg = "Tài khoản không tồn tại";
		}
		return $this->jsonResult($status,$msg);
	}
	
	/**
		Action Nạp Xu
		- status : 0 Lỗi;
		- status : 1 thành công;
	**/
	public function addMemberXuGM(){
		$status = 0;
		$modelMember = new Members();
		$infoMember  = $modelMember->findByUsername($this->username);
		if(!empty($infoMember)){
			$memberXu  	=  $infoMember->member_xu;
			$xu   		=  $memberXu + $this->xu;
			$result 	=  $modelMember->updateXu($infoMember->member_id,$xu);
			if($result == 1){
				return true;
			}
			else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	/**
		Tiêu phí xu
		status : 0 Lỗi;
		status : 1 thành công;
	**/
	public function subtractMemberXu(){
		$status 		= 0;
		$modelMember = new Members();
		$infoMember  = $modelMember->findByUsername($this->username);
		if(!empty($infoMember)){
			$memberXu  	=  $infoMember->member_xu;
			$memberXu	= (int)$infoMember->member_xu;
			if($this->xu < $memberXu){
				$xu  	 	= $memberXu - $this->xu;
				$result 	= $modelMember->updateXu($infoMember->member_id,$xu);
				if($result 	= 1){
					$status = 1;
					$msg	= 'Bạn đã chuyển thành công '.$this->xu.' vào game';
				}
				else{
					$msg	= 'Có lỗi xảy ra vui lòng liên hệ Admin';
				}
				/**
					Add Log 
				**/
				$this->updateWalletLog(
					$infoMember->member_id,
					$this->xu,
					$status,
					$this->const_add_xu,
					$msg,
					$this->trans_id,
					$this->is_member
				);
			}
			else{
				$msg	= 'Số xu tiêu phí nhiều hơn số xu bạn hiện có';
			}
			
		}else{
			$msg = "Tài khoản không tồn tại";
		}
		return $this->jsonResult($status,$msg);
	}
	
	 
	/**
		Tiêu phí xu
		status : 0 Lỗi;
		status : 1 thành công;
	**/
	public function subtractMemberXuGM(){
		$status 		= 0;
		$modelMember = new Members();
		$infoMember  = $modelMember->findByUsername($this->username);
		if(!empty($infoMember)){
			$memberXu  	=  $infoMember->member_xu;
			$memberXu	= (int)$infoMember->member_xu;
			if($this->xu < $memberXu){
				$xu  	 	= $memberXu - $this->xu;
				$result 	= $modelMember->updateXu($infoMember->member_id,$xu);
				if($result 	= 1){
					$status = 1;
					$msg	= 'GM trừ '.$this->xu.' từ ví '.$infoMember->member_username;
				}
				else{
					$msg	= 'Có lỗi xảy ra vui lòng liên hệ quản tri viên';
				}
				/**
					Add Log 
				**/
				$this->updateWalletLog(
					$infoMember->member_id,
					$this->xu,
					$status,
					$this->const_add_xu,
					$msg,
					'',
					$this->is_gm,
					$this->gm_description
				);
			}
			else{
				$msg	= 'Số xu trừ nhiều hơn số xu thành viên đang có';
			}
			
		}else{
			$msg = "Tài khoản không tồn tại";
		}
		return $this->jsonResult($status,$msg);
	}
	
	
	/**
		Action Nạp Vang
		- status : 0 Lỗi;
		- status : 1 thành công;
		MembersGmaddLogs
	**/
	public function addMemberGoldGm($member_username,$server_index,$member_gold,$description){
		$status = 0;
		
		if($member_username == '' || $member_gold == '' || $server_index == '' || $description == ''){
			$msg 	= "Vui lòng điền đầy đủ thông tin!";
		}
		
		$modelMember = new Members();
		$infoMember  = $modelMember->findByUsername($member_username);
		
		if(!empty($infoMember)){
			$wallet = new MembersGmaddLogs();
			$wallet->member_gold 		= $member_gold;
			$wallet->server_index 		= $server_index;
			$wallet->description 		= $description;
			$wallet->member_username 	= $infoMember->member_username;
			$wallet->create_time 		= date("Y-m-d H:i:s",time());
			if($wallet->save()){
				$msg 	= "Lưu thông tin add vàng thành công!";
				$status = 1;
			}else{
				$msg 	= "Lưu thông tin add vang thất bại !";
			}
		}else{
			$msg = "Tài khoản không tồn tại";
		}
		return $this->jsonResult($status,$msg);
	}
	
	
	/**
		function update log xu;
		status 1 : update add xu;
		status 2 : update xai xu;
	**/
	public function updateWalletLog($member_id,$xu,$status,$type,$desc,$trans_id,$is_gm=0,$gm_description = '')
	{
		$modelWalletLog = new MembersWalletLogs();
		$modelWalletLog->member_id		= $member_id;
		$modelWalletLog->trans_id		= $trans_id;
		$modelWalletLog->xu  			= $xu;
		$modelWalletLog->status			= $status;
		$modelWalletLog->type			= $type;
		$modelWalletLog->desc			= $desc;
		$modelWalletLog->is_gm			= $is_gm;
		$modelWalletLog->gm_description	= $gm_description;
		$modelWalletLog->create_time	= date("Y-m-d H:i:s",time());
		if($modelWalletLog->save()){
			return true;
		}
		else{
			return false;
		}
	}
	
	/**
		function update log xu;
		status 1 : update add xu;
		status 2 : update xai xu;
	**/
	public function updateWalletLogGM($member_id,$xu,$status,$type,$desc,$trans_id,$is_gm=0,$gm_description = '',$trade_type,$xu_real)
	{
		$modelWalletLog = new MembersWalletLogs();
		$modelWalletLog->member_id					= $member_id;
		$modelWalletLog->trade_type		= $trade_type;
		$modelWalletLog->trans_id		= $trans_id;
		$modelWalletLog->xu  			= $xu;
		$modelWalletLog->xu_real		= $xu_real;
		$modelWalletLog->status			= $status;
		$modelWalletLog->type			= $type;
		$modelWalletLog->desc			= $desc;
		$modelWalletLog->is_gm			= $is_gm;
		$modelWalletLog->gm_description	= $gm_description;
		$modelWalletLog->create_time	= date("Y-m-d H:i:s",time());
		if($modelWalletLog->save()){
			return true;
		}
		else{
			return false;
		}
	}
	
	
	
	public function jsonResult($status,$msg,$data=null)
	{
		return json_encode([
			'status' => $status,
			'msg'	 => $msg,
			'data'	 => $data
		]);
	}
}

?>