<?php
include("connection.php");
session_start();
$d=mysql_query("delete from students where std_reg_no='".$_GET['std_reg_no']."'");
if($d){
header("location:department_login.php?page=view_students&flage=dsuccess");	
}

?>