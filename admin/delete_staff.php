<?php
include("connection.php");
$delete=mysql_query("delete from staff where staff_id='".$_GET['staff_id']."'");
if($delete){
	if($_GET['dflage']=='dp'){
		header("location:department_login.php?page=manage_staff");
	}else{
	header("location:index.php?page=manage_staff");
	}
}else{
	echo "error";
}

?>