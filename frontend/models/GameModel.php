<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Categories;
use common\models\Posts;


class GameModel{
	
	public $api_url 		= 'http://game.thonglinhsuh5.com:9161';
	public $api_payment_url = 'http://game.thonglinhsuh5.com:9241';
	public $api_role_url 	= 'http://game.thonglinhsuh5.com:9161';
	public $api_username 	= 'taydu';
	public $api_password 	= 'Sr2PzeTg';
	public $api_key			= 'FVXBFAC8SKNEM09K';
	public $api_payment_key = 'IN9KQ20J47W2X6YE';
	public $account;
	public $server_index;
	public $userid;
	public $transid;
	public $type_napvang	= 0; // nap vang truc tiep
	public $type_napmuathe	= 1;
	public $type_nap;
	public $cost;
	
	/**
		Function Api Login Register
		userid  = member_id
		account = member_username
		server  = server_index
	**/
	public function apiLogin()
	{
		$userid		= $this->userid;
		$account 	= strtolower($this->account);
		$server		= $this->server_index;
		$timestamp  = time();
		$sign		= md5($userid.$account.$server.$timestamp.$this->api_key);
		$data 		= array(
			'userid' 	=> $userid,
			'account'	=> $account,
			'server'	=> $server,
			'timestamp'	=> $timestamp,
			'sign'		=> $sign
		);
		
		//$full_api_url 	= $this->api_url.'/api/play-games?userid='.$userid.'&account='.$account.'&server='.$server.'&timestamp='.$timestamp.'&sign='.$sign;
		$result = $this->get_curl($this->api_url.'/api/play-games',$this->api_username,$this->api_password,$data);
		
		return json_decode($result);
	}
	
	public function apiLoginNoChooseServer()
	{
		$userid		= $this->userid;
		$account 	= strtolower($this->account);
		$timestamp  = time();
		$userSource = 'yn';
		$src		= 'mangaplay';
		
		$dataSign 		= array(
			'src'		=> 'mangaplay',
			'pid'		=> $account,
			'time'		=> $timestamp
		);
		$sign 		= $this->createSign($dataSign,'FVXBFAC8SKNEM09K');
		
		$data 		= array(
			'src'			=> 'mangaplay',
			'userSource'	=> 'yn',
			'pid'			=> $account,
			'time'			=> $timestamp,
			'sign'			=> $sign
		);
		
		$result 	= $this->get_curl($this->api_url.'/ynLoginUrl',$data);
		
		return  json_decode($result);
	}
	
	public function paymentIngame($server_id,$pid,$total_fee)
	{
		$src			= 'mangaplay';
		$server_id		= $server_id;
		$pid 			= strtolower($pid);
		$pid 			= $pid;
		$userSource		= 'yn';
		$order_id		= time();
		$time  			= time();
		$total_fee		= $total_fee;

		$dataSign 		= array(
			'src'			=> $src,
			'pid'			=> $pid,
			//'userSource'	=> $userSource,
			'server_id'		=> $server_id,
			'ext'			=> '',
			'order_id'		=> $order_id,
			'time' 			=> $time,
			'total_fee'		=> $total_fee,
		);
		$sign 		= $this->createSign($dataSign,'IN9KQ20J47W2X6YE');
		
		$data 		= array(
			'src'			=> $src,
			'pid'			=> $pid,
			'userSource'	=> $userSource,
			'order_id'		=> $order_id,
			'server_id'		=> $server_id,
			'time' 			=> $time,
			'ext'			=> '',
			'total_fee'		=> $total_fee,
			'sign'			=> $sign
		);
		
		$result =  $this->get_curl($this->api_payment_url.'/ynPay',$data);
	
		return json_decode($result);
	}
	
	
	public function apiRole($pid,$server_id){
		$timestamp  = time();
		$userSource = 'yn';
		$src		= 'mangaplay';
		
		$dataSign 		= array(
			'src'		=> 'mangaplay',
			'server_id' => $server_id,
			'pid'		=> $pid,
			'time'		=> $timestamp
		);
		$sign 		= $this->createSign($dataSign,'FVXBFAC8SKNEM09K');
		
		$data 		= array(
			'src'			=> 'mangaplay',
			'server_id' 	=> $server_id,
			'userSource'	=> $userSource,
			'pid'			=> $pid,
			'time'			=> $timestamp,
			'sign'			=> $sign
		);
		
		$result 	= $this->get_curl($this->api_url.'/ynRoleInfo',$data);
		return  json_decode($result);
		
	}
	/**
		function CURL GET 
	**/
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
		//echo $url.'?'.$fields_string;exit;
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url.'?'.$fields_string
        ));
		//	curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		$output = curl_exec($ch);
		$info 	= curl_getinfo($ch);
		curl_close($ch);
		//print_r($info);
		//echo '<br/>';exit;
		return $output;
	}
	
	
	/**
		function CURL POST 
	**/
	public function post_curl($url,$data = array())
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Thiết lập sử dụng POST
		curl_setopt($ch, CURLOPT_POST, count($data));
		// Thiết lập các dữ liệu gửi đi
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
		//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		$output = curl_exec($ch);
		$info 	= curl_getinfo($ch);
		curl_close($ch);
		//print_r($info);
		//echo '<br/>';
		return $output;
	}
	
	
	public function getRateGold($amount)
	{
		$gold = $amount / 200;
		return $gold;
	}
	
	function createSign($paramArr,$secretKey) {
			
		$sign = $secretKey;
		unset($paramArr['sign']);
		unset($paramArr['client']);
		unset($paramArr['userSource']);
		ksort($paramArr);		// 按照键名对数组排序
		if(is_array($paramArr)){
			foreach ($paramArr as $key => $val) {
				if ($key !='' && $val !='') {
					$sign .= $key.$val;
				}
			}
		}
		//echo $sign.'<br>';
		$sign = strtoupper(md5($sign));	// md5后 全部转换成大写的
		return $sign;	
	}
	
}