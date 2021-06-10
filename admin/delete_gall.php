<?php
include("connection.php");
$delete=mysql_query("delete from gallery where img_id='".$_GET['photo_id']."'");
if($delete){
	header("location:index.php?page=gallery");
}else{
	echo "error";
}


?>