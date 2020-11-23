<?php
namespace frontend\models\telco;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use common\models\Servers;


class AcclubModel
{
    /* Cấu hình API */
    public $PublicKey = "mhXGTzBUYiNdcbW417ovKAD2DkAJs5KO";//Key lấy trong mục Tài Khoản --> Tích hợp website
    public $GameID = "5IPL71suEzunmXWy9MP9PULLAuv6mZEr";//Key lấy trong mục Danh sách Game
    private $serverUrl = "http://api.acclub.es/api/";

    /* Kết thúc cấu hình */
    private $curl;
    public $last_error;
    public function __construct()
    {
        if(!$this->_isCurl()) throw new Exception("Server hiện tại không hỗ trợ CURLLIB");
        // if(strlen($this->PublicKey) != 32) throw new Exception("Mã khách hành 'PublicKey' không chính xác");
        $this->curl = curl_init();

    }
	
	

    public function cardAdd($CardSeri,$CardCode,$CardType,$Amount,$TransID) {
        
        $Signature = MD5($this->PublicKey . $Amount . $TransID . $CardSeri);
        $loginCreat = array(
            'CardSeri' => $CardSeri,
            'CardCode' => $CardCode,
            'Amount' => $Amount,
            'Signature' => $Signature,
            'TransID' => $TransID,
            'CardType' => $CardType,
            'PublicKey' => $this->PublicKey,
            'GameID' => $this->GameID
        );
        

        $reponseData = $this->epCurl(
            $this->apiUrl('RequestPayment'),
            'POST',
            $loginCreat
        );
        
        if(!$reponseData) throw new Exception("APISERVER không thể kết nối!");
        $reponseObj = json_decode($reponseData);
        // if(!$this->validateObj($reponseObj)) throw new Exception("APISERVER trả về không hợp lệ !");
        if($reponseObj->errorCode == 0) {
            return $reponseObj;
        } else {
            throw new Exception($reponseObj->msg);
        }
        
    }

    public function cardCheck($TransID) {
        if(strlen($TransID) > 35) throw new Exception("Mã giao dịch không chính xác !");
        $trans = array(
            'TransID' => $TransID,
            'PublicKey' => $this->PublicKey,
        );

        $reponseData = $this->epCurl(
            $this->apiUrl('CheckCardInfo'),
            'POST',
            $trans
        );
        if(!$reponseData) throw new Exception("APISERVER không thể kết nối!");
        $reponseObj = json_decode($reponseData);
        // if(!$this->validateObj($reponseObj)) throw new Exception("APISERVER trả về không hợp lệ !");
        if($reponseObj->ErrorCode == 0) {
            return $reponseObj;
        } else {
            throw new Exception($reponseObj->msg);
        }
        
    }

    public function epCurl($url,$type,$data="",$header=array(),$acheader = false) {
        curl_setopt($this->curl,CURLOPT_URL, $url);
        curl_setopt($this->curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl,CURLOPT_TIMEOUT, 30);
        curl_setopt($this->curl,CURLOPT_CUSTOMREQUEST, $type);
        curl_setopt($this->curl,CURLOPT_POSTFIELDS, $data);
        curl_setopt($this->curl,CURLOPT_HTTPHEADER,	$header);
        curl_setopt($this->curl,CURLOPT_HEADER,	$acheader);
        $response = curl_exec($this->curl);
        $err = curl_error($this->curl);
        if ($err) {
            $this->last_error = $err;
            return -1;
        } else {
            return $response;
        }
    }
    public function apiUrl($path) {
        return $this->serverUrl . $path;
    }
    private function _isCurl(){
        return function_exists('curl_version');
    }

    private function validateObj($reponseObj) {
        if(!is_object($reponseObj) || !isset($reponseObj->ErrorCode) || !isset($reponseObj->msg)) return false;
        return true;
    }

}