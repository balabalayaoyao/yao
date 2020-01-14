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


	$json = Array();
	date_default_timezone_set("PRC");
	$zhiyuan=$userinfo['zhiyuanyi'];
	$zhiyuan2=$userinfo['zhiyuanyi2'];
	if($_GET['key']!= "20190307005"){
		$json[0] = Array("id" => "plan_title", "html" => '错误');
		$json[1] = Array("id" => "plan_detail", "html" => "<p>口令错误。</p>");
		$json[2] = Array("id" => "enrol_plan_button", "html" => "
				<button type='button' class='btn btn-default' data-dismiss='modal'>关闭</button>
		");
		echo json_encode($json);
		exit;
	}
	$sql="SELECT DISTINCT name, xingbie, xuebu, xueyuan, xuewei, zhuanye, phone, zhiyuanyi, zhiyuanyi2, zhiyuaner, zhiyuaner2, zhiyuansan, zhiyuansan2, techang FROM  `baomingbiao` WHERE (( `zhiyuanyi` =  '$zhiyuan' AND  `zhiyuanyi2` =  '$zhiyuan2') OR ( `zhiyuaner` =  '$zhiyuan' AND `zhiyuaner2` =  '$zhiyuan2') OR ( `zhiyuansan` =  '$zhiyuan' AND  `zhiyuansan2` =  '$zhiyuan2')) AND `season` = '1902'";
	
	if ($userinfo['admin']=='3'){
	$sql="SELECT DISTINCT name, xingbie, xuebu, xueyuan, xuewei, zhuanye, phone, zhiyuanyi, zhiyuanyi2, zhiyuaner, zhiyuaner2, zhiyuansan, zhiyuansan2, techang FROM  `baomingbiao` WHERE `season` = '1902'";
	}
	
	$resultbefore=mysqli_query($con,$sql);

	if($resultbefore)
	{
		
		
		$head= "
				<table class='table table-hover' id='baomingbiao'>
				   <button id='enrol_b' type='button' class='btn btn-success'  onclick='Export();'>下载汇总表格</button><br>
				   下载的汇总表格为xls格式，若Excel提示格式不匹配，选择“仍要打开”即可<br><br>
				<thead>
				<tr>
					<th style='width: 6%;'>姓名</th>
					<th style='width: 4%;'>性别</th>
					<th style='width: 10%;'>学部</th>
					<th style='width: 10%;'>学院</th>
					<th style='width: 10%;'>专业</th>
					<th style='width: 6%;'>手机号码</th>
					<th style='width: 8%;'>志愿1</th>
					<th style='width: 8%;'>志愿2</th>
					<th style='width: 8%;'>志愿3</th>
					<th style='width: 30%;'>特长</th>
					</tr>
				</thead>
				<tbody>
					<tr>
				";
		
		while($enrol_data=mysqli_fetch_array($resultbefore)){
		$body .= "
				
					<td>$enrol_data[name]</td>
					<td>$enrol_data[xingbie]</td>
					<td>$enrol_data[xuebu]</td>
					<td>$enrol_data[xueyuan]</td>
					<td>$enrol_data[zhuanye]</td>
					<td>$enrol_data[phone]</td>
					<td>$enrol_data[zhiyuanyi]<br>$enrol_data[zhiyuanyi2]</td>
					<td>$enrol_data[zhiyuaner]<br>$enrol_data[zhiyuaner2]</td>
					<td>$enrol_data[zhiyuansan]<br>$enrol_data[zhiyuansan2]</td>
					<td>$enrol_data[techang]</td>
					</tr>
				";
		}
		$footer= "
				</tbody>	
				</table>
		";
		$table=$head.$body.$footer;
		$json[0] = Array("id" => "plan_title", "html" => "本部门招新报名数据导出（已去重）");
		$json[1] = Array("id" => "plan_detail", "html" => $table);
		
		$json[2] = Array("id" => "enrol_plan_button", "html" => "下载的汇总表格为xls格式，若excel提示不匹配，直接打开即可</br>
	   			<button id='enrol_b' type='button' class='btn btn-success'  onclick='Export();'>下载汇总表格</button>
				
		");
		
	}else{
		$json[0] = Array("id" => "plan_title", "html" => '错误');
		$json[1] = Array("id" => "plan_detail", "html" => "<p>错误！该部门无人报名。</p>");
	}
echo json_encode($json);
