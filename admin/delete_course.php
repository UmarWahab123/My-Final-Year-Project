<?php
include("connection.php");
$delete=mysql_query("delete from courses where course_id='".$_GET['course_id']."'");
if($delete){
header("location:department_login.php?page=manage_courses");

}else{
echo "error";
}