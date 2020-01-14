<!doctype html>

<html>

<head>

<meta http-equiv="content-type" content="txt/html; charset=utf-8" />
<?php
ob_start();
require_once 'system/config.php';
require_once 'system/function.php';
ob_end_clean();
header("Content-type: text/html; charset=utf-8"); 
if(!$_GET['token']){
	exit;
}
$con = connectSQL();

//检查token和id是否匹配且未过期未使用
$time=date("Y-m-d H:i:s",time());
$sql="select * from `canceltoken` WHERE uid='$_GET[id]' and token='$_GET[token]' and used=0 and exp>'$time'";
$result=mysqli_fetch_array(runsql($sql,$con));
	if ($result){
		$sql="select * from `baomingbiao` WHERE id='$_GET[id]'";
		$infonow=mysqli_fetch_array(runsql($sql,$con));
		if ($infonow['cancelcount']>0){
		$count=$infonow['cancelcount']-1;
		$sql="UPDATE `baomingbiao` SET `block`='0' , `cancelcount`='$count' WHERE `id`='$infonow[id]'";
		$jiancishu=runsql($sql,$con);
		$sql="UPDATE `canceltoken` SET `used`='1' WHERE `uid`='$infonow[id]'";
		$result4=runsql($sql,$con);//过期所有key
		
		echo "<script> alert('取消成功，请重新登录');parent.location.href='http://txzx.lyndons.cn/enroldata/login'; </script>"; 
		}else{
		echo "<script> alert('你已取消3次了，不可再修改信息！');parent.location.href='http://txzx.lyndons.cn/enroldata/user'; </script>";
		}	
	}else{
		echo "<script> alert('链接失效，请重新获取新链接');parent.location.href='http://txzx.lyndons.cn/enroldata/user'; </script>";
	}


 ?>