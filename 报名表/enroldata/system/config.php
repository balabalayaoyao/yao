<?php
function connectSQL (){
$con = mysqli_connect(localhost,czbm_user,"WsPsseYc4PmzwHt");
if (!$con){echo "-2"; exit;}
mysqli_select_db($con,"czbm");
return $con;
}
