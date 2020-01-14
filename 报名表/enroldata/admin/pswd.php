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
?>


<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.ico">

    <title>密码维护</title>
  <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="../js/jquery-ui.js"></script>
  <script type="text/javascript" src="../js/jquery.table2excel.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="../skin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->



</head>

  <body>
</br>
</br>
    <div class="container">
    <center><h2 class="form-signin-heading"><div id='title' >部门管理员密码维护</div></h2></center>
        <div class="form-signin">
    
    <input type="password" id="o_password" name="o_password" class="form-control" placeholder="原密码" required autofocus>
    <input type="password" id="n_password" name="n_password" class="form-control" placeholder="新密码" required autofocus>
    <input type="password" id="r_password" name="r_password" class="form-control" placeholder="再次新密码" required autofocus>
<br>
<div id="errmsg" style="font-family:'Microsoft YaHei','Arial';color:#E00;margin-top:10px;"></div>
        <button class="btn btn-lg btn-primary btn-block" id="submit_button" type="submit">提交</button>
    </div>
      </div>
      <script type="text/javascript">
	var jump="http://txzx.lyndons.cn/enroldata/login";
	    </script>
			<script type="text/javascript" src="pswd.js"></script>
    <hr />
  <center><a href="https://travel.lyndons.cn/page/about/#tpts">《翰墨远逸服务说明及许可条款》</a></center>
    </div> <!-- /container -->
  
  <div class="container">
     <hr>

    <footer><center>
   
          <p> <a href="https://lyndons.cn"><img src="https://liaoyunan.cn/logo.png" height="30" width="auto"></a> © 2010-2019 Lyndon's Studio. </br> <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">粤ICP备14061580号</a> </p>
        </center></footer>
    
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


  </body>

</html>