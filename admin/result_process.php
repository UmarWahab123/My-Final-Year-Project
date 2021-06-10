<?php
include("connection.php");


$depart_id=$_POST['department'];
$exam=$_POST['sem'];
$year=$_POST['year'];
$session=$_POST['session'];
$examination=$exam."-".$year;
$semester=$_POST['semester'];
$staff_id=$_POST['staff_id'];
$subject_id=$_POST['subject_id'];
$date=$_POST['subDate'];
$proforma=$_POST['proforma'];

//Upper Variables end
$reg_no=$_POST['reg_no'];
$mid=$_POST['mid'];
$final=$_POST['final'];
$assign=$_POST['assign'];
$pres=$_POST['pres'];
$quizz=$_POST['quizz'];
$lab=$_POST['lab'];
$total=$_POST['total'];
$select=mysql_query("select * from results where exam='".$examination."' and depart_id='".$depart_id."' and semester_id='".$semester."' and subject_id='".$subject_id."'");

$row=mysql_num_rows($select);
if($row>0){
	$f1=mysql_fetch_array($select);
	foreach($reg_no as $dix=>$value){
	$update=mysql_query("update result_detail set mid='".$mid[$dix]."',final='".$final[$dix]."',assign='".$assign[$dix]."',pres='".$pres[$dix]."',quizz='".$quizz[$dix]."',lab='".$lab[$dix]."',total='".$total[$dix]."' where reg_no='".$reg_no[$dix]."' and result_id='".$f1['result_id']."'");
	}
	if($update){
		header("location:department_login.php?page=mng_results&flage=exist");
	}
}else{
$insert1=mysql_query("insert into results(depart_id,semester_id,staff_id,subject_id,exam,subDate,proforma) 
values('".$depart_id."','".$semester."','".$staff_id."','".$subject_id."','".$examination."','".$date."','".$proforma."')");

$last_id=mysql_insert_id();
		foreach($reg_no as $dix=>$value){
		$insert2=mysql_query("insert into result_detail(result_id,reg_no,mid,final,assign,pres,quizz,lab,total) 
		values('".$last_id."','".$reg_no[$dix]."','".$mid[$dix]."','".$final[$dix]."','".$assign[$dix]."','".$pres[$dix]."','".$quizz[$dix]."','".$lab[$dix]."','".$total[$dix]."')");
	}
	if($insert2){
		header("location:department_login.php?page=mng_results&flage=success");
	}
	
}
	

?>