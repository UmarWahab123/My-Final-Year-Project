<?php
include("connection.php");
$staff_name=$_POST['staff_name'];
$contact_no=$_POST['contact_no'];
$paddress=$_POST['paddress'];
$department=$_POST['department'];
$qualification=$_POST['qualification'];
$designation=$_POST['designation'];
$qual_majors=$_POST['qual_majors'];
$email=$_POST['email'];
$staff_img=$_FILES['staff_img']['name'];
$temp=$_FILES['staff_img']['tmp_name'];
$dir="staff_photos/".$staff_img;
$staff_id=$_POST['staff_id'];
if($_POST['dp']=='dp'){
$update=mysql_query("update staff  set name='".$staff_name."', img_path='".$dir."', contact_no='".$contact_no."', paddress='".$paddress."',
qual_id='".$qualification."', qual_majors='".$qual_majors."', designation='".$designation."', email='".$email."' where staff_id='".$staff_id."'");	
}else{
	$update=mysql_query("update staff  set name='".$staff_name."', img_path='".$dir."', contact_no='".$contact_no."', paddress='".$paddress."', depart_id='".$department."',
qual_id='".$qualification."', qual_majors='".$qual_majors."', designation='".$designation."', email='".$email."' where staff_id='".$staff_id."'");
}

if($update){
	move_uploaded_file($temp,$dir);
	if($_POST['dp']=='dp'){
		header("location:department_login.php?page=update_staff&flage=updated&dflage=dp&staff_id=".$_POST['staff_id']);	
	}else{
		header("location:index.php?page=update_staff&flage=updated&staff_id=".$_POST['staff_id']);
	}
	
}else{
	echo"error";
	
}
?>