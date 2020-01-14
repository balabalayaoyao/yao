<?php
	function connectSQL($host,$port,$user,$pass,$name) {
	$con = mysql_connect($host.':'.$port,$user,$pass);
	if (!$con) return false;	
	$seldb=	mysql_select_db($name,$con);
	return $con;
}
	$json = Array();
	date_default_timezone_set("PRC");
	$con=connectSQL("localhost","3306","czbm_user","WsPsseYc4PmzwHt","czbm");
	$zhiyuan=$_GET['zhiyuan'];
	if($_GET['key']!= "20190307005"){
		$json[0] = Array("id" => "plan_title", "html" => '错误');
		$json[1] = Array("id" => "plan_detail", "html" => "<p>口令错误。</p>");
		$json[2] = Array("id" => "enrol_plan_button", "html" => "
				<button type='button' class='btn btn-default' data-dismiss='modal'>关闭</button>
		");
		echo json_encode($json);
		exit;
	}
	$sql="select * from `baomingbiao` where `zhiyuanyi2`='$zhiyuan' or `zhiyuaner2` ='$zhiyuan' or `zhiyuansan2` ='$zhiyuan'";
	$resultbefore=mysql_query($sql,$con);

	if($resultbefore)
	{
		
		
		$head= "
				<table class='table table-hover' id='baomingbiao'>
				<b><h2>部门报名信息</h2></b>
				<thead>
				<tr>
					<th>姓名</th>
					<th>性别</th>
					<th>学部</th>
					<th>学院</th>
					<th>专业</th>
					<th>手机号码</th>
					<th>志愿1</th>
					<th>志愿2</th>
					<th>志愿3</th>
					<th>特长</th>
					</tr>
				</thead>
				<tbody>
					<tr>
				";
		
		while($enrol_data=mysql_fetch_array($resultbefore)){
		$body .= "
				
					<td>$enrol_data[name]</td>
					<td>$enrol_data[xingbie]</td>
					<td>$enrol_data[xuebu]</td>
					<td>$enrol_data[xueyuan]</td>
					<td>$enrol_data[zhuanye]</td>
					<td>$enrol_data[phone]</td>
					<td>$enrol_data[zhiyuanyi2]</td>
					<td>$enrol_data[zhiyuaner2]</td>
					<td>$enrol_data[zhiyuansan2]</td>
					<td>$enrol_data[techang]</td>
					</tr>
				";
		}
		$footer= "
				</tbody>	
				</table>
		";
		$table=$head.$body.$footer;
		$json[0] = Array("id" => "plan_title", "html" => "报名名单");
		$json[1] = Array("id" => "plan_detail", "html" => $table);
		
		$json[2] = Array("id" => "enrol_plan_button", "html" => "下载的汇总表格为xls格式，若excel提示不匹配，直接打开即可</br>
	   			<button id='enrol_b' type='button' class='btn btn-success'  onclick='Export();'>下载汇总表格</button>
				
		");
		
	}else{
		$json[0] = Array("id" => "plan_title", "html" => '错误');
		$json[1] = Array("id" => "plan_detail", "html" => "<p>错误！该部门无人报名。</p>");
	}
echo json_encode($json);
