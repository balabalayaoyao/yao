<?php
if(!$_GET['username']||!$_GET['email_code'])
	{
		header("Location: index.php");
		exit;
	}
		date_default_timezone_set("PRC");
require('head.php');
require('header.php');
require('../../config.php');
$con=connectSQL();
	mysql_query("set names 'utf8'"); 
	$username = $_GET['username'];
	$token = $_GET['email_code'];
	$newpswd = rand(1000,9999);
        $pswd = md5($newpswd);
	$sql = "UPDATE `ucenter_user` SET pswd='$pswd',email_code = '' WHERE username = '$username' and email_code = '$token'";
	mysql_query($sql);
	$success=mysql_affected_rows();
	$sql = "SELECT * FROM `ucenter_user` WHERE `username` = '$username' or `email` = '$email'";
	$user=mysql_fetch_array(mysql_query($sql));
	$username = $user['username'];
	$to = $user['email'];
	$time=date('Y-m-d H:i:s');
   function request_by_curl($remote_server,$post_string){
   $ch = curl_init();
   curl_setopt($ch,CURLOPT_URL,$remote_server);
   curl_setopt($ch,CURLOPT_POSTFIELDS,$post_string);
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
   $data = curl_exec($ch);
   curl_close($ch);
   return $data;
}
?>
<center>
	<div class="main_container">
		
		<div class="good_card">
			<div class="notify_title">
				忘记密码了……
			</div>
			<?php if($success){?>
			<div class="notify_content">
				重置成功！您的密码已重置为 <?=$newpswd?> 。请尽快<a href="../../index.php?url=edit_pswd.php">登录修改</a>。
			</div>
			<?php 
$title = "【毕业游报名系统】密码重置成功通知邮件（翰墨网络技术支持部门）";
$content = "亲爱的 $username  ：
				<br>
				　　您于 $time 在<b>毕业游报名系统</b>申请了账户 $username 的密码重置服务。
				<br><br>

				<br>
				　　----------------------------------------------------------------------------------------------------------
				<br>
				<br>
				　　你的密码已经重置为 $newpswd ，请尽快登录系统系统修改。
				<br>
				<br>
				　　----------------------------------------------------------------------------------------------------------
	
				<br><br>
				毕业游报名系统 http://travel.muxtech.cn
				<br><br>
				$time";
				$content=urlencode($content);
	$post = "to=$to&title=$title&content=$content";
	request_by_curl('http://api.sf-er.com/opensend.php',$post);


} else {?>
			<div class="notify_content">
				验证信息无效。请<a href="index.php">重新发送申请</a>。
			</div>
			<?php }　?>
		</div>
		
		
		
	</div>
</center>
                <div id="footerTD" class="footer centerParent" style="clear: both;">
                    <div class="center" style="width: 895px;">
                        <div id="idDiv_MSLogo" class="mslogo">
                        </div>
                    </div>
                    <?php include("footer.php");?>
                </div>
</body>
</html>