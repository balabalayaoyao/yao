<?php 
if ($_POST['name']){
require_once ('../system/config.php');
require_once ('../system/function.php');
$con = connectSQL();
mysqli_query($con,"set character set 'utf8'");
mysqli_query($con,"set names 'utf8'");
$name=$_POST['name'];
$pswd=md5($name);
$zhiyuanyi=$_POST['zhiyuanyi'];
$zhiyuanyi2=$_POST['zhiyuanyi2'];
$sql="insert into `baomingbiao` (name,pswd,zhiyuanyi,zhiyuanyi2,season,admin) values ('$name','$pswd','$zhiyuanyi','$zhiyuanyi2','1902','1')";

$result_cookie=mysqli_query($con,$sql);

if ($result_cookie){
	echo "0";
}else{
	echo "-1";
}
	
mysqli_close($con);

}
?>
  <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="../js/jquery-ui.js"></script>
  <script type="text/javascript" src="../js/jquery.table2excel.js"></script>
<meta http-equiv="content-type" content="txt/html; charset=utf-8" />
<br>
<form action="#" method="POST">
<input name='name' id='name'>
<script type="text/javascript" src="form.js"></script>
<div class="form-group">
				<label for="zhiyuanyi" class="">
				</label>
				<div class="">
					<select name="zhiyuanyi" id="zhiyuanyi" class="form-control">
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
					<select name="zhiyuanyi2" id="zhiyuanyi2" class="form-control">
						
					</select>
				</div>			
			</div>
			<input type="submit" value="提交"/>
</form>