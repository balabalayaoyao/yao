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
	$_SESSION['userinfo']=$userinfo;
 ?>


<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../favicon.ico">

    <title>中国传媒大学团学组织报名管理系统</title>
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

  <body style="background-color: white;">
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	  <div class="container">
	    <div class="navbar-header">
	  	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
	  	</button>
	  	<a class="navbar-brand" href="/"><? echo $userinfo['zhiyuanyi2']; ?>，欢迎你！</a>
	  	</div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="pswd.php">修改密码</a></li>
        </ul> 
      </div>
	   </div>
  </div>

  <div class="container bs-docs-container">
	  <div class="row">
	    <div class="col-md-12" role="main">
       <div class="page-header">
        <h1 id="plan_title">本部门招新报名数据导出</h1>
       </div>
      <div id="plan_detail">
        请稍后，正在请求数据...
      </div>


    </div>
  </div>

<!-- /container -->
  
  
 




<div class="container">
    <footer><center>
    <hr>
          <p> <a href="https://lyndons.cn"><img src="https://liaoyunan.cn/logo.png" height="30" width="auto"></a> © 2010-2019 Lyndon's Studio. | Powered by Langhammer CMS. 翰墨远逸通用内容管理系统 <br><a href="https://travel.lyndons.cn/page/about/#tpts">《翰墨远逸服务说明及许可条款》</a> <br> <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">粤ICP备14061580号</a> | <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44011102001127"><img src="https://lyndons.cn/gaba.png">粤公网安备 44011102001127号</a></p>
        </center></footer>
</div>   
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


  </body>
</html>
<script type="text/javascript">
window.onload = getEnrolData;

function getEnrolData()
  {

  $("#plan_title").html("加载数据中...");
  $("#plan_detail").html("请稍后，正在请求数据...");
  // use JSON to download the data
  
  $.getJSON("get_enrol_data.php", {"key":"20190307005"}, function(json)
  {
    $(json).each(function(index, elem)
    {
      $("#"+elem.id).html(elem.html);
    })
  });
  };
 function Export(){　
          $("#baomingbiao").table2excel({           
   　　　　exclude: ".noExl",
   　　　　
   　　　　name: "部门招新报名信息" + new Date().getTime(),
   　　　
    　　　　filename: "部门招新报名信息" + new Date().getTime() + ".xls",
    　　　　bootstrap: false
　　    });
        }
</script>