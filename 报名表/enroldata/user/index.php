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
	$_SESSION['userinfo']=$userinfo;
if ($userinfo[admin]!= 0) exit('<script type="text/javascript">location.href="http://txzx.lyndons.cn/enroldata/admin/dept_admin.php"</script>');
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

	<title>个人中心 - 团学组织报名系统</title>

	<!-- Bootstrap core CSS -->
	<link href="../dist/css/bootstrap.css" rel="stylesheet">
	<link href="skin.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<script type="text/javascript" src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
	  <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	 
<style>
	.modal-content
	{
		max-width: 90%;
		width: auto;
	}
	</style>

</head>
  <body>
	  

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="/" style="font-family:Microsoft YaHei">团学报名</a>
	</div>
	<div class="navbar-collapse collapse">
	
	  <?php 
	echo '<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
	  					<a class="dropdown-toggle" data-toggle="dropdown" href="#">';
					echo $userinfo['name'];
	  			echo '<span class="caret"></span></a>
	<ul class="dropdown-menu">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">个人中心</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="../system/signin.php?out=1">退出登录</a></li>
  					</ul></li></ul>';
	
	?>
	</div><!--/.navbar-collapse -->
	  </div>
	</div>

	  

	<div class="container bs-docs-container">
	  <div class="row">

	<div class="col-md-12" role="main">

<div class="bs-docs-section">
	<div class="tab-content">
	
		<div class="tab-pane fade in active" id="home">
			<div class="tab-pane" id="mytieba"><div class="panel panel-primary">
			<div class="panel-heading">
				<h1 class="panel-title">我的报名</h1>
			</div>
				<div class="panel-body">
					<p>你可以在这里核对及修改你的报名信息。</br>如需修改已确认的报名信息，须先填写学号验证个人信息以取消确认，且每人仅有3次取消机会。</p>
				
							</div></div>
<div class="panel panel-success">
<div class="panel-body">
<div class="row">
  <div class="col-lg-6">

	<div class='input-group'>
<?php
	if ($userinfo['block']==1){

	
?>
	姓名：<b><?echo $userinfo['name']; ?></b></br>
	性别：<b><?echo $userinfo['xingbie']; ?></b></br>
	学部：<b><?echo $userinfo['xuebu']; ?></b></br>
	学院：<b><?echo $userinfo['xueyuan']; ?></b></br>
	学生类型：<b><?echo $userinfo['xuewei']; ?></b></br>
	年级及专业：<b><?echo $userinfo['zhuanye']; ?></b></br>
	手机：<b><?echo $userinfo['phone']; ?></b></br>
	<br>
	第一志愿：<b><?echo $userinfo['zhiyuanyi'].$userinfo['zhiyuanyi2']; ?></b></br>
	第二志愿：<b><?echo $userinfo['zhiyuaner'].$userinfo['zhiyuaner2']; ?></b></br>
	第三志愿：<b><?echo $userinfo['zhiyuansan'].$userinfo['zhiyuansan2']; ?></b></br>
	个人说明：<b><?echo $userinfo['techang']; ?></b></br>
<p></br>
	<button class="btn btn-warning btn-lg" name="change" value="cancelsub" id="cancel_button" onclick="cancelsub()" type="submit" <?php if ($userinfo['cancelcount']==0) echo 'disabled';?>>取消确认</button></p

	<?php
	}else{?>

	<script type="text/javascript" src="../../form.js"></script>
	姓名：<input type='text' id='name' name='name' value='<?echo $userinfo['name']; ?>'class='form-control' placeholder='姓名' required autofocus>
	性别：<select name="xingbie" id="xingbie" class="form-control">
						<option value="男" <?php if ($userinfo['xingbie']=='男') {echo 'selected';} ?>>男</option>
						<option value="女" <?php if ($userinfo['xingbie']=='女') {echo 'selected';} ?>>女</option>
			</select>
	学部：<input type='text' id='xuebu' name='xuebu' value='<?echo $userinfo['xuebu']; ?>'class='form-control' placeholder='学部' required>
	学院：<input type='text' id='xueyuan' name='xueyuan' value='<?echo $userinfo['xueyuan']; ?>'class='form-control' placeholder='学院' required>
	年级及专业：<input type='text' id='zhuanye' name='zhuanye' value='<?echo $userinfo['zhuanye']; ?>'class='form-control' placeholder='年级及专业' required>
	手机：<input type='text' id='phone' name='phone' value='<?echo $userinfo['phone']; ?>'class='form-control' placeholder='手机' required>
	学生类型：<select name="xuewei" id="xuewei" class="form-control">
						<option value="本科生" <?php if ($userinfo['xuewei']=='本科') {echo 'selected';} ?>>本科</option>
						<option value="研究生" <?php if ($userinfo['xuewei']=='研究生') {echo 'selected';} ?>>研究生</option>
			</select>
	个人说明：<input type='text' id='techang' name='techang' value='<?echo $userinfo['techang']; ?>'class='form-control' placeholder='个人说明' required>
		<hr>
	<div class="form-group">
	<label for="zhiyuanyi" class="">
					第一志愿
				</label>
				<div class="">
					<select name="" id="zhiyuanyi" class="form-control">
						<option value="">请选择</option>
						<option value="校学生会">校学生会</option>
            <option value="校团委">校团委</option>
						<option value="社团联合会">社团联合会</option>
						<option value="青年志愿者协会">青年志愿者协会</option>
						<option value="传媒红会">传媒红会</option>
						<option value="校研究生会">校研究生会</option>
						<option value="《传媒青年》杂志社">《传媒青年》杂志社</option>
						<option value="广播台">广播台</option>
						<option value="礼仪协会">礼仪协会</option>
					</select>
				</div>
				<div class="">
					<select name="" id="zhiyuanyi2" class="form-control">
						
					</select>
				</div>			
			</div>
			<div class="form-group">
				<label for="zhiyuaner" class="">
					第二志愿
				</label>
				<div class="">
					<select name="" id="zhiyuaner" class="form-control">
						<option value="">请选择</option>
						<option value="校学生会">校学生会</option>
						
                        <option value="校团委">校团委</option>
						
						<option value="社团联合会">社团联合会</option>
						<option value="青年志愿者协会">青年志愿者协会</option>
						<option value="传媒红会">传媒红会</option>
						<option value="校研究生会">校研究生会</option>
						<option value="《传媒青年》杂志社">《传媒青年》杂志社</option>
						<option value="广播台">广播台</option>
						<option value="礼仪协会">礼仪协会</option>
						
					</select>
				</div>
				<div class="">
					<select name="" id="zhiyuaner2" class="form-control">
						
					</select>
				</div>		
			</div>
			<div class="form-group">
				<label for="zhiyuansan" class="">
					第三志愿
				</label>
				<div class="">
					<select name="" id="zhiyuansan" class="form-control">
						<option value="">请选择</option>
						<option value="校学生会">校学生会</option>
						
                        <option value="校团委">校团委</option>
						
						<option value="社团联合会">社团联合会</option>
						<option value="青年志愿者协会">青年志愿者协会</option>
						<option value="传媒红会">传媒红会</option>
						<option value="校研究生会">校研究生会</option>
						<option value="《传媒青年》杂志社">《传媒青年》杂志社</option>
						<option value="广播台">广播台</option>
						<option value="礼仪协会">礼仪协会</option>
						
					</select>
				</div>
				<div class="">
					<select name="" id="zhiyuansan2" class="form-control">
						
					</select>
				</div>			
				
			</div>
	
	<div id='errmsg' style='font-family:'Microsoft YaHei','Arial';color:#E00;margin-top:10px;'></div>
	</br><button class="btn btn-success btn-lg" name="change" value="change" id="change" type="submit">确认信息</button>
	<script type="text/javascript" src="edit.js"></script>	
<?php }?>  
	  
	</div><!-- /input-group -->
	
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</div>
	<div class="panel-footer">你还有<?echo $userinfo['cancelcount']; ?>次取消确认机会。</div>
</div><!--class="panel panel-success"-->
	</div>
</div>
</div>


	 
</div>
</div>
</div>
</div>



	  <!--footer-->
		<div class="container">
    <footer><center style="font-size:10px;">
    <hr>
          <p> <a href="https://lyndons.cn"><img src="https://liaoyunan.cn/logo.png" height="15" width="auto"></a> © 2010-2019 Lyndon's Studio. | Powered by Langhammer CMS. 翰墨远逸通用内容管理系统 <br><a href="https://travel.lyndons.cn/page/about/#tpts">《翰墨远逸服务说明及许可条款》</a> <br> <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">粤ICP备14061580号</a> | <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44011102001127"><img src="https://lyndons.cn/gaba.png">粤公网安备 44011102001127号</a></p>
        </center></footer>
</div> 
	 <!-- /container -->
<div class="modal fade" id="detail_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="plan_title">加载数据中...</h4>
			</div>
			<div class="modal-body" id="plan_detail">
				请稍后，正在请求数据...
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	   			<button id="submit_xuehao" onclick="xuehaosub()" type="button" class="btn btn-primary">确认</button>
	 		</div>
		</div>
	</div>
</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
	  
  </body>
</html>
 <script type="text/javascript">
	$("#enrolButton").click(function()
	{
	$("#enrol").show();
	});


		function docheck()
{
	   alert("此功能暂不开放，请参加现有旅行。");
}
function cancelsub(){
	var canmodal = $("#detail_modal");
	$("#submit_xuehao").removeAttr("disabled");
		$("#submit_xuehao").html("确认");
	canmodal.modal();
	$("#submit_xuehao").show();
	$("#plan_title").html("取消确认");
	$("#plan_detail").html("<input type='text' id='xuehao_tijiao' name='xuehao_tijiao' class='form-control' placeholder='请输入学号' required autofocus><br><input type='text' id='xuehao_tijiao_re' name='xuehao_tijiao_re' class='form-control' placeholder='请再输入一次' required autofocus>");

}
function xuehaosub(){
	if (dataCheck()){
		var data={"xuehao_tijiao":$("#xuehao_tijiao").val()};
		var url="cancelqueren.php";
		$("#submit_xuehao").attr("disabled", "true");
		$("#submit_xuehao").html("提交中...");
		var callback=regCallback;
		console.log(data);
		console.log(url);
		$.post(url,data,callback)};
	
	}



function regCallback(data)
{

	switch(parseInt(data))
		{			
			case 0:
			$("#plan_title").html("已发送邮件");
			$("#plan_detail").html("一封包含确认链接的邮件已发送到你的cuc邮箱中，点击即可完成取消确认操作。<br>如尚未申请cuc邮箱，请到<a href='https://account.cuc.edu.cn/user/'>https://account.cuc.edu.cn/user/</a>注册cuc邮箱后再试～<br>如仍有问题，可联系201708213041@cuc.edu.cn解决。");	
			$("#submit_xuehao").hide();
			break;

			case -1:
			$("#plan_title").html("错误");
			$("#plan_detail").html("你已经取消确认三次了，不可以再改啦！");	
			$("#submit_xuehao").hide();
			break;
			
			case -2:
			$("#plan_title").html("错误");
			$("#plan_detail").html("你输入的学号与之前输入的不一致，请重试或联系201708213041@cuc.edu.cn重置学号。");	
			$("#submit_xuehao").hide();
			break;

			case -3:
			$("#plan_title").html("错误");
			$("#plan_detail").html("该学号已被他人使用，请重试或联系201708213041@cuc.edu.cn解决。");	
			$("#submit_xuehao").hide();
			break;

			case -5:
			console.log('服务器出错');
			alert('服务器打了个瞌睡，请重试～');	
			break;		
		}
}

function dataCheck(){
	if($("#xuehao_tijiao_re").val()!==$("#xuehao_tijiao").val())
	{
		$("#plan_title").html("错误,两次输入的学号不一致！");
		return false;
	}
if($("#xuehao_tijiao_re").val()==""||$("#xuehao_tijiao_re").val()==$("#xuehao_tijiao_re").attr("placeholder"))
	{
		$("#plan_title").html("错误,学号不能空着！");
		return false;
	}

	if($("#xuehao_tijiao").val()==""||$("#xuehao_tijiao").val()==$("#xuehao_tijiao").attr("placeholder"))
	{
		$("#plan_title").html("错误,学号不能空着！");
		return false;
	}
	return true;
}



function open_plan_detail(plan_id)
{
	var modal = $("#detail_modal");
	var enrol = arguments[1] ? arguments[1]:false;
	modal.modal();
	$("#plan_title").html("加载数据中...");
	$("#plan_detail").html("请稍后，正在请求数据...");
	if(enrol)
	{
		$("#cancel").hide();
		$("#enrol_b").show();
	}
	else
	{
		$("#enrol_b").hide();
		$("#cancel").show();
	}
	// use JSON to download the data
	$.getJSON("get_plan_detail.php", {"id":plan_id}, function(json)
	{
		$(json).each(function(index, elem)
		{
			$("#"+elem.id).html(elem.html);
		})
	});

}





function get_plan(id)
{
	var button = $("#submit");
	button.html("查询中");
	button.attr("disabled", "true");
	$.get("have_plan.php", {"id":id}, function(data)
			{
				if (data == "1") 
				{
					button.removeAttr("disabled");
					button.html("查看详情");
				}
				else
				{
					button.html("不存在");
				}
			})
}
</script>