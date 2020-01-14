<?php
/*
 bin2hex(str_rot13(strrev(addslashes('$content'))));
 strrev(str_rot13(pack('H*', '$sec')));
加密函数
 */
session_start();

function request_by_curl($remote_server,$post_string){
	$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$remote_server);
		curl_setopt($ch,CURLOPT_FAILONERROR,false);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$post_string);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	$data = curl_exec($ch);
		curl_close($ch);
	return $data;
}

function runsql($sql,$con){
	$result=mysqli_query($con,$sql);
	return $result;
}

function sqlinsert($table,$cloumn,$values,$con){
	$result=mysqli_query($con,'INSERT INTO '.$table.' ('.$cloumn.') VALUES ('.$values.')');
	if($result) return true;
	if(!$result) return false;
}

function sqlfetch($sql,$con){
    $result=mysqli_fetch_array(mysqli_query($con,$sql));
    return $result;
}

function radom($length) {
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz01234565789'; 
	$password = ''; 
		for ( $i = 0; $i < $length; $i++ ) { 
			$password .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
		} 
	return $password; 
}

function get_phone_veri_code($length) {
	$chars = '0123456789'; 
	$password = ''; 
		for ( $i = 0; $i < $length; $i++ ) { 
			$password .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
		} 
	return $password;

}

function get_enrol_count($id,$con){
		$sql="SELECT COUNT( * ) AS value FROM travel_enrol_data WHERE `travel_plan_id` ='$id'";
		$value=mysqli_query($sql);
		$value = mysqli_fetch_array($value);
	return $value['value'];
}

function get_sys_key($con) {
	$result=sqlfetch("select * from `travel_settings` where v='SYS_Key'",$con);
	return $result['m'];
}

function get_app_src($con) {
	$result=sqlfetch("select * from `travel_settings` where v='app_src'",$con);
	return $result['m'];
}

function get_decode_src($con) {
	$result=sqlfetch("select * from `travel_settings` where v='decode_src'",$con);
	return $result['m'];
}
		
function getrid($key) {
	$rid=radom(195);
	//$result=encrypt($rid,$key);
	return $rid;
}

function veri_rid($rid,$con){
	$result=sqlfetch("SELECT * FROM  `bmb_cookie`  WHERE `cookie` =  '$rid'",$con);
	return $result;	
}

function veri_user_here($ucid,$con){
	$result=sqlfetch("SELECT * FROM  `baomingbiao`  WHERE (`id` =  '$ucid')",$con);
	return $result;	
}

function decode_rid($rid,$key) {
	$result=decrypt($rid,$key);
	return $result;
}

function encrypt($data, $key){
	$key	=	md5($key);
    $x		=	0;
    $len	=	strlen($data);
    $l		=	strlen($key);
    for ($i = 0; $i < $len; $i++)
    {
        if ($x == $l) 
        {
        	$x = 0;
        }
        $char .= $key{$x};
        $x++;
    }
    for ($i = 0; $i < $len; $i++)
    {
        $str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
    }
    return base64_encode($str);
}

function decrypt($data, $key){
	$key = md5($key);
    $x = 0;
    $data = base64_decode($data);
    $len = strlen($data);
    $l = strlen($key);
    for ($i = 0; $i < $len; $i++)
    {
        if ($x == $l) 
        {
        	$x = 0;
        }
        $char .= substr($key, $x, 1);
        $x++;
    }
    for ($i = 0; $i < $len; $i++)
    {
        if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))
        {
            $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
        }
        else
        {
            $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
        }
    }
    return $str;
}