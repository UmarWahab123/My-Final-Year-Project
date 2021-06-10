<?php
include("connection.php");

$title=$_POST['news_title'];
$heading=$_POST['heading'];
$url=$_POST['url'];
$date=$_POST['news_date'];
$description=$_POST['news_desc'];

$insert=mysql_query("insert into news(title, heading, url, date, description) values('".$title."', '".$heading."', '".$url."','".$date."', '".$description."')");
if($insert){
	header("location:index.php?page=add_news&flage=news_added");
}
else{
	echo "there is some problem occure in the query..";
}


?>