<?php
namespace backend\controllers;

use yii;
use  yii\web\Session;
use frontend\models\WalletModel;
use backend\models\DasboardModel;
use frontend\models\Members;
use frontend\models\GameModel;
use common\models\Transaction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AjaxController extends Controller{
	
	public function beforeAction($action) 
	{ 
		$this->enableCsrfValidation = false; 
		return parent::beforeAction($action); 
	}
	
	public function behaviors()
    {
        return [];
    }
	
	public function actionAddxu(){
		$dbtransaction = \Yii::$app->db->beginTransaction();
		try{
			$member_username 	= trim($_POST['member_username']);
			$member_xu	 	 	= trim($_POST['member_xu']);
			$member_xu_real	 	= trim($_POST['member_xu_real']);
			$gm_description	 	= trim($_POST['gm_description']);
			$trade_type			= (isset($_POST['trade_type'])) ? (int)$_POST['trade_type'] : 0;
			$trans_id	= (isset($_POST['trans_id'])) ? (int)$_POST['trans_id'] : 0;
			
			if(trim($member_username) == "" || trim($member_xu) == "" || trim($member_xu_real)== "" ){
				$msg = "Vui lòng điền đầy đủ thông tin trước khi nạp xu";
				return $this->jsonOut(true,$msg,['status' => 0]);
			}
			
			if(trim($gm_description) == ""){
				$msg = "Vui lòng điền nội dung trước khi nạp xu";
				return $this->jsonOut(true,$msg,['status' => 0]);
			}
			if($trade_type == 0){
				$msg = "Vui lòng chọn loại hình nạp thẻ";
				return $this->jsonOut(true,$msg,['status' => 0]);
			}
			if($trade_type == 5){
				if($trans_id == 0){
					$msg = "Vui lòng điền mã giao dịch";
					return $this->jsonOut(true,$msg,['status' => 0]);
				}
				
				$transModel 	= new Transaction();
				$transaction 	= $transModel->findByTransId($trans_id);
				if(empty($transaction)){
					$msg = "Mã giao dịch không tồn tại hãy xác nhận lại";
					return $this->jsonOut(true,$msg,['status' => 0]);
				}
				if($transaction->trans_status == 1){
					$msg = "Mã giao dịch đã thành công trước đó";
					return $this->jsonOut(true,$msg,['status' => 0]);
				}
			}	
				
			$memberModel = new Members();
			$infoMember  = $memberModel->findByUsername($member_username);
			if (!isset($infoMember['member_username'])){
				$msg = "Không tìm thấy thành viên trong hệ thống";
				return $this->jsonOut(true,$msg,['status' => 0]);
			}
			
			/** log ví **/
			$wallet 				= new WalletModel();
			$wallet->username 		= $member_username;
			$wallet->xu		  		= $member_xu;
			$wallet->gm_description = $gm_description;
			$result 		  		= $wallet->addMemberXuGM();
			if($result == true){
				$status = 1;
				$msg		= 'Bạn đã thêm xu thành công '.$member_xu.' vào ví';
				$flag_log 	= $wallet->updateWalletLogGM(
					$infoMember->member_id,
					$member_xu,
					$status,
					$wallet->const_add_xu,
					$msg,
					$trans_id,
					$wallet->is_gm,
					$gm_description,
					$trade_type,
					$member_xu_real
				);
				if($flag_log == true){
					if($trade_type == 5){
						$transModel = new Transaction();
						$flag_update_status_transaction = $transModel->updateStatusByTransId($trans_id);
						if($flag_update_status_transaction == true){
							$dbtransaction->commit();	
							return $this->jsonOut(false,$msg,['status' => $status,'xu' => $member_xu]);
						}else{
							$dbtransaction->rollBack();
							$msg 	= 'Lỗi hệ thống, kiểm tra lại compensation id ';
							return $this->jsonOut(true,$msg,['status' => 0]);
						}
					}else{
						$dbtransaction->commit();	
						return $this->jsonOut(false,$msg,['status' => $status,'xu' => $member_xu]);
					}	
				}else{
					$dbtransaction->rollBack();
					$msg 	= 'Lỗi hệ thống';
					$status = 0;
					return $this->jsonOut(true,$msg,['status' => $status,'xu' => $member_xu]);
				}
				
				
			}else{
				$dbtransaction->rollBack();
				$msg 	= 'Lỗi hệ thống';
				$status = 0;
				return $this->jsonOut(true,$msg,['status' => $status,'xu' => $member_xu]);
			}
			 
		}catch (\Exception $e) {
			$dbtransaction->rollBack();
			$msg 	= 'Lỗi hệ thống'.$e->getMessage();
            return $this->jsonOut(true,$msg,['status' => 0]);
        }
	}
	
	public function actionTruxu(){
		
			$member_username 	= $_POST['member_username'];
			$member_xu	 	 	= $_POST['member_xu'];
			$gm_description	 	= $_POST['gm_description'];
			
			if(trim($member_username) == "" || trim($member_xu) == "" ){
				$msg = "Vui lòng điền đầy đủ thông tin trước khi trừ xu";
				return $this->jsonOut(true,$msg,['status' => 0]);
			}
			
			if(trim($gm_description) == ""){
				$msg = "Vui lòng điền nội dung trước khi trừ xu";
				return $this->jsonOut(true,$msg,['status' => 0]);
			}
			
			$memberModel = new Members();
			$infoMember  = $memberModel->findByUsername($member_username);
			if (empty($infoMember->member_username)){
				$msg = "Không tìm thấy thành viên trong hệ thống";
				return $this->jsonOut(true,$msg,['status' => 0]);
			}
			
			if($infoMember->member_xu < $member_xu){
				$msg = "Số xu trong ví của Member: ".$infoMember->member_username. " không đủ để thực hiện giao dịch";
				return $this->jsonOut(true,$msg,['status' => 0]);
			}
			$wallet 				= new WalletModel();
			$wallet->username 		= $member_username;
			$wallet->xu		  		= $member_xu;
			$wallet->gm_description = $gm_description;
			$result 		  		= $wallet->subtractMemberXuGM();
			$result 		  		= json_decode($result);
			if($result->status){
				$msg 	= $result->msg;
				$status = 1;
			}else{
				$msg 	= $result->msg;
				$status = 0;
			}
			return $this->jsonOut(false,'true',['status' => $status,'xu' => $member_xu]);
		
	}
	
	/** add vang in game cho member **/
	public function actionAddgold()
	{
		$gameModel  	= new GameModel();
		$member_username = trim($_POST['member_username']);
		$server_index	 = trim($_POST['slserver_index']);
		$knb	 	 	 = trim($_POST['member_knb']);
		$desc	 	 	 = trim($_POST['member_desc']);
		
		$status = 0;
		$msg	= '';
		
		if($member_username == "" || $server_index == "" || $knb == "" || $desc == ""){
			$msg = "Vui lòng điền đầy đủ thông tin trước khi nạp vàng";
			return $this->jsonOut(true,$msg,['status' => 0]);
		}
		$knb_ingame 	= $knb;
		$memberModel 	= new Members();
		$infoMember  	= $memberModel->findByUsername($member_username);
		if (empty($infoMember->member_username)){
			$msg = "Không tìm thấy thành viên trong hệ thống";
			return $this->jsonOut(true,$msg,['status' => 0]);
		}
		
		$resultPayment 	= $gameModel->paymentIngame($server_index,$infoMember->member_username,$knb_ingame);
		if($resultPayment->ret==0){
			$wallet 	= new WalletModel();
			$result 	= $wallet->addMemberGoldGm($infoMember->member_username,$server_index,$knb,$desc);
			$msg = 'Chuyển thành công '.$knb.' vàng vào game cho tài khoản '.$infoMember->member_username;
			return $this->jsonOut(false,$msg,['status' => 1]);
		}else{
			$msg = 'GM tool add vàng có vấn đề, F5 và thử lại '.json_encode($resultPayment);
			return $this->jsonOut(true,$msg,['status' => 0]);
		}
		
	}
	
	public static function jsonOut($error, $msg = null, $data = []) {
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = [
            'error' => $error, 
            'msg' 	=> $msg,
            'data' 	=> $data,
        ];
        return $response;
    }
	
	
}
?>