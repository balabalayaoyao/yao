<?
	if ($_POST['key']!="sdjkfghdskhjfrtwaior32478asuriokasef"){
		echo "Access denied.";
		exit;
	}

	ob_start();
	require_once '../system/config.php';
	require_once '../system/function.php';
	ob_end_clean();
	$con = connectSQL();
	$ridinfo=veri_rid($_COOKIE['rid'],$con);
		if (!$ridinfo) exit('<script type="text/javascript">location.href="http://txzx.lyndons.cn"</script>'); //判断是否有登录cookie
		mysqli_query($con,"set character set 'utf8'");
		mysqli_query($con,"set names 'utf8'");
		$userinfo=veri_user_here("$ridinfo[uid]",$con);
	
	date_default_timezone_set("PRC");

	$name = $_POST["name"];
	$xuebu = $_POST["xuebu"];
	$xueyuan = $_POST["xueyuan"];
	$zhuanye = $_POST["zhuanye"];
	$phone = $_POST["phone"];
	$zhiyuanyi = $_POST["zhiyuanyi"];
	$zhiyuanyi2 =$_POST["zhiyuanyi2"];
	$zhiyuaner = $_POST["zhiyuaner"];
	$zhiyuaner2 = $_POST["zhiyuaner2"];
	$zhiyuansan = $_POST["zhiyuansan"];
	$zhiyuansan2 = $_POST["zhiyuansan2"];
	$techang = $_POST["techang"];
	$xingbie = $_POST["xingbie"];
	$xuewei = $_POST["xuewei"];
	$id = $userinfo["id"];
	//$time=date('Y-m-d H:i:s');


	$sql="UPDATE `baomingbiao` SET `name`='$name',`xuebu`='$xuebu',`xueyuan`='$xueyuan',`zhuanye`='$zhuanye',`phone`='$phone',`zhiyuanyi`='$zhiyuanyi',`zhiyuanyi2`='$zhiyuanyi2',`zhiyuaner`='$zhiyuaner',`zhiyuaner2`='$zhiyuaner2',`zhiyuansan`='$zhiyuansan',`zhiyuansan2`='$zhiyuansan2',`techang`='$techang',`xingbie`='$xingbie',`xuewei`='$xuewei',`block`='1' WHERE id='$id'";
	$result=mysqli_query($con,$sql);
	if(!$result){
	echo '-5';
	exit; 
	}else{
	echo '0';
	exit;}

?>