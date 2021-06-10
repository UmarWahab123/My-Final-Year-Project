<?php
include("connection.php");
$delete=mysql_query("delete from subjects_assigned where assign_id='".$_GET['assign_id']."'");
if($delete){
header("location:department_login.php?page=assign_subjects&flage=deleted");

}else{
echo "error";
}