<?php
include("connection.php");


$reg_no=$_POST['reg_no'];
$name=$_POST['name'];
$fname=$_POST['fname'];
$contact_no=$_POST['contact_no'];
$paddress=$_POST['paddress'];
$depart_id=$_POST['depart_id'];
$semester=$_POST['semester'];
$email=$_POST['email'];
$session=$_POST['session'];
$gender=$_POST['gender'];
$d=date("Y-m-d");

$std_img=$_FILES['std_img']['name'];
$temp=$_FILES['std_img']['tmp_name'];

$dir="std_photos/".$std_img;
$select=mysql_query("select * from students where std_reg_no='".$reg_no."'");
$row=mysql_num_rows($select);
if($row>0){
	header("location:department_login.php?page=add_student&flage=exist");
}else{	
	$sql=mysql_query("insert into students(std_reg_no,name,gender,std_img,fname,contact_no,paddress,depart_id,semester_id,promotion_date,session,email) 
	values('".$reg_no."','".$name."','".$gender."','".$dir."','".$fname."','".$contact_no."','".$paddress."','".$depart_id."','".$semester."','".$d."','".$session."','".$email."')");
	if($sql){
	move_uploaded_file($temp,$dir);	
	header("location:department_login.php?page=add_student&flage=success&session=$session&semester=$semester");		
	}else{
		die(mysql_error());
	}
}
?>