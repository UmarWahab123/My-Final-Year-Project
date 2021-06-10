<?php
	include("connection.php");
	
//session_start();

if($_POST['did'] && $_POST['semid']){
	
	$did=$_POST['did'];
	$semid=$_POST['semid'];
$q=mysql_query("select * from subjects_assigned inner join courses on subjects_assigned.subject_id=courses.course_id where subjects_assigned.semester_id='".$semid."'
and subjects_assigned.depart_id='".$did."'");
while($r=mysql_fetch_array($q)){
	
	
echo'<option value="'.$r['course_id'].'">'.$r['course_name'].'</option>';
}
}	


?>
