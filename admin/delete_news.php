<?php
include("connection.php");
$news_id=$_GET['news_id'];
$delete=mysql_query("delete from news where news_id='".$news_id."'");
if($delete){
	header("location:index.php?page=manage_news");
}
else{
	echo "Problem in the query";
}



?>