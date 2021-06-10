<?php
	include("connection.php");
//session_start();
if($_POST['id'] && $_POST['id1']){
	$id=$_POST['id'];
	$id2=$_POST['id1'];
$q=mysql_query("select * from courses where depart_id='".$id2."' and semester_id='".$id."'");
while($r=mysql_fetch_array($q)){
	
	
echo'<option value="'.$r['course_id'].'">'.$r['course_name'].'</option>';
}
}	


?>