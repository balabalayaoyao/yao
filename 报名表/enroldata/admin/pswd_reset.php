<?php 
ob_start();
require_once '../system/config.php';
require_once '../system/function.php';
ob_end_clean();
$con = connectSQL();
$ridinfo=veri_rid($_COOKIE['rid'],$con);
	if (!$ridinfo) exit('<script type="text/javascript">location.href="http://txzx.lyndons.cn"</script>'); //判断是否有登录cookie
	mysqli_query($con,"set character set 'utf8'");
	mysqli_query($con,"set names 'utf8'");
  $userinfo=veri_user_here("$ridinfo[uid]",$con);//判断用户的cookie是否有效
  if($userinfo['admin']==0){
    echo 'Access Denied.';
    exit();
  }

$password=md5($_POST['o_password']);
$pswd=md5($_POST['n_password']);
$rpswd=md5($_POST['r_password']);

if($pswd != $rpswd){
	echo "-3";
	exit;
}else{
$con = connectSQL();
mysqli_query($con,"set character set 'utf8'");
mysqli_query($con,"set names 'utf8'");
$sql="select * from baomingbiao where name='$userinfo[id]' and pswd='$pswd' and season='1902'";
$result=mysqli_fetch_array(mysqli_query($con,$sql));
if(!$result){
echo "-1";}
else{	
$sql="UPDATE `ucenter_user` SET `pswd`='$pswd' WHERE `id`='$userinfo[id]'";
$result_cookie=mysqli_query($con,$sql);

if ($result_cookie){
	echo "0";
}else{
	echo "-2";
}
	}
mysqli_close($con);
exit;
}
?>