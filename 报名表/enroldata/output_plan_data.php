<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	if($_GET['key']!= "20190307005"){
		echo "Access Denied";
		exit;
	}
	header('Content-Type: text/xls');
    header("Content-type:application/vnd.ms-excel;charset=utf-8");
    $str = mb_convert_encoding("enrol_data_export", 'gbk', 'utf-8');
    header('Content-Disposition: attachment;filename="' . $str . '.xls"');
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header("Content-Transfer-Encoding:binary");
	
	function connectSQL($host,$port,$user,$pass,$name) {
	$con = mysql_connect($host.':'.$port,$user,$pass);
	if (!$con) return false;	
	$seldb=	mysql_select_db($name,$con);
	return $con;
}
	$json = Array();

	date_default_timezone_set("PRC");
	$con=connectSQL("localhost","3306","czbm_user","WsPsseYc4PmzwHt","czbm");
	$count = 0;
	$sql="select * from `baomingbiao` where `zhiyuanyi2`='$zhiyuan' or `zhiyuaner2` ='$zhiyuan' or `zhiyuansan2` ='$zhiyuan'";
	$resultbefore=mysql_query($sql,$con);
	if($resultbefore)
	{	
		
		
		
		
		?>
				<table>
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
		<?
		while($enrol_data=mysql_fetch_array($resultbefore)){
		?>
				
					<td><?= (string)$enrol_data[name]?></td>
					<td><?= (string)$enrol_data[xingbie]?></td>
					<td><?= (string)$enrol_data[xuebu]?></td>
					<td><?= (string)$enrol_data[xueyuan]?></td>
					<td><?= (string)$enrol_data[zhuanye]?></td>
					<td><?= (string)$enrol_data[phone]?></td>
					<td><?= (string)$enrol_data[zhiyuanyi2]?></td>
					<td><?= (string)$enrol_data[zhiyuaner2]?></td>
					<td><?= (string)$enrol_data[zhiyuansan2]?></td>
					<td><?= (string)$enrol_data[techang]?></td>
					</tr>
		<?
		}
		?>
				</tbody>	
				</table>
		<?
		
		}else {
		?>
			该项目不存在
		<?
		}
		?>