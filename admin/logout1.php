<?php
session_start();
			$_SESSION['name']='';
			$_SESSION['staff_id']='';
			$_SESSION['depart_id']='';
			
header("location:admin_login.php");
?>