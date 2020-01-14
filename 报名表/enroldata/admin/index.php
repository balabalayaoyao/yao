<?php
function GetIP() {
		if ($ip = getenv('HTTP_CLIENT_IP'));
		elseif ($ip = getenv('HTTP_X_FORWARDED_FOR'));
		elseif ($ip = getenv('HTTP_X_FORWARDED'));
		elseif ($ip = getenv('HTTP_FORWARDED_FOR'));
		elseif ($ip = getenv('HTTP_FORWARDED'));
		else    $ip = $_SERVER['REMOTE_ADDR'];
		return  $ip;
	}

		date_default_timezone_set("Asia/Shanghai");
			$fp = fopen("log.txt","a");
			fwrite($fp,"\r".date("Y-m-d H:i:s")." ");
			
			fwrite($fp,GetIP());
			fwrite($fp," ");
			fwrite($fp,$_SERVER[HTTP_USER_AGENT]);
			fwrite($fp," ");
			fclose($fp);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>中国传媒大学团学组织招新报名表</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, , user-scalable=no">
	
	<script type="text/javascript" src="jquery.min.js"></script>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
	<script type="text/javascript" src="bootstrap.min.js"></script>
	
	
	<script type="text/javascript" src="form.js"></script>
	<script type="text/javascript" src="submit.js"></script>	
	<style>
		
	</style>
</head>
<body>
	<div class="container-fluid">
	
		<img src="img/ui/ui1.png" alt="" id="bg1">
	</div>
	<div class="container-fluid">
		<img src="img/ui/ui2.png" alt="" id="bg1">
		<div class="container">
			<form action="" class="">
			
			
				<div class="form-group">
					<label for="name" class=" control-label">
						<img src="img/name1.png" alt="">
					</label>
					<div class="">
						<input type="text" class="form-control" id="name" placeholder="姓名">
					</div>
					
				</div>
				<div class="form-group ">
					<label for="male" class=" control-label">
						<img src="img/xingbie.png" alt="">
					</label>
					<div class="col-xs-12 form-horizontal">
						<div class="col-xs-4 radio">
						<label for="">
							<input type="radio" name="xingbie" id="radio1" value="男"><img src="img/nan.png" alt="">
						</label>
					</div>
					<div class="col-xs-4 radio">
						<label for="">
							<input type="radio" name="xingbie" id="radio2" value="女"><img src="img/nv.png" alt=""> 
						</label>
					</div>
					</div>
					
				</div>
				<div class="form-group">
					<label for="xuebu" class="">
						<img src="img/xuebu.png" alt="">
					</label>
					<div class="">
						<input type="text" class="form-control" id="xuebu" placeholder="学部（直属学院同学院）">
					</div>
					
				</div>
				<div class="form-group">
					<label for="xueyuan" class="">
						<img src="img/xueyuan.png" alt="">
					</label>
					<div class="">
						<input type="text" class="form-control" id="xueyuan" placeholder="学院">
					</div>
					
				</div>
				<div class="form-group">
					<label for="xuewei">
						<img src="img/leixing.png" alt="">
					</label>
					<div class="form-horizontal col-xs-12">
						<div class="col-xs-6 xw1">
							<label for="">
								<input type="radio" name="xuewei" id="radio3" value="本科"><img src="img/benke.png" alt="">
							</label>
						</div>
						<div class="col-xs-6 xw2">
							<label for="">
								<input type="radio" name="xuewei" id="radio4" value="研究生"><img src="img/yanjiusheng.png" alt="">
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="zhuanye" class="">
						<img src="img/nianji.png" alt="">
					</label>
					<div class="">
						<input type="text" class="form-control" id="zhuanye" placeholder="如：2018数字媒体艺术">
					</div>
					
				</div>
				<div class="form-group">
					<label for="phone" class="">
						<img src="img/phone.png" alt="">
					</label>
					<div class="">
						<input type="number" class="form-control" id="phone" placeholder="手机">
					</div>
					
				</div>
		</div>

	</div>
	<div class="container-fluid">
		<img src="img/ui/ui3.png" alt="" id="bg1">
	</div>
	<div class="container-fluid">
		<img src="img/ui/ui4.png" alt="" id="bg1">

	<div class="container">
		
		
			
			<div class="form-group">
				<label for="zhiyuanyi" class="">
					<img src="img/first.png" alt="">
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
					<img src="img/second.png" alt="">
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
					<img src="img/third.png" alt="">
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
		</div>
	</div>
			
	<div class="container-fluid">
		<img src="img/ui/ui5.png" alt="" id="bg1">
	</div>

	<div class="container-fluid">
		<img src="img/ui/ui6.png" alt="" id="bg1">
		<div class="container">

			<div class="form-group" style="margin-top: 0px;">
				<label for="techang" class="">
					<img src="img/xingqu.png" alt="">
				</label>
				<div class="">
					<textarea type="text"  rows="4"  class="form-control" id="techang" placeholder="兴趣特长／个人说明"></textarea>
				</div>
				
			</div>
		</div>
			<!-- <div class="form-group">
				<label for="" class="col-xs-4">
					<img src="http://oss-love-lyndonscn.oss-cn-beijing.aliyuncs.com/bmb/info.png" alt="">
				</label>
				<div class="col-xs-12">
					<textarea type="text" class="form-control" id="info" placeholder="个人介绍"></textarea>
				</div>
			</div> -->
			<!-- <div class="btn btn-default" style="margin: 0 auto;">
				<img src="http://oss-love-lyndonscn.oss-cn-beijing.aliyuncs.com/bmb/btn.png" alt="">
			</div> -->
			
			
		</form>
		
		
		</div>
		<!-- <div class="beizhu">
			<img src="http://oss-love-lyndonscn.oss-cn-beijing.aliyuncs.com/bmb/beizhu.png" alt="">
		</div> -->
		<div class="container-fluid">
			<img src="img/ui/ui7.png" alt="" id="bg1">
			<div class="footer">
				<a href="enroldata/login"><img src="img/check.png"  style="width: 40%; margin-bottom:8px;"  alt=""></a><br>	
				<img src="img/post.png"  style="width: 40%; margin-bottom:5px;"  alt="" id="btn"><br>
				<img src="http://oss-love-lyndonscn.oss-cn-beijing.aliyuncs.com/bmb/jishu.png" style="width: 50%; margin-bottom:10px;" alt="">
			</div>
		</div>
			

	<div class="g" id="g">
		<p id="gtext">报名成功</p>
		<div class="x" id="x">
			<p>确定</p>
		</div>
	</div>
	<!-- <div class="space"></div>
	<div class="footer">
		<h6>技术支持：中国传媒大学学生会网络推广部</h6>
	</div> -->
</body>
</html>