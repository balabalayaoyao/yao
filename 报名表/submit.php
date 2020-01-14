<?
	if ($_POST['key']!="sdjkfghdskhjfrtwaior32478asuriokasef"){
		echo "Access denied.";
		exit;
	}
	function connectSQL($host,$port,$user,$pass,$name) {
	$con = mysql_connect($host.':'.$port,$user,$pass);
	if (!$con) return false;	
	$seldb=	mysql_select_db($name,$con);
	return $con;
}
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
	//$time=date('Y-m-d H:i:s');
	$con=connectSQL("localhost","3306","czbm_user","WsPsseYc4PmzwHt","czbm");
	mysql_query("set character set 'utf8'");
	mysql_query("set names 'utf8'");
	$sql="select * from baomingbiao where name='$name' and phone='$phone' and season='1902'";
	$result=mysql_fetch_array(mysql_query($sql,$con));
	if($result){
		echo -1;
		exit;
	}else{
	
	$sql="insert into `baomingbiao`(name,xuebu,xueyuan,zhuanye,phone,zhiyuanyi,zhiyuanyi2,zhiyuaner,zhiyuaner2,zhiyuansan,zhiyuansan2,techang,xingbie,xuewei,season,block,cancelcount) values ('$name','$xuebu','$xueyuan','$zhuanye','$phone','$zhiyuanyi','$zhiyuanyi2','$zhiyuaner','$zhiyuaner2','$zhiyuansan','$zhiyuansan2','$techang','$xingbie','$xuewei','1902','1','3')";
	$result=mysql_query($sql,$con);
	if($result){
	echo "0";
	exit;
	}else{
	echo '-5';exit;}
}

?>