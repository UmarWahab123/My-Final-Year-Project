<?php

include("connection.php");
session_start();
$from=$_POST['semFrom'];
$to=$_POST['semTo'];
$session=$_POST['session'];
$reg_no=$_POST['reg_no'];
$d=date("Y-m-d");
$d1=new DateTime($d);

if($reg_no==""){
	header("location:department_login.php?page=promote_students&flage=selectStd");
}else{
	
	
foreach($reg_no as $k=>$v){

	$s=mysql_query("select * from students where semester_id='".$from."' and session='".$session[$k]."' and depart_id='".$_SESSION['depart_id']."'");
	$f=mysql_fetch_array($s);
	$fr=new DateTime($f['promotion_date']);
	$interval = $d1->diff($fr);
	$no=(int)$interval->format('%m');
	if($no<4){
		header("location:department_login.php?page=promote_students&flage=notPromoted");
	}else{
		
	$update=mysql_query("update students set semester_id='".$to."', promotion_date='".$d."' where std_reg_no='".$reg_no[$k]."' and session='".$session[$k]."' and depart_id='".$_SESSION['depart_id']."'");
	
	}
}
if($update){
  header("location:department_login.php?page=promote_students&flage=promoted");
}
}


?>