<?php 

function word_limit($chuoi, $gioihan) {
        $chuoi = strip_tags($chuoi);
        if (strlen($chuoi) <= $gioihan) {
            return $chuoi;
        } else {
            /*
            so sánh vị trí cắt
            với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
            nếu vị trí khoảng trắng lớn hơn
            thì cắt chuỗi tại vị trí khoảng trắng đó
            */
            if (strpos($chuoi, " ", $gioihan) > $gioihan) {
                $new_gioihan = strpos($chuoi, " ", $gioihan);
                $new_chuoi = substr($chuoi, 0, $new_gioihan);
                return $new_chuoi;
            }
            // trường hợp còn lại không ảnh hưởng tới kết quả
            $new_chuoi = substr($chuoi, 0, $gioihan);
            return $new_chuoi;
        }
    }
 
 function orderUpload(&$file)
{
		$orderedFiles = array();
		$count = count($file['name']);
		$keys = array_keys($file);

		for ($i=0; $i<$count; $i++) foreach ($keys as $key)
		{
			if('name' == $key)
			{
				$orderedFiles[$i]['extension'] =  strtolower(strrchr($file[$key][$i],"."));
			}
			$orderedFiles[$i][$key] = $file[$key][$i];
		}
	return $orderedFiles;
}
 
function to_slug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}

//GENERATE SLUG
function slug($string)
{
	// Convert special latin letters and other characters to HTML entities.
	$slug = htmlentities($string, ENT_NOQUOTES, "UTF-8");

	// With those HTML entities, either convert them back to a normal letter, or remove them.
	$slug = preg_replace(array("/&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);/i", "/&[^;]{2,6};/", "/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/", "/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/", "/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/", "/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/", "/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/", "/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/", "/đ|Đ/", "/ç/", "/ñ/", "/ä|æ/", "/ö/", "/ü/", "/Ä/", "/Ü/", "/Ö/", "/ß/"), array("$1", " ", "a", "e", "i", "o", "u", "y", "d", "c", "n", "ae", "oe", "ue", "Ae", "Ue", "Oe", "ss"), $slug);
	// Now replace non-alphanumeric characters with a hyphen, and remove multiple hyphens.
	$slug = strtolower(trim(preg_replace(array("/[^0-9a-z]/i", "/-+/"), "-", $slug), "-"));

	return $slug;
}
function vietnamese_permalink($title, $replacement = '-') {
	/*  Replace with "-"
     */
	$map = array();
	$quotedReplacement = preg_quote($replacement, '/');
	$default = array(
		'/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
		'/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
		'/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
		'/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
		'/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
		'/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'y',
		'/đ|Đ/' => 'd',
		'/ç/' => 'c',
		'/ñ/' => 'n',
		'/ä|æ/' => 'ae',
		'/ö/' => 'oe',
		'/ü/' => 'ue',
		'/Ä/' => 'Ae',
		'/Ü/' => 'Ue',
		'/Ö/' => 'Oe',
		'/ß/' => 'ss',
		'/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
		'/\\s+/' => $replacement,
		sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
	);
	//Some URL was encode, decode first
	$title = urldecode($title);
	$map = array_merge($map, $default);
	return strtolower(preg_replace(array_keys($map), array_values($map), $title));
}
function crequest() {
	return Yii::$app->request;
}

function cparams($params) {
	if (!empty(Yii::$app->params[$params])) {
		return Yii::$app->params[$params];
	}
	die("please config params $params");
}

function save_image($inPath,$outPath)
{ //Download images from remote server
    
	$check_url_status = check_url($inPath);
	if ($check_url_status == '200')
	{
		$in=    fopen($inPath, "rb");
		$out=   fopen($outPath, "wb");
		while ($chunk = fread($in,8192))
		{
			fwrite($out, $chunk, 8192);
		}
		fclose($in);
		fclose($out);
	}
	else
	{
		return false;
	}
	
}

function grab_image($url, $saveto) {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	$raw = curl_exec($ch);
	curl_close($ch);
	if (file_exists($saveto)) {
		unlink($saveto);
	}
	$fp = fopen($saveto, 'x');
	fwrite($fp, $raw);
	fclose($fp);
}
function check_url($url) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    $headers = curl_getinfo($ch);
    curl_close($ch);

    return $headers;
}
function get_extension($file) {
 $arrayExtension 		= explode(".", $file);	
 $extension 			= end($arrayExtension);
 list($first, $last) 	= explode("?", $extension);
 return $first ? $first : false;
}

/*** Request API ***/   
   
function post_request_array($url, $data){
	$fields_string = '';
	foreach($data as $key=>$value)
	{
		$fields_string .= $key.'='.$value.'&';
	}
	$fields_string = rtrim($fields_string,'&');
	//open connection
	$ch = curl_init();
	//set the url, number of POST vars, POST data
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_POST, count($data));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function get_request_array($url, $data){
	$fields_string = '';
	foreach($data as $key=>$value)
	{
		$fields_string .= $key.'='.$value.'&';
	}
	$fields_string = rtrim($fields_string,'&');
	return file_get_contents($url.'?'.$fields_string);
}

function get_request_by_curl($url, $data){
	$fields_string = '';
	foreach($data as $key=>$value)
	{
		$fields_string .= $key.'='.$value.'&';
	}
	$fields_string = rtrim($fields_string,'&');
	// Get cURL resource
	$curl = curl_init();
	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => $url.'?'.$fields_string
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);
	return $resp;
}
/*** End Request API ***/   

function getIpAddress()
{
	$ip = '';
	if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	{
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function setLog($path, $data, $log_type="a+", $log_permission=0777, $line="\n"){
        if (empty($path) || empty($data)){
            return false;
        }else{
            $pathinfo = pathinfo($path);
            $logpath = '/' . $pathinfo['dirname'];
            // cread folder if not exits
			//echo dirname(dirname(__DIR__)) . $logpath;exit;
            if (!is_dir(dirname(dirname(__DIR__)) . $logpath)) {
                mkdir(dirname(dirname(__DIR__)) . $logpath, 0777, TRUE);
            }
            $w = fopen(dirname(dirname(__DIR__)).'/'.$path, $log_type);
            @chmod(dirname(dirname(__DIR__)).'/'.$path, $log_permission);
            if (is_array($data)){
                fputs($w, json_encode($data).$line );
                fclose($w);
                return true;
            }else{
                fputs($w, $data.$line);
                fclose($w);
                return true;
            }
        }
    }
/**
*
* Function Create Sign Game
*
**/	
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
?>