<?php
ob_start();
require_once 'system/config.php';
require_once 'system/function.php';
ob_end_clean();
if(!$_GET['token']){
	exit;
}
$con = connectSQL();
$ridinfo=veri_rid($_COOKIE['rid'],$con);
	//if (!$ridinfo) exit('<script type="text/javascript">location.href="/"</script>'); //判断是否有登录cookie
	mysqli_query($con,"set character set 'utf8'");
	mysqli_query($con,"set names 'utf8'");
	$userinfo=veri_user_here("$ridinfo[uid]",$con);//判断用户的cookie是否有效


//检查token和id是否匹配且未过期未使用
$time=date("Y-m-d H:i:s",time());
$sql="select * from `canceltoken` WHERE uid='$_GET[uid]' and token='$_GET[token]' and used=0 and exp>'$time'";
$result=runsql($sql,$con);
	if ($result){
		$sql="select * from `baomingbiao` WHERE uid='$_GET[uid]'";
		$infonow=runsql($sql,$con);
		if ($infonow['cancelcount']>0){
		$count=$infonow['cancelcount']-1;
		$sql="UPDATE `baomingbiao` SET `cancelcount`='$count' WHERE `id`='$userinfo[id]'";
		$jiancishu=runsql($sql,$con);
		$sql="UPDATE `canceltoken` SET `used`='1' WHERE `uid`='$userinfo[id]'";
		$result4=runsql($sql,$con);//过期所有key
		
		echo "<script>alert('取消成功，请重新登录')</script>";
		header('Location: http://txzx.lyndons.cn/enroldata/login');
		}else{
		echo "<script>alert('你已取消3次了，不可再修改信息！)</script>";
		header('Location: http://txzx.lyndons.cn/enroldata/user');
		}
		
	}else{
		echo "<script>alert('链接失效，请重新获取新链接')</script>";
		header('Location: http://txzx.lyndons.cn/enroldata/user');
	}


 ?>