<?php
namespace frontend\models\telco;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Servers;


class Plus247Model{
	
	public $url_base 		= "https://api.thanatox.net/";
	public $urlPush 		= "https://api.thanatox.net/pushthev4.aspx";// ConfigurationManager.AppSettings["urlPush"];
	public $urlCallBack 	= "https://thonglinhsuh5.com/callback-push247";// ConfigurationManager.AppSettings["urlCallBack"];
	public $apiKey 			= "ec8eed35d03979a2145d481b723ae378";
	public $type;
	public $code;
	public $serial;
	public $money;
	public $tranid;            
	
	//https://api.push247.net/?apiKey=AnwjvS3QUiH8UlwSA3viAA0REQiEiH8S&type=mb&code=123456&serial=123456&money=20000&callbackurl=https://ngocrongvn/callback-push247&tranid=1561962462&realtime=false
	
	public function charge(){
		//{{ApiUrl}}/pushthev4.aspx?apiKey={{apiKey}}&code={{mã_thẻ}}&serial={{serial}}&type={{loại_thẻ}}&money={{menhGia}}&callbackurl={{callbackurl}}&tranid={{tranid}}

		//public $param	= + urlCallBack + "&tranid=" + tranID + "&realtime=false";
		$data = array(
			'apiKey' 		=> $this->apiKey,
			'type'	 		=> $this->type,
			'code'	 		=> $this->code,
			'serial'	 	=> $this->serial,
			'money'	 		=> $this->money,
			'callbackurl'	=> $this->urlCallBack,
			'tranid'	 	=> $this->tranid,
			'realtime'	 	=> "false",
		);
		$result	 		= $this->get_curl($this->urlPush, $data);
		return $result;
	}

	public function errorMsg($payment_result_code)
	{
		$msg = '';
		if($payment_result_code == "00"){
			$msg = "Nạp thẻ thành công, hệ thống sẽ chuyển vàng vào game trong ít phút.";
		}elseif($payment_result_code == "24"){
			$msg = "Thẻ đã dùng rồi";
		}elseif($payment_result_code == "07"){
			$msg = "Thẻ sai, vui lòng kiểm tra lại mã thẻ hoặc seri";
		}elseif($payment_result_code == "08"){
			$msg = "Hệ thống đang bận vui lòng nạp lại sau!";
		}elseif($payment_result_code == "99"){
			$msg = "Thẻ đang được xử lý xin vui lòng đợi Vàng hoặc Xu trong ít phút. Nếu vẫn không có vui lòng liên hệ Admin hỗ trợ!";
		}else{
			$msg = "Lỗi hệ thống vui lòng liên hệ Admin";
		}
		return $msg;
	}
	
	public function get_curl($url,$data = array())
	{
		$fields_string = '';
        if(!empty($data)){  // check if data != null 
			foreach($data as $key=>$value)
			{
				$fields_string .= htmlspecialchars($key).'='.$value.'&';
			}
			$fields_string = rtrim($fields_string,'&');
		}
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url.'?'.$fields_string
        ));
		$output = curl_exec($ch);
		$info 	= curl_getinfo($ch);
		curl_close($ch);
		//print_r($info);
		//echo '<br/>';
		return $output;
	}
		
}