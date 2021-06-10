<?php
include("connection.php");
session_start();
$d=mysql_query("delete from results where result_id='".$_GET['result_id']."'");
if($d){
$d1=mysql_query("delete from result_detail where result_id='".$_GET['result_id']."'");	
if($d1){
header("location:department_login.php?page=view_results&flage=success");	
}
}

?>