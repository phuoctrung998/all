<?php
namespace frontend\models\telco;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Servers;


class HtlinkModel{
    protected $url_base 	= 'http://pay24h.club/services/charges/';
    protected $api_account 	= 'hyn9';// api_account được cấp
    protected $key_secret 	= '63742c95';// mã được cấp
    function get_captcha($username,$type_card){
        // dữ liệu gửi lên để lấy mã captcha nếu có
        // tên nhân vật gửi lên
        $data_post['username'] 		= $username;
        //loại thẻ 
        $data_post['type_card'] 	= $type_card;
		$data_post['account_api'] 	= $this->api_account;
		$data_post['sign'] 			= md5(md5($this->api_account).md5($this->key_secret));
        $resp 		= $this->curl_send_data($this->url_base.'get_captcha',$data_post);
        $status 	= isset($resp->status)?$resp->status:0;
        $captcha 	= false;
        // ko có mã captcha thì mặc định session_id gửi lên ở bước 2 là 0
        $session_id = 0;
        // nếu status =1 là có mã captcha
        if($status ==1){
            $captcha 	= isset($resp->data)?$resp->data:false;
            $session_id = isset($resp->session_id)?$resp->session_id:'';
        }
        //session_id
        return $resp;
    }
    /**
     * 
     * @param  $username
     * @param  $session_id
     * @param  $number_card
     * @param  $seri_card
     * @param  $type_card
     * @param  $amount
     */
    function action_card($username,$session_id,$number_card,$seri_card,$type_card,$amount,$captcha=''){
        // dữ liệu bắt bược gửi lên
		$url = $this->url_base.'charge_card';
        // session_id lấy ở bước 1
        $data_post['session_id'] 	= $session_id;
        // mã thẻ
        $data_post['number_card'] 	= $number_card;
        // số seri
        $data_post['seri_card'] 	= $seri_card;
        // loại thẻ
        $data_post['type_card'] 	= $type_card;
        // mệnh giá
        $data_post['amount'] 		= (int)$amount;
        // tên nhân vật gửi lên trùng với bước 1
        $data_post['username'] 		= $username;
		$data_post['account_api'] 	= $this->api_account;
        // nếu session_id =0 hoặc rỗng thì hàm sẽ thực hiện theo hình thức callback(Chỉ áp dụng cho VTT)
        if($session_id == '' || $session_id == 0){
            $data_post['is_callback'] = 1;
        }
		else{
			$data_post['is_callback'] = 0;
		}
        $data_post['code'] 			= $captcha;
		$data_post['sign'] 			= md5(md5($this->api_account).md5($this->key_secret));
        $data = false;
		//print_r($data_post);
		//exit;
        $resp = $this->curl_send_data($url,$data_post);
        //$status =1  và amount >0 thì giao dịch thành công
        $status 	= isset($resp->status)?$resp->status:0;
        $amount 	= isset($resp->amount)?$resp->amount:0;
        $message 	= isset($resp->message)?$resp->message:'';
        //mã giao dịch .Mã duy nhất đánh dấu hoàn thiện 1 phiên dùng để đối soát
        $trans_id 	= isset($resp->trans_id)?$resp->trans_id:0;
        //$is_show_captcha =1 thì lấy captcha trả về hiện luôn ko cần gọi lại bước get_captcha
        $is_show_captcha = isset($resp->is_show_captcha)?$resp->is_show_captcha:0;
        if($is_show_captcha){
            $data = isset($resp->data)?$resp->data:false;
        }
        return $resp;
    }
    function curl_send_data($url,$post = false){
        $post['account_api'] = $this->api_account;
        $post['sign'] = md5(md5($post['account_api']).md5($this->key_secret));
        $ch = curl_init();
        if($post){
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        }
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '30');
        $content = trim(curl_exec($ch));
        curl_close($ch);
        return json_decode($content);
    }
	
	/* gate charge */
	public function htlink_charge_gate($username,$card_seri, $card_code, $card_type, $trans_compensation)
	{
		date_default_timezone_set('Asia/Saigon');
		$url 			= 'https://apicard.htlinking.com/VPGJsonService.ashx';
		$callbackUrl	= 'https://ngocrongvn.com/callback-htlink';
		$partnerCode 	= 'hyn9';
		$partnerKey 	= 'a5874a240af9d43345a262f08cc3ab9a';
		$serviceCode	= 'cardtelco';
		$commandCode	= 'usecard';
		$accountName 	= 'tutienh5_'.$username;
		$appCode 		= $card_type. '_vtp';
		
		$requestContent = '{"CardSerial":"' . $card_seri . '","CardCode":"' . $card_code . '","CardType":"' . $card_type . '","AccountName":"' . $accountName . '","AppCode":"' . $appCode . '","RefCode":"' . $trans_compensation . '","CallbackUrl":"'.$callbackUrl.'"}';
		$signature		= md5($partnerCode . $serviceCode . $commandCode . $requestContent . $partnerKey);
		
		$data = array(
			'PartnerCode' 		=> $partnerCode,
			'ServiceCode' 		=> $serviceCode,
			'CommandCode' 		=> $commandCode,
			'RequestContent' 	=> $requestContent,
			'Signature' 		=> $signature
		);
		$data_json 	= json_encode($data);
		$re 	 	= $this->curl_post_json_data($url, $data_json);
		return $re;
	}
	
	/* Telco New Charge */
	public function htlink_charge_telcos($username,$card_seri, $card_code, $card_type, $card_amount, $trans_compensation)
	{
		date_default_timezone_set('Asia/Saigon');
		$url 			= 'https://apicard.htlinking.com/VPGJsonService.ashx';
		$callbackUrl	= 'https://tutienh5.com/payment-callback-htlink';
		$partnerCode 	= 'hyn9';
		$partnerKey 	= 'a5874a240af9d43345a262f08cc3ab9a';
		$serviceCode	= 'cardtelco';
		$commandCode	= 'usecard';
		$accountName 	= 'tutienh5_'.$username;
		$appCode 		= $card_type. '_vtp';
		
		$requestContent = '{"CardSerial":"' . $card_seri . '","CardCode":"' . $card_code . '","CardType":"' . $card_type . '","AccountName":"' . $accountName . '","AppCode":"' . $appCode . '","RefCode":"' . $trans_compensation . '","AmountUser":"' . $card_amount . '","CallbackUrl":"'.$callbackUrl.'"}';
		$signature		= md5($partnerCode . $serviceCode . $commandCode . $requestContent . $partnerKey);
		
		$data = array(
			'PartnerCode' 		=> $partnerCode,
			'ServiceCode' 		=> $serviceCode,
			'CommandCode' 		=> $commandCode,
			'RequestContent' 	=> $requestContent,
			'Signature' 		=> $signature
		);
		$data_json 	= json_encode($data);
		$re 	 	= $this->curl_post_json_data($url, $data_json);
		return $re;
	}
	
	
	public function curl_post_json_data($url,$data_json){
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json))
		);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);  // Insert the data
		$result = curl_exec($curl);
		curl_close($curl);
		$obj 	= json_decode($result, true);
		return $obj;
	}
	
	public function htlinkGate($username,$card_seri,$card_code,$card_type,$trans_compensation)
	{
		//•	type_card: Loại thẻ VTT- Viettel VNP -Vina -MBF – Mobifone – ZING – Thẻ zing
		$username 			= $username;
		$card_seri			= $card_seri;
		$card_code			= $card_code;
		$card_type			= $card_type;
		$trans_compensation = $trans_compensation;
		$resultPayment 	= $this->htlink_charge_gate($username,$card_seri, $card_code, $card_type,$trans_compensation);
		return $resultPayment;
	}
	
	public function htlinkTelcos($username,$card_seri,$card_code,$card_amount,$card_type,$trans_compensation)
	{
		//type_card: Loại thẻ VTT- Viettel VNP -Vina -MBF – Mobifone – ZING – Thẻ zing
		$card_seri			= $card_seri;
		$card_code			= $card_code;
		$card_type			= $card_type;
		$card_amount		= $card_amount;
		$trans_compensation = $trans_compensation;
		$resultPayment		= $this->htlink_charge_telcos($username,$card_seri, $card_code, $card_type, $card_amount, $trans_compensation);
		return $resultPayment;
	}
	
	public function htlinkErrorMessages($payment_result_code)
	{
		 $payment_result_code = (int)$payment_result_code;
		 $msg_error = '';
		 if($payment_result_code === -330){
			$msg_error = 'Thẻ đã sử dụng';
		 }elseif($payment_result_code === -331){
			$msg_error = 'Thẻ đã bị khóa';
		 }elseif($payment_result_code === -332){
			$msg_error = 'Thẻ quá thời gian sử dụng';
		 }elseif($payment_result_code === -333){
			$msg_error = 'Thẻ không tồn tại hoặc chưa được kích hoạt.';
		 }elseif($payment_result_code === -334){
			$msg_error = 'Số serial hoặc mã thẻ không hợp lệ';
		 }elseif($payment_result_code === -335){
			$msg_error = 'Số mã thẻ hoặc serial không hợp lệ';
		 }elseif($payment_result_code === -301){
			$msg_error = 'Hệ thống lỗi (Có thể là do lỗi từ nhà cung cấp)';
		 }elseif($payment_result_code === -49){
			$msg_error = 'Bạn đã nạp sai mã thẻ quá 3 lần. Chức năng nạp thẻ của bạn sẽ bị tạm dừng trong vòng 24h';
		 }elseif($payment_result_code === -336){
			$msg_error = 'Sai tham số CardType';
		 }elseif($payment_result_code === -323){
			$msg_error = 'Tham số truyền vào không đúng';
		 }elseif($payment_result_code === -337){
			$msg_error = 'Sai định dạng thẻ';
		 }elseif($payment_result_code === -327){
			$msg_error = 'Không tìm thấy nhà cung cấp phù hợp';
		 }elseif($payment_result_code === -320){
			$msg_error = 'Không tìm thấy Transaction để xử lý';
		 }elseif($payment_result_code === -1){
			$msg_error = 'Thất bại';
		 }elseif($payment_result_code === -5){
			$msg_error = 'Thất bại (Áp dụng các trường hợp gọi CallBack)';
		 }elseif($payment_result_code === -7){
			$msg_error = 'Transaction Rejected';
		 }elseif($payment_result_code === -326){
			$msg_error = 'Giao dịch bị Timeout';
		 }elseif($payment_result_code === -314){
			$msg_error = 'Dịch vụ bị khóa';
		 }elseif($payment_result_code === -372){
			$msg_error = 'Sai mệnh giá thẻ so với khai báo (Chú ý trường hợp này sẽ trả về mã lỗi nhưng vẫn có Amount trong ResponseContent)';
		 }elseif($payment_result_code === -2){
			$msg_error = 'Thẻ nghi vấn (Có thẻ thành công hoặc thất bại SHOP sẽ áp dụng Notify tự động';
		 }
		 return $msg_error;
	}
}