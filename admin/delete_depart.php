<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("college_web_site",$con);
$delete=mysql_query("delete from departments where depart_id='".$_GET['depart_id']."'");
if($delete){
	mysql_query("delete from departments where depart_id='".$_GET['depart_id']."'");
	header("location:index.php?page=manage_depart");
}else{
	echo"error";
}
?>