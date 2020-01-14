<?php
ob_start();
require_once '../system/config.php';
require_once '../system/function.php';
ob_end_clean();
$con = connectSQL();
$ridinfo=veri_rid($_COOKIE['rid'],$con);
	//if (!$ridinfo) exit('<script type="text/javascript">location.href="/"</script>'); //判断是否有登录cookie
	mysqli_query($con,"set character set 'utf8'");
	mysqli_query($con,"set names 'utf8'");
	$userinfo=veri_user_here("$ridinfo[uid]",$con);//判断用户的cookie是否有效


//检查学号是不是已经存在了
	//否
		//插入学号
	//是
		//检查与输入的是否一致
//检查是否还有剩余次数
	//无 -> 返回-1，退出
	//有 -> 插入token，发邮件，退出。

$xuehao=$_POST['xuehao_tijiao'];
/*
$sql="select * from `baomingbiao` where `xuehao`='$xuehao'";
$result=mysqli_fetch_array(runsql($sql,$con));
if($result){
	echo -3;
	exit;
}else{*/

if ($userinfo['xuehao']){
	if ($xuehao != $userinfo['xuehao']){
		echo -2;
		exit;
	}
}else{
	$sql="UPDATE `baomingbiao` SET `xuehao`='$xuehao' WHERE `id`='$userinfo[id]'";
	$result=runsql($sql,$con);
	if (!$result){
		echo -5;
		exit;
	}
}
 
if ($userinfo['cancelcount']==0){
	echo -1;
	exit;
}

$token=radom(195);
$time=date("Y-m-d H:i:s",time()+600);
$timenow=date("Y-m-d H:i:s",time());
$sql="insert into `canceltoken`(uid,token,exp) values ('$userinfo[id]','$token','$time')";
$result2=runsql($sql,$con);
if (!$result2){
	echo -5;
	exit;
}
$to=$userinfo['xuehao']."@cuc.edu.cn";
$title = "【中国传媒大学团学组织报名系统】取消确认报名信息通知";
$content = "Dear $userinfo[name] :
<br>
 We understood that you want to update your personal informaiton.
<br>
 ----------------
<br>
 <b>Please click <a href='http://txzx.lyndons.cn/enroldata/cancel.php?token=$token&id=$userinfo[id]'>this link</a> before $time to continue.</b>
<br><br>
 If the link is unavailable to clikck, copy and paste the following to your browser.
<br>
 http://txzx.lyndons.cn/enroldata/cancel.php?token=$token&id=$userinfo[id]
<br>
 ----------------
<br>
 CUC SOAS
<br>
 $timenow";
				$content=urlencode($content);
				$post = "to=$to&title=$title&content=$content&key=mainsite01wasdS50x8s6h5vcf";
				

				$result3=request_by_curl('http://api.sf-er.com/signert.php',$post);
			if($result3)
			{
				//var_dump($result3);
				echo 0;
			}else{
				echo -5;
			}
		
 ?>