<?php
include("connection.php");
$delete=mysql_query("delete from download_files where file_id='".$_GET['file_id']."'");
if($delete){
	header("location:index.php?page=downloads");
}else{
	echo "error";
}


?>