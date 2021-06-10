<?php
include("connection.php");
$staff_name=$_POST['staff_name'];
$contact_no=$_POST['contact_no'];
$paddress=$_POST['paddress'];
$department=$_POST['department'];
$qualification=$_POST['qualification'];
$designation=$_POST['designation'];
$staff_category=$_POST['staff_category'];
$qual_majors=$_POST['qual_majors'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$staff_img=$_FILES['staff_img']['name'];
$temp=$_FILES['staff_img']['tmp_name'];

$dir="staff_photos/".$staff_img;
$select=mysql_query("select * from staff where email='".$email."'");
$row=mysql_num_rows($select);
if($row>0){
	if($_POST['dflage']=='dp'){
	header("location:department_login.php?page=add_staff&flage=exist");
	}else{
	header("location:index.php?page=add_staff&flage=exist");
	}
}else{
	$h=mysql_query("select * from staff where name='".$staff_name."' and staff_category='HOD' and contact_no='".$contact."'");
	$r=mysql_num_rows($h);
	if($r>0){
		
	if($_POST['dflage']=='dp'){
	header("location:department_login.php?page=add_staff&flage=hexist");
	}else{
	header("location:index.php?page=add_staff&flage=hexist");
	}
		
	}else{
	
$insert=mysql_query("insert into staff (name,img_path,contact_no,paddress,depart_id,qual_id,qual_majors,designation,staff_category,email,password) 
values ('".$staff_name."','".$dir."','".$contact_no."','".$paddress."','".$department."','".$qualification."','".$qual_majors."','".$designation."','".$staff_category."','".$email."','".$pass."')");
if($insert){
move_uploaded_file($temp,$dir);
if($_POST['dflage']=='dp'){
	header("location:department_login.php?page=add_staff&flage=success");
}else{
header("location:index.php?page=add_staff&flage=success");
}
}else{
	echo "errror";
}
}
}
?>