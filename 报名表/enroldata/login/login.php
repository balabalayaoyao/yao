<?php 
require_once ('../system/config.php');
require_once ('../system/function.php');
$username=$_POST["username"]; 
$phone=$_POST['password'];
$password=md5($phone);
$con = connectSQL();
mysqli_query($con,"set character set 'utf8'");
mysqli_query($con,"set names 'utf8'");
$sql="select * from baomingbiao where name='$username' and (pswd='$password' or phone='$phone') and season='1902'";
$result=mysqli_fetch_array(mysqli_query($con,$sql));
if(!$result){
echo "-1";}
else{		
$rid=radom(128);
$sql="insert into `bmb_cookie` (cookie,uid) values ('$rid','$result[id]')";
setcookie("rid",$rid, time()+604800,"/");
$result_cookie=mysqli_query($con,$sql);

if ($result_cookie){
	echo "0";
}else{
	echo "-1";
}
	}
mysqli_close($con);
exit;
?>