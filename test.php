<?php 
$username = 'fb_621780814905342';

if (is_username($username) == FALSE) {
   echo $res['message'] = 'Tên đăng nhập chỉ bao gồm các kí tự a-z 0-9 và độ dài phải từ 6 đến 24 kí tự!';
}
else{
	echo 'chuan roi';
}
function is_username($username){
        $result = true;
        if(!preg_match("/^[a-zA-Z0-9_]{6,24}$/",$username)) {
            $result = false;
        }
        return $result;
}
?>