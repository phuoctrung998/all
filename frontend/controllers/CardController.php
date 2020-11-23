<?php 
namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use frontend\models\GameModel;
use frontend\models\ServerModel;
use frontend\models\TransactionModel;
use frontend\models\PaymentModel;
use frontend\models\telco\Plus247Model;
use frontend\models\telco\HtlinkModel;
use frontend\models\telco\AcclubModel;
use frontend\models\Members;
use frontend\models\WalletModel;
class CardController extends Controller
{
	public $const_add_xu 	= 1;
	public $const_tieu_xu 	= 2;
	
	public function beforeAction($action) 
	{ 
		$this->enableCsrfValidation = false; 
		return parent::beforeAction($action); 
	}
	public function actionIndex()
	{
		if(Yii::$app->user->isGuest){
			return $this->goHome();
		}
		$model 			= new ServerModel();
		$list_servers	= $model->getAllServersOrderByDesc();
		
		$username 		= Yii::$app->user->identity->member_username;
		$modelMember 	= new Members();
		$infoMember  	= $modelMember->findByUsername($username);
		
		
		$modelListTypePayment = new PaymentModel();
		$dataPaymentViettel = $modelListTypePayment->getAllPaymentTypeListByCardType('viettel');
		$dataPaymentMobi 	= $modelListTypePayment->getAllPaymentTypeListByCardType('mobi');
		$dataPaymentVina 	= $modelListTypePayment->getAllPaymentTypeListByCardType('vina');
		$dataPaymentGate 	= $modelListTypePayment->getAllPaymentTypeListByCardType('gate');
		
		
		
		return $this->render('index',[
			'dataPaymentViettel' 	=> $dataPaymentViettel,
			'dataPaymentMobi' 		=> $dataPaymentMobi,
			'dataPaymentVina' 		=> $dataPaymentVina,
			'dataPaymentGate' 		=> $dataPaymentGate,
			'list_servers'			=> $list_servers,
			'infoMember'			=> $infoMember
		]);
	}
	
	public function actionCardInGame()
	{
		$this->layout 	= false;
		$modelApiGame	= new GameModel();
		$username 		= $_GET['username'];
		$game_sign 		= $_GET['sign'];
		$serverid 		= $_GET['serverid'];
		$ext 			= $_GET['ext'];
		if(empty($username) && empty($sign)){
			die('Vui lòng nạp lại sau ít phút hoặc nạp thẻ trực tiếp trên trang chủ ThongLinhSuH5.com !');
		}
		$api_payment_key		= $modelApiGame->api_payment_key;
		$dataSign 		= array(
			'username' 	=> $username,
			'serverid'	=> $serverid,
			'ext'		=> $ext,
		);
		
		$sign 			= createSign($dataSign,$api_payment_key);
		if($sign != $game_sign){
			die('Xác thực không chính xác vui lòng đăng nhập lại game !');
		}
		$model 			= new ServerModel();
		$list_servers	= $model->getAllServersOrderByDesc();
		
		$modelListTypePayment = new PaymentModel();
		$dataPaymentViettel = $modelListTypePayment->getAllPaymentTypeListByCardType('viettel');
		$dataPaymentMobi 	= $modelListTypePayment->getAllPaymentTypeListByCardType('mobi');
		$dataPaymentVina 	= $modelListTypePayment->getAllPaymentTypeListByCardType('vina');
		$dataPaymentGate 	= $modelListTypePayment->getAllPaymentTypeListByCardType('gate');
		
		$modelMember 	= new Members();
		$infoMember  	= $modelMember->findByUsername($username);
		
		return $this->render('card-in-game',[
			'username' 				=> $username,
			'dataPaymentViettel' 	=> $dataPaymentViettel,
			'dataPaymentMobi' 		=> $dataPaymentMobi,
			'dataPaymentVina' 		=> $dataPaymentVina,
			'dataPaymentGate' 		=> $dataPaymentGate,
			'list_servers'			=> $list_servers,
			'serverid'				=> $serverid,
			'infoMember'			=> $infoMember
		]);
	}
	
	public function actionTestPayment(){
		$this->layout 	= false;
		$gameApiModel 		= new GameModel();
		$serverid 			= crequest()->get('serverid');
		$pid 				= crequest()->get('pid');
		$total_fee 			= crequest()->get('kc');
		/*
		$jsonPaymentResult 	= $gameApiModel->apiRole(
			$pid,
			$serverid
		);
		*/
		$jsonPaymentResult 	= $gameApiModel->paymentIngame(
		$serverid,
		$pid,
		$total_fee);
		
		print_r($jsonPaymentResult);
		exit;
	}
	
	
	public function actionPayment(){
		date_default_timezone_set('Asia/Saigon');
		
		$gameApiModel 		= new GameModel();
        $serverModel 		= new ServerModel();
		$transactionModel   = new TransactionModel(); 
        $status 			= 0;
		$trans_status		= 0;
        $msg 				= '';
		$coin				= 0;
        $coin_affter 		= 0;
		$coin_real 			= 0;
		$percent_promotion 	= 0;
		
		$server_id 			= crequest()->post('sltserver');
		$server_id 			= intval($server_id);
		$card_seri 			= crequest()->post('card_seri');
		$card_code 			= crequest()->post('card_code');
		$card_type 			= crequest()->post('card_type');
		$username			= crequest()->post('username');
		
		//$data = crequest()->post();
		//var_dump($data);exit;
		//echo $username;exit;
		
		$modelMember 	= Members::findByUsername($username);
		
		if(empty($modelMember)){
			$msg = "Không tìm thấy tài khoản vui lòng đăng nhập lại trước khi nạp thẻ.";
			return  $this->jsonResult($status,$msg,$coin_affter);
		}
		
		if (empty($card_type) || empty($card_seri) || empty($card_code)){
			$msg = "Vui lòng chọn đầy đủ thông tin trước khi nạp thẻ.";
			return  $this->jsonResult($status,$msg,$coin_affter);
		}
		
		$amount 			= trim(crequest()->post('card_amount'));
		$payment_partner 	= trim(crequest()->post('payment_partner'));
		$loainap 			= trim(crequest()->post('stlLoainap'));
		$trans_compensation	= time();
		
		
		/** Kiem tra tai khoan co ton tai khong **/
		if ($modelMember->member_block == 0){
			$msg = "Tài khoản bị khóa nạp tạm thời, vui lòng liên hệ Admin để được hỗ trợ .";
			return  $this->jsonResult($status,$msg,$coin_affter);
		}
		$member_id 		 =  $modelMember->member_id;
		$member_username =  $modelMember->member_username;
		
		/** 
			Kiem tra Loai Nap la nap xu hay nap vang 
			- Nap xu khong can chon server + Khong can check api nhan vat
		**/
		if($loainap == 1){ // nap vang
			if ($server_id <= 0){
				$msg = 'Vui lòng chọn server để nạp kim cương!';
				return $this->jsonResult($status,$msg,$coin_affter);
			}
		
			/** Kiem tra may chu co con tai hay khong **/
			$server = $serverModel->getServerById($server_id);
			
			if (empty($server->server_name)){
				$msg = "Server không tồn tại, vui lòng thử lại";
				return  $this->jsonResult($status,$msg,$coin_affter);
			}
			$server_index 	= intval($server['server_index']);
			
			//Kiểm tra tài khoản có nhân vật chưa
			$characterIngame = $gameApiModel->apiRole($member_username,$server_index);
			if($characterIngame->ret != 0){ // kiem tra user co ton tai trong he thong khong
				$msg = "Tài khoản chưa tạo nhân vật vui lòng kiểm tra lại";
				return  $this->jsonResult($status,$msg,$coin_affter);
			}
		}elseif($loainap == 2){ // nap xu
			$server_index = 0;
		}else{
			$msg = 'Vui lòng chọn server để nạp!';
			return $this->jsonResult($status,$msg,$coin_affter);
		}
		
			
		//BAT DAU XU LY TUNG CONG NAP THE 
		if($payment_partner == 'ramopay'){ // RAMOPAY
			//ADD LOG TO DB AND FILE
			$trans_id = $transactionModel->addLogTransactionStepOne(
				$server_index, 
				$member_id, 
				$coin, 
				$coin_real, 
				$trans_compensation, 
				$card_type, 
				$card_code, 
				$card_seri,
				$percent_promotion, 
				$payment_partner,
				$loainap,
				$member_username
			);	
			
			$payment_result 		= $this->ramopay($card_seri,$card_code,$amount,$card_type,$trans_compensation);
			$payment_result 		= json_decode($payment_result,true);
			$payment_result_code	= 99; // code fake de tranh loi
			if(isset($payment_result['errorCode'])){
				$payment_result_code 	= intval($payment_result['errorCode']);
			}
			
			if($payment_result_code == 0){
				$_SESSION[$member['member_username'].'numpayment'] = 0;
				$status			= 1;
				$msg 			= "Vui lòng kiểm tra kim cương trong game. Nếu chưa thấy kim cương, hãy liên hệ admin để biết được hỗ trợ tốt nhất.";
				$_SESSION[$member['member_username'].'numpayment'] = 0;
				/** Check First Payment**/
				$this->checkFirstPayment($member['member_id'],$trans_id);
			}else{
				$_SESSION[$member['member_username'].'numpayment']  = $_SESSION[$member['member_username'].'numpayment'] + 1;
				if($payment_result_code == -1){
					$msg = "Dữ liệu truyền lên không đúng.";
				}elseif($payment_result_code == -2){
					$msg = "Sai chữ ký.";
				}elseif($payment_result_code == -4){
					$msg = "Mã giao dịch đã tồn tại trên hệ thống.";
				}elseif($payment_result_code == -3){
					$msg = "Không tìm thấy đối tác.";
				}else{
					$msg = "Có lỗi xảy ra vui lòng liên hệ Admin để được hỗ trợ.";
				}
			}
			$this->jsonResult($status,$msg,$coin_affter); 
		
		}elseif($payment_partner == 'htlink'){ //HTLINK
			
			$htlinkModel = new HtlinkModel();
			$transaction_status = 0;
			$order_amount		= 0;
			//ADD LOG TO DB AND FILE
			$trans_id = $this->addLogTransactionStepOne(
				$server_index, 
				$member_id, 
				$coin, 
				$coin_real, 
				$trans_compensation, 
				$card_type, 
				$card_code, 
				$card_seri,
				$percent_promotion, 
				$payment_partner,
				$loainap,
				$member_username
			);	
			
			
			// CHECK THE...
			if($card_type == 'gate'){ // CARD GATE HTLINK
				$payment_result 	= $htlinkModel->htlinkGate($member_username,$card_seri,$card_code,$card_type,$trans_compensation);
			}
			else{
				$payment_result 	= $htlinkModel->htlinkTelcos($member_username,$card_seri,$card_code,$amount,$card_type,$trans_compensation);
			}
			
			$payment_result_code 	= $payment_result['ResponseCode'];
			$payment_result_amount  = intval($payment_result['ResponseContent']);
			$payment_result_msg		= trim($payment_result['Description']);
			
			// XU LY ADD THE 
			if($payment_result_code == 1){
				$amount 		= $payment_result_amount;		
				$order_amount 	= $amount; // DOI THE QUA VANG
				/**
					Kiểm tra loại nạp thẻ HTLINK
					1 : nạp kim cương
					2 : nạp xu
				**/
				if($loainap == 1){
					
					$gameApiModel	 	= new GameModel();
					$characterIngame 	= $gameApiModel->apiRole($member_username,$server_index);
					$jsonPaymentResult 	= $gameApiModel->paymentIngame(
						$member_username,
						$gameApiUserId,
						$server_index,
						$type_nap,
						$trans_compensation,
						$order_amount
					);
						
					if($jsonPaymentResult->ret == 0){
						
						$status 			= 1;
						$transaction_status = 1;
						$msg 				= "Bạn đã chuyển thành công ".$order_amount." KNB vào game";
						$coin 				= $order_amount;
						$coin_real 			= $amount;
						
						/** Check First Payment**/
						$this->checkFirstPayment($member_id,$trans_id);
					}else{
						$status 			= 0;
						$transaction_status = 0;
						$msg = "Đã nhận thẻ nhưng tiền chưa vào game, Vui Lòng Liên Hệ Admin ".$jsonPaymentResult->msg;
					}

				}else if($loainap == 2){
					
					/** htlink khong can check **/
					$wallet 		  = new WalletModel();
					$wallet->username = $member_username;
					$wallet->xu		  = $order_amount;
					$wallet->trans_id = $trans_id;
					$wallet->addMemberXu();
					$status 			= 1;
					$transaction_status = 1;
					$msg = "Bạn đã nạp xu thành công ".$order_amount." xu vào ví!";
				}
				else
				{
					$msg = " Có lỗi xảy ra vui lòng thông báo với BQT game để được hỗ trợ ! ";
				}

				
			}else{
				 echo $msg_error = $htlinkModel->htlinkErrorMessages($payment_result_code);
				 $msg 		= ' Lỗi số: '.$payment_result_code .' '. $payment_result_msg .' '. $msg_error;
			}
			/** END XU LY ADD THE **/
			
			$transactionModel->transactionStepTwo2($trans_compensation, $transaction_status, $msg, $order_amount, $amount);
			return $this->jsonResult($status,$msg,$coin_affter);
		
		}elseif($payment_partner == 'btcvn'){ //BTCVN
		
			$coin 		= 0;
			$coin_real 	= 0;
			$trans_compensation = crequest()->post('trans_id');
			
			//ADD LOG TO DB AND FILE
			$trans_id = $this->addLogTransactionStepOne(
				$server_index, 
				$member_id, 
				$coin, 
				$coin_real, 
				$trans_compensation, 
				$card_type, 
				$card_code, 
				$card_seri,
				$percent_promotion, 
				$payment_partner,
				$loainap,
				$member_username
			);
			
			if($trans_compensation > 0){
				$status = 1;
				$msg = 'Thẻ đang được xử lý vui lòng đợi trong ít phút. Nếu vẫn không thấy kim cương vui lòng liên hệ Admin hỗ trợ.';
				return $this->jsonResult($status,$msg,$coin_affter);
			}
			else{
				return $this->jsonResult($status,$msg = 'Có lỗi xảy ra vui lòng liên hệ Admin.' ,$coin_affter);
			}
		}elseif($payment_partner == 'mrbinh'){
				
				$transaction_status = 0;
				$order_amount		= 0;
				//ADD LOG TO DB AND FILE
				if($card_type == 0){
					$card_type_db = "VT";
				}elseif($card_type==1){
					$card_type_db = "Vina";
				}elseif($card_type==2){
					$card_type_db = "Mobi";
				}
				$trans_id = $this->addLogTransactionStepOne(
					$server_index, 
					$member_id, 
					$coin, 
					$coin_real, 
					$trans_compensation, 
					$card_type_db, 
					$card_code, 
					$card_seri,
					$percent_promotion, 
					$payment_partner,
					$loainap,
					$member_username
				);
				
				/** Tien hanh gui post giao dich **/
				$payModel = new Default_Model_ChargeMrBinh();
				$payModel->api_provider 	= $card_type;
				$payModel->card_number 		= $card_code;
				$payModel->card_serial 		= $card_seri;
				$payModel->amount 			= $amount;
				$payModel->transaction_id 	= (string)$trans_compensation;
				$payment_result 			= $payModel->mrbinh_charge_gate();
				/** Ket thuc post giao dich **/
				
				$payment_result_code	= 9999; // code fake de tranh loi
				if(isset($payment_result['error'])){
					$payment_result_code = intval($payment_result['error']);
				}
				$msg = $payModel->mrBinhErrorMessages($payment_result_code);
				
				//LOG FILE
				$file_name = 'logs/log_mrbinh.txt';
				$this->addLogCallback(json_encode($payment_result),$file_name,$msg);
				$this->jsonResult($status,$msg,$coin_affter);
				
		}elseif(trim($payment_partner) == 'push247'){
				
				//ADD LOG TO DB AND FILE
				$trans_id = $this->addLogTransactionStepOne(
					$server_index, 
					$member_id, 
					$coin, 
					$coin_real, 
					$trans_compensation, 
					$card_type, 
					$card_code, 
					$card_seri,
					$percent_promotion, 
					$payment_partner,
					$loainap,
					$member_username
				);	
				
				/** Tien hanh gui post giao dich **/
				$payModel 					= new Plus247Model();
				$payModel->type 			= $card_type;
				$payModel->code 			= $card_code;
				$payModel->serial 			= $card_seri;
				$payModel->money 			= $amount;
				$payModel->tranid 			= (string)$trans_compensation;
				$payment_result 			= $payModel->charge();
				
				$payment_result_array 		= json_decode($payment_result,true);
				$payment_result_status		= $payment_result_array['stt'];
				if($payment_result_status == 1){
					$payment_result_code		= $payment_result_array['data']['statuscode'];
					if($payment_result_code == 00){
						$_SESSION[$member['member_username'].'numpayment'] = 0;
						$status			= 1;
						$msg 			= "Vui lòng kiểm tra vàng trong game. Nếu chưa thấy vàng, hãy liên hệ admin để biết được hỗ trợ tốt nhất.";
						$_SESSION[$member['member_username'].'numpayment'] = 0;
						/** Check First Payment**/
						$this->checkFirstPayment($member['member_id'],$trans_id);
					}else{
						//$_SESSION[$member['member_username'].'numpayment']  = $_SESSION[$member['member_username'].'numpayment'] + 1;
						$msg = $payModel->errorMsg($payment_result_code);
					}
				}else{
					$msg = $payment_result_array['msg'];
				}
				
				return $this->jsonResult($status,$msg,$coin_affter); 
				exit;
				/** Ket thuc post giao dich **/
		}elseif(trim($payment_partner) == 'acclub'){
			
			//ADD LOG TO DB AND FILE
			$trans_id = $this->addLogTransactionStepOne(
				$server_index, 
				$member_id, 
				$coin, 
				$coin_real, 
				$trans_compensation, 
				$card_type, 
				$card_code, 
				$card_seri,
				$percent_promotion, 
				$payment_partner,
				$loainap,
				$member_username
			);	
			if(!empty($trans_id)){	
				$app = new AcclubModel();
				$transaction = $app->cardAdd($card_seri, $card_code, $card_type, $amount, (string)$trans_compensation);//gửi thẻ về epbank.vn
				if(!$reponseData){
					$msg   = "Có lỗi xảy ra vui lòng nạp lại thẻ của bạn sau ít phút !";
					return $this->jsonResult($status,$msg); 
				}
				$reponseObj = json_decode($reponseData);
				if($reponseObj->errorCode == 0) {
					$status			= 1;
					$msg 			= "Vui lòng kiểm tra kim cương trong game. Nếu chưa thấy kim cương, hãy liên hệ admin để biết được hỗ trợ tốt nhất.";
					$session[$member_username.'numpayment'] = 0;
					/** Check First Payment**/
					$this->checkFirstPayment($member_id,$trans_id);
					return $this->jsonResult($status,$msg); 
				} else {
					$msg   = $reponseObj->msg;
					return $this->jsonResult($status,$msg); 
				}
			}else{
				$msg   = "Có lỗi xảy ra vui lòng nạp lại thẻ của bạn sau ít phút !";
				return $this->jsonResult($status,$msg); 
			}
		}else{
			$msg = "Chưa kết nối với cổng Payment vui lòng liên hệ Admin.";
			return $this->jsonResult($status,$msg,$coin_affter);
			exit;
		}
        
        return $this->jsonResult($status,$msg='errors',$coin_affter);
		exit;
    }
	
	/** 
		Callback Telco Push247
	**/
	public function actionCallbackPush247()
	{
		$transactionModel = new TransactionModel();
		$apiKey 		= "ec8eed35d03979a2145d481b723ae378";
		// Takes raw data from the request
		$json = file_get_contents('php://input');
		$json_request	= $json;
		$json_decode 	= json_decode($json,true);
		// Converts it into a PHP object
			
		$status	 		= 	$json_decode['stt']; 
		$signature 		= 	$json_decode['sign'];
		$msg_callback 	= 	$json_decode['msg'];
		$data 			= 	$json_decode['data'];
		
		/**SET LOG**/
		$date_time 		= date('Y-m-d H:i:s', time());
		$file_name 		= 'logs/log_push247_callback.txt';
		$this->addLogCallback(json_encode($json_request),$file_name,$msg="Time".$date_time);
		/**END SET LOG**/
		
		$amount	 				= $data['menhGiaThat'];
		$trans_compensation		= $data['tranid'];
		$statuscode				= $data['statuscode'];
		$cardSerial				= $data['cardSerial'];
		$cardType				= $data['cardType'];
		$menhGiaNhapVao			= $data['menhGiaNhapVao'];
		//echo $trans_compensation;exit;
		$msg_error			 = "";
		$msg				 = '';
		$transaction_status  = 0;
		$order_amount 		 = 0;
		$percent_promotion	 = 0;
		$coin				 = 0;
		$coin_real			 = 0;
		
		$sign = md5($apiKey . $trans_compensation. $cardSerial . $cardType . $menhGiaNhapVao . $statuscode);
		if($trans_compensation != '' && ($sign == $signature)) {
			$screen_result 		= 'Callback thành công';
			$transaction 		= $transactionModel->getTransactionByTranCompensation($trans_compensation);
			//print_r($transaction);
			if(!empty($transaction)){
				if($status == 1 && $statuscode == '00'){ // SUCCESS
					$server_index		= $transaction->server_id;
					$transaction_status = $transaction->trans_status;
					if($transaction_status != 1){
						$order_amount 	= $amount; // DOI THE QUA VANG
						$memberModel 	= new Members();
						
						$member 		= $memberModel->findIdentity($transaction->member_id);
						$uid 			= $member->member_username;
						$loainap		= (int)$transaction->trans_loainap;
						/**
							Kiểm tra loại nạp thẻ 
							1 : nạp kim cương
							2 : nạp xu
						**/
						$gameApiModel	= new GameModel();
						$total_fee 		= $gameApiModel->getRateGold($order_amount);
						if($loainap == 2){
							/** Đã check ti le nap the total_fee **/
							$wallet 	= new WalletModel();
							$wallet->username = $member->member_username;
							$wallet->xu		  = $total_fee;
							$wallet->trans_id = $transaction->trans_id;
							$wallet->addMemberXu();
							
							$msg = "Bạn đã nạp xu thành công ".$total_fee." xu vào ví!";
							$status 			= 1;
							$transaction_status = 1;
							$transactionModel->transactionStepTwo2($trans_compensation, $transaction_status, $msg, $total_fee, $amount);
							
							
						}else{
							/** nap vao game **/
							
							$characterIngame 	= $gameApiModel->apiRole(
								strtolower($member->member_username),
								$server_index
							);
							if($characterIngame->ret == 0){
								$jsonPaymentResult 	= $gameApiModel->paymentIngame(
									$server_index,
									strtolower($member->member_username),
									$order_amount
								);
								/** end nap vao game **/
								if($jsonPaymentResult->ret == 0){
									$status 			= 1;
									$transaction_status = 1;
									$msg 				= "Bạn đã chuyển thành công ".$total_fee." KNB vào game";
									$coin 				= $total_fee;
									$coin_real 			= $amount;
								}else{
									$transaction_status = 0;
									$msg = "Đã nhận thẻ nhưng tiền chưa vào game, Vui Lòng Liên Hệ Admin".json_encode($jsonPaymentResult);
								}
							}else{
								$transaction_status = 0;
								$msg = "Đã nhận thẻ nhưng tiền chưa vào game, tài khoản chưa tạo nhân vật, Vui Lòng Liên Hệ Admin";
							}
							
							$transactionModel->transactionStepTwo2($trans_compensation, $transaction_status, $msg, $total_fee, $amount);
						}
						
					}
					else{
						$msg = 'Transaction đã được thực hiện thành công trước đó';
						$screen_result 	= $msg;
					}
				}
				else
				{ // FAILS
					$transaction_status = 0;
					$payModel 	= new Plus247Model();
					$msg_error 	= $payModel->errorMsg($statuscode);
					$msg = 'Lỗi '.$status.$msg_error.'';
					$transactionModel->transactionStepTwo2($trans_compensation, $transaction_status, $msg, $order_amount, $amount);
				}
				
				// SET LOG FILE TRANSACTION CALLBACK OKE
				$file_name = 'logs/log_push247_ok_callback.txt';
				$this->addLogCallback(json_encode($json_request),$file_name,$msg);
			}
			else{
				//NOT FIND TRANSACTION COMPENSATION ID
				$screen_result 	= 'Lỗi không tìm thấy trans_compensation .';
				$file_name = 'logs/log_push247_error_callback.txt';
				$this->addLogCallback(json_encode($json_request),$file_name,'Lỗi không tìm thấy trans_compensation .');
			}
			
		}
		else
		{
			$screen_result 	= 'Lỗi callback sai thông tin';
			// SET LOG ERROR
			$file_name = 'logs/log_push247_error_callback.txt';
			$this->addLogCallback(json_encode($json_request),$file_name,'Lỗi trans_compensation hoặc sign không đúng.');
		}
		
		die($screen_result);
	}
	
	//GATE BTCVN
	public function actionPostbackBtcvn(){
		/**
			Log Request
		**/
		$file_name = 'logs/btcvn_callback.txt';
		$this->addLogCallback(json_encode($_REQUEST),$file_name,$msg="request: ");
		
		$transactionModel 	= new TransactionModel();
		$date_time 			= date('Y-m-d H:i:s', time());
		$trans_compensation = (isset($_REQUEST['trans_id'])) ? trim($_REQUEST['trans_id']) : '';
		$trans_status 		= 0;
		$msg		  		= '';
		
		//die($trans_compensation);
		
		if(isset($trans_compensation))
		{
			$amount 	= $_REQUEST['amount'];
			$order_amount = $amount;
			$status 	= $_REQUEST['status'];
			$serial 	= $_REQUEST['serial'];
			$time 		= $_REQUEST['timestamp'];
			
			$sign 		= $_REQUEST['sign'];
			$vendor_id 	= $_REQUEST['vendor_id'];
			$secret 	= 'f5396dfe4ba9febc958e61f115d7d5bf';
			
			$sign_md5 		=  md5($status.$amount.$serial.$vendor_id.$time.$secret);
			
			
			if($sign != $sign_md5){
				$msg 			= 'không đúng chữ kí!' ;
				$trans_status 	= 0;
				$file_name 		= 'logs/btcvn_callback_errors.txt';
				$this->addLogCallback(json_encode($_POST),$file_name,$msg);
				die($msg);
			}
			
			$transaction 		= $transactionModel->getTransactionByTranCompensation($trans_compensation); 
			
			if($transaction){
				$loainap		= (int)$transaction->trans_loainap;
				$server_index	= $transaction->server_id;
				$member_id		= $transaction->member_id;
				
				if($transaction->trans_status == 1){
					$msg 		= 'Giao dịch đã được hoàn tất trước đó';
					$file_name 	= 'logs/btcvn_callback_errors.txt';
					$this->addLogCallback(json_encode($_POST),$file_name,$msg);
					die($msg);
				}
				
				/**
					Kiểm tra loại nạp thẻ RAMOPAY
					1 : nạp kim cương
					2 : nạp xu
				**/
				if($status == 1){
					$gameApiModel	= new GameModel();
					$modelMember 	= new Members();
					$member  		= $modelMember->findIdentity($member_id);
					$uid 			= $member->member_username;
					$total_fee 		= $gameApiModel->getRateGold($amount);
					
					if($loainap == 1){
						/** nap vang vao game **/
						$characterIngame = $gameApiModel->apiRole(strtolower($member->member_username),$server_index);
						if($characterIngame->ret != 0){
							$msg 			= 'Đã nhận được thẻ, nhưng tài khoản chưa tạo nhân vật'.json_encode($characterIngame);
							$trans_status 	= 0;
							$transactionModel->transactionStepTwo2(
								$trans_compensation, 
								$trans_status, 
								$msg, 
								$total_fee, 
								$amount
							);
							$file_name = 'logs/btcvn_callback_errors.txt';
							$this->addLogCallback(json_encode($_POST),$file_name,$msg);
							die($msg);
						}
						
						$jsonPaymentResult 	= $gameApiModel->paymentIngame(
							$server_index,
							strtolower($member->member_username),
							$amount
						);
						/** end nap vang vao game **/
						
						$msg 	= 'Nạp thành công '.$total_fee. ' kim cương vào game';
						if($jsonPaymentResult->ret == 0){
							$trans_status 	= 1;
						}else{
							$msg = "Đã nhận thẻ nhưng tiền chưa vào game, Vui Lòng Liên Hệ Admin".json_encode($jsonPaymentResult);
							$trans_status 	= 0;
						}
						$transactionModel->transactionStepTwo2($trans_compensation, $trans_status, $msg, $total_fee, $amount);
					}else{
						
						/** Đã quy đổi giá trị total_fee **/
						$wallet 			= new WalletModel();
						$wallet->username 	= $member->member_username;
						$wallet->xu		  	= $total_fee;
						$wallet->trans_id 	= $transaction->trans_id;
						$result 			= $wallet->addMemberXu();
						$result 			= json_decode($result);
						if($result->status == 1){
							$msg 			= $result->msg;
							$trans_status 	= 1;
						}else{
							$msg 			= $result->msg;
							$trans_status 	= 0;
						}
						$transactionModel->transactionStepTwo2(
							$trans_compensation, 
							$trans_status, 
							$msg, 
							$total_fee, 
							$amount
						);
					}
					
					$file_name = 'logs/btcvn_callback_success.txt';
					$this->addLogCallback(json_encode($_POST),$file_name,$msg);
					die($msg);	
				}
				else
				{
					switch($status){
						case 15:
							$msg 		= 'Thẻ đã được sử dụng (15).';
							break;
						case 16:
							$msg 		= 'Thẻ không tồn tại hoặc chưa được kích hoạt (16).';
							break;
						case 17:
							$msg 		= 'Thông tin mã thẻ không đúng định dạng (17).';
							break;	
						case 18:
							$msg 		= 'Mã thẻ và số serial thẻ không khớp (18).';
							break;
						case 19:
							$msg 		= 'Thẻ đã hết hạn sử dụng (19).';
							break;
						case 21:
							$msg 		= 'Thẻ đã bị khóa (21).';
							break;
						case 22:
							$msg 		= 'Tài khoản bị tạm khóa vì nhập thẻ sai nhiều lần (22).';
							break;
						case 23:
							$msg 		= 'Serial va PIN không tồn tai (23).';
							break;
						case 24:
							$msg 		= 'Đối tác kết nối telco không hợp lệ (24).';
							break;
						case 25:
							$msg 		= 'Thẻ không tồn tại (25).';
							break;							
						case 26:
							$msg 		= 'Đầu thẻ không được hỗ trợ (26).';
							break;
						default:
							$msg 		= 'Nạp tiền không thành công, lỗi nhà mạng';	
					}
					
					$trans_status 	= 0;
					$transactionModel->transactionStepTwo2($transaction->trans_id, $trans_status, $msg, 0, 0);
					$file_name = 'logs/btcvn_callback_errors.txt';
					$this->addLogCallback(json_encode($_POST),$file_name,$msg);
					die($msg);
				} 
			}else{
				$msg 	= 'Lỗi trans_compensation không tồn tại';
				$file_name = 'logs/btcvn_callback_errors.txt';
				$this->addLogCallback(json_encode($_POST),$file_name,$msg);
				die($msg);
			}
			
		}else{
			$msg =  'no data response';
			$file_name = 'logs/btcvn_callback_errors.txt';
			$this->addLogCallback(json_encode($_POST),$file_name,$msg);
			die($msg);
		}
		
	}
	
	public function callbackHtlinkAction(){
		
		if($_POST){
			$lib  				= new Default_Model_Library();
			$trans_compensation	= (isset($_POST['RefCode'])) ? trim($_POST['RefCode']) : '';
			$amount	 			= (isset($_POST['Amount'])) ? trim($_POST['Amount']) : ''; 
			$status	 			= (isset($_POST['Status'])) ? trim($_POST['Status']) : ''; 
			$date_time 			= date('Y-m-d H:i:s', time());
			
			$transaction_status  = 0;
			$order_amount 		 = 0;
			$msg				 = '';
			$percent_promotion	 = 0;
			$coin				 = 0;
			$coin_real			 = 0;
			
			$file_name_success 	= 'logs/log_htlink_callback.txt';
			$file_name_error 	= 'logs/log_htlink_error_callback.txt';
			
			if($trans_compensation != '') {
				$screen_result 		= 'Callback thành công';
				$transactionModel 	= new TransactionModel();
				$transaction 		= $transactionModel->getTransactionByTranCompensation($trans_compensation);
				
				if(!empty($transaction)){
					
					$transaction_status = $transaction->trans_status;
					$loainap			= (int)$transaction->trans_loainap;
					$server_index		= $transaction->server_id;
					$member_id			= $transaction->member_id;
					
					$modelMember 	= new Members();
					$member  		= $modelMember->findIdentity($member_id);
					if($transaction_status != 1){
						if($status == 1){ // SUCCESS
						
							/** GIAO DICH NAP **/
							if($loainap == 1){
								/** nap vang vao game **/
								$gameApiModel	 = new GameModel();
								$characterIngame = $gameApiModel->apiInfoCharacter($member->member_username,$server_index);
								if(!$characterIngame->success){
									$msg 			= 'Đã nhận được thẻ, nhưng tài khoản chưa tạo nhân vật';
									$trans_status 	= 0;
									$transactionModel->transactionStepTwo2($trans_compensation, $transaction_status, $msg, $order_amount, $amount);
									exit;
								}
								
								$gameApiUserId 		= $characterIngame->message->info->role_id;
								$type_nap			= $gameApiModel->type_napvang;
								$jsonPaymentResult 	= $gameApiModel->paymentIngame(
									$member->member_username,
									$gameApiUserId,
									$server_index,
									$type_nap,
									$trans_compensation,
									$order_amount
								);
								/** end nap vang vao game **/
								
								if($jsonPaymentResult->success === true){
									$msg 			= 'Nạp thành công '.$gold. ' kim cương vào game';
									$trans_status 	= 1;
								}else{
									$msg = "Đã nhận thẻ nhưng tiền chưa vào game, Vui Lòng Liên Hệ Admin".$jsonPaymentResult->message->description;
									$trans_status 	= 0;
								}
								$transactionModel->transactionStepTwo2($trans_compensation, $trans_status, $msg, $gold, $amount);
							}else{
								
								/** htlink đã bỏ **/
								$wallet 			= new WalletModel();
								$wallet->username 	= $member->member_username;
								$wallet->xu		  	= $gold;
								$wallet->trans_id 	= $transaction->trans_id;
								$result 			= $wallet->addMemberXu();
								$result 			= json_decode($result);
								if($result->status == 1){
									$msg 			= $result->msg;
									$trans_status 	= 1;
								}else{
									$msg 			= $result->msg;
									$trans_status 	= 0;
								}
								$transactionModel->transactionStepTwo2($trans_compensation, $trans_status, $msg, $gold, $amount);
							}
							/** END GIAO DICH NAP **/
						}
						else
						{ // FAILS
							$msg_error = $this->htlinkErrorMessages($status);
							$msg = 'Lỗi '.$status.' '.$msg_error;
							$transactionModel->transactionStepTwo2($trans_compensation, $transaction_status, $msg, $order_amount, $amount);
						}
					}
					else{
						$msg = 'Lỗi : Transaction đã được gửi thành công trước đó ';
					}
					// SET LOG FILE TRANSACTION CALLBACK OKE
					$screen_result = $msg;
					$this->addLogCallback(json_encode($_POST),$file_name_success);
				}
				else
				{
					$screen_result 	= 'Lỗi không tìm thấy trans_id.';
					//NOT FIND TRANSACTION COMPENSATION ID
					$this->addLogCallback(json_encode($_POST),$file_name_error,'Lỗi không tìm thấy trans_id .');
				}
				
			}
			else
			{
				$screen_result 	= 'Lỗi trans_id không tồn tại.';
				// SET LOG ERROR
				$this->addLogCallback(json_encode($_POST),$file_name_error,'Lỗi trans_id không tồn tại.');
			}
		}
		else{
			$this->addLogCallback(json_encode($_POST),$file_name_error);
		}
		die($screen_result);
	}
	
	public static function jsonResult($error, $msg = null, $data = []) {
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = [
            'error' => $error, 
            'msg' 	=> $msg,
            'data' 	=> $data,
        ];
        return $response;
		exit;
    }
	
	public function addLogTransactionStepOne(
		$server_index, 
		$member_id, 
		$coin, 
		$coin_real, 
		$trans_compensation, 
		$card_type, 
		$card_code, 
		$card_seri,
		$percent_promotion, 
		$payment_partner,
		$trans_loainap,
		$member_username
	){
		
		$transactionModel 	= new TransactionModel(); 
		$timenow 	= date('Y-m-d H:i:s', time());
		// LUU LOG DATABASE B1
		$transResult = $transactionModel->translogOne(
			$server_index, 
			$member_id, 
			$coin, 
			$coin_real, 
			$trans_compensation, 
			$card_type, 
			$card_code, 
			$card_seri,
			$payment_partner,
			$trans_loainap
		);
		$trans_id = "";
		if(!empty($transResult)){
			$trans_id = $transResult->trans_id;
		}
		
		// LUU LOG FILE B1
		$log_file = 'logspayment/'.date("Y").'/'.date("m").'/'.$member_username.'_'.time().'.txt';
		$log_data = array (
			'action'            => 'NAP B1:',
			'created_time'	    => $timenow,
			'username' 		    => $member_username,
			'transaction_id' 	=> $trans_id,
			'percent_promotion' => $percent_promotion,
			'coin' 	            => $coin,
			'coin_real'         => $coin_real,
			'loainap'			=> ($trans_loainap == 1) ? "Nap vang" : "Nap xu"
		);
		setLog($log_file, $log_data);
		return $trans_id;			
	}
	
	public function actionDoixu()
	{
		$xu 	  	= crequest()->post('xucharge');
		$xu			= (int)$xu;
		$username 	= crequest()->post('username');
		$server_id 	= crequest()->post('sltserver');
		$server_id  = intval($server_id);
		$sltloainap = crequest()->post('sltloainap');
		$sltloainap = intval($sltloainap);
		$status 	= 0;
		
		$modelMember 	= new Members();
		$infoMember  	= $modelMember->findByUsername($username);
		
		/** check exit member **/
		if(empty($infoMember)){
			$msg = "Tài khoản không tồn tại vui lòng đăng nhập lại";
			return  $this->jsonResult($status,$msg,'');
		}
		$member_xu		= (int)$infoMember->member_xu;
		
		/** Check exit server **/
		$serverModel 	= new ServerModel();
		$infoServer 	= $serverModel->getServerById($server_id);
		if(empty($infoServer)){
			$msg = "Máy chủ không tồn tại vui lòng chọn máy chủ trước khi đổi xu";
			return  $this->jsonResult($status,$msg,'');
		}
		$server_index 	= intval($infoServer['server_index']);

		/** Check exit character in server **/
		$gameApiModel = new GameModel();
		$characterIngame = $gameApiModel->apiRole($infoMember->member_username,$server_index);
		if(!isset($characterIngame->ret)){ // kiem tra user co ton tai trong he thong khong
			if($characterIngame->ret != 0){
				$msg = "Tài khoản chưa tạo nhân vật vui lòng kiểm tra lại";
				return  $this->jsonResult($status,$msg,'');
			}
		}
			
		/**
		Check xem nap xu hay nap the thang , the vinh vien
		**/
		if($sltloainap == 1){ // Nạp xu vào game
			if($xu < 50){
				$msg = "Số xu muốn đổi nhỏ nhất là 50 xu";
				return  $this->jsonResult($status,$msg,'');
			}
			
			if($xu > $member_xu){
				$msg = "Số xu cần đổi không được lớn hơn xu bạn có trong ví";
				return  $this->jsonResult($status,$msg,'');
			}
			
			if($xu <= $member_xu){
				$xuconlai  	= $member_xu - $xu;
				$result 	= $modelMember->updateXu($infoMember->member_id,$xuconlai);
				if($result 	=== true){
					
					/** Nạp kim cương vao game **/
					$trans_compensation = time();
					$order_amount		= $xu*200;
					$jsonPaymentResult 	= $gameApiModel->paymentIngame(
						$server_index,
						$infoMember->member_username,
						$order_amount
					);
					/** End nạp kim cương vào game **/
					//print_r($jsonPaymentResult);exit;
					if(isset($jsonPaymentResult->ret)){
						if($jsonPaymentResult->ret == 0){
							$status 			= 1;
							$msg				= 'Bạn đã chuyển thành công '.$xu.' xu vào game';
						}else{
							$status 			= 0;
							$msg = "Đã trừ xu nhưng tiền ".$xu." chưa vào game, Vui Lòng Liên Hệ Admin ".json_encode($jsonPaymentResult);
						}
					}else{
						$status = 0;
						$msg = "Đã trừ xu nhưng tiền ".$xu." chưa vào game. Lỗi Api từ đối tác ".json_encode($jsonPaymentResult);
					}
					
				}
				else{
					$msg	= 'Có lỗi xảy ra vui lòng liên hệ Admin';
				}
				
				/** Thêm Log **/
				$modelWalletLog = new WalletModel();
				$modelWalletLog->updateWalletLog($infoMember->member_id,$xu,$status,$this->const_tieu_xu,$msg,'');
							   
			}
			else{
				$msg	= 'Số xu tiêu phí nhiều hơn số xu bạn hiện có';
			}
			return  $this->jsonResult($status,$msg,'');
			
		}else{  // Nạp thẻ tháng, vĩnh viễn
			
			/** Nạp kim cương vao game **/
			$xu						= 0;
			if($sltloainap == 2){
				$txtLoainap  = "thẻ tháng";
				$xu		= 200000;
			}elseif($sltloainap == 3){
				$txtLoainap  = "thẻ vĩnh viễn";
				$xu		= 500000;
			}else{
				$status = 0;
				$msg	= 'Vui lòng chọn đúng loại nạp!';
				return  $this->jsonResult($status,$msg,'');
			}
			
			if($xu <= $member_xu){
				$xuconlai  	= $member_xu - $xu;
				$result 	= $modelMember->updateXu($infoMember->member_id,$xuconlai);
				
				if($result 	=== true){
					$gameApiUserId 		= $characterIngame->message->info->role_id;
					$type_nap			= $gameApiModel->type_napmuathe;
					$trans_compensation = time();
					$order_amount		= $xu;
					$jsonPaymentResult 	= $gameApiModel->paymentIngame(
						$infoMember->member_username,
						$gameApiUserId,
						$server_index,
						$type_nap,
						$trans_compensation,
						$order_amount
					);
					/** End nạp kim cương vào game **/
					if($jsonPaymentResult->success === true){
						$status 			= 1;
						$msg				= 'Bạn đã mua thành công '.$txtLoainap;
					}else{
						$status 			= 0;
						$msg = "Đã trừ xu nhưng tiền chưa vào game, Vui Lòng Liên Hệ Admin ".$jsonPaymentResult->message->description;
					}
				}
				
			}else{
				$msg	= 'Số xu tiêu phí nhiều hơn số xu bạn hiện có';
			}
			return  $this->jsonResult($status,$msg,'');
		}
	}
	
	public function addLogCallback($json_resutl,$file_name,$msg='')
	{
		$timenow 	= date('Y-m-d H:i:s', time());
		$log  		= 'time = '.$timenow;
		if($msg !='' ){
			$log	.= 'msg  = '.$msg;
		}
		$log  		.= 'DATA = '.$json_resutl;
		setLog($file_name,$log);
	}
	
	public function checkFirstPayment($member_id,$trans_id)
	{
		// log if is first transaction
		$transactionModel 	= new TransactionModel();
		$numtrans 	= $transactionModel->countFirstTransaction($member_id);
		if ($numtrans <= 0) {
			$transactionModel->addFirstPayment($trans_id);
			$transactionModel->addPublicsherFirstPayment($trans_id);
		}
	}
}
?>