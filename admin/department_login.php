<?php
session_start();
if($_SESSION['name']=='' && $_SESSION['depart_id']=='' && $_SESSION['staff_id']==''){
	header("location:admin_login.php");
}
error_reporting(0);
?>
<html>
<head>
<link href="css/layout.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<style>
h2{
	color:white;
	font-family:verdana;
	font-size:32px;
	line-height:inherit;
	text-shadow:0px 0px 4px black;
}
@media print{
fieldset{
	border:0;
}
#h4{
	display:none;
}

 .none{
	 display:none;
 }
 hr{
	 display:none;
	 
	 
 }
 a{
	 display:none;
 }
 .print{
	 border:none;
 }
 #h2{
	 color:black;
 }
}

#navigation_bar ul li a{
float:left;
border-right:1px dotted white;
padding:10px 10px;
background:black;
text-decoration:none;
color:white;
}
</style>
</head>
<body>

<?php
include("connection.php"); 
$s=mysql_query("select * from staff where staff_id='".$_SESSION['staff_id']."'");
$f=mysql_fetch_array($s);
$s1=mysql_query("select * from departments where depart_id='".$_SESSION['depart_id']."'");
$f1=mysql_fetch_array($s1);
$_SESSION['depart_name']=$f1['depart_name'];

?>
<div id="container">

	<div id="header" style="border-top:6px solid #0c456d;">
		<span id="h4"><h4 align="left" style="padding:3px; margin:0; color:white; display:inline; position:absolute; background:black; letter-spacing:1px; border-bottom-right-radius:15px; font-size:20px;">Loged in : <font color=white><?php  echo $f['name'];?></font></h4></span>
		<a href="logout1.php" style="float:right; color:white; background-color:black; font-size:29px;">Logout</a>
	
		<h2 align="center" id="h2">&nbsp&nbsp&nbsp&nbsp<font color="orange">&nbsp&nbspDepartment of <?php  echo $f1['depart_name'];?></font> </h2>
			
		</div>

	<div id="navigation_bar">
	 <ul>
	  <li><a href="department_login.php?page=dashboard">Dashboard</a></li>
	  <li><a href="department_login.php?page=add_student">Add Student</a></li>
	   <li><a href="department_login.php?page=view_students">View Students</a></li>
	   <li><a href="department_login.php?page=promote_students">Promote Students</a></li>
	<li><a href="department_login.php?page=mng_results">Add Results</a></li>
	<li><a href="department_login.php?page=view_results">View Results</a></li>
	<li><a href="department_login.php?page=find_result">Find Result</a></li>
	  <li><a href="department_login.php?page=manage_courses&dflage=dp">Manage Courses</a></li>
	   <li><a href="department_login.php?page=assign_subjects">Assign Subjects</a></li>
	 <li>  <a href="department_login.php?page=add_staff&dflage=dp" >Add Staff</a></li>
	 <li><a href="department_login.php?page=manage_staff"> View Staff</a></li>
	 </ul>
	
	</div>
	<div id="main_body">
	
		<?php
		if($_REQUEST['page']=="dashboard"){
			include("dashboard.php");
		}else if($_REQUEST['page']=="manage_staff"){
			include("dmanage_staff.php");
		}else if($_REQUEST['page']=="add_staff"){
			include("add_staff.php");
		}else if($_REQUEST['page']=="update_staff"){
			include("update_staff.php");
		}else if($_REQUEST['page']=="assign_subjects"){
			include("assign_subjects.php");
		}else if($_REQUEST['page']=="manage_courses"){
			include("manage_courses.php");
		}else if($_REQUEST['page']=="add_student"){
			include("add_student.php");
		}else if($_REQUEST['page']=="mng_results"){
			include("mng_results.php");
		}else if($_REQUEST['page']=="view_students"){
			include("view_students.php");
		}else if($_REQUEST['page']=="promote_students"){
			include("promote_students.php");
		}else if($_REQUEST['page']=="view_results"){
			include("view_results.php");
		}else if($_REQUEST['page']=="find_result"){
			include("find_result.php");
		}else if($_REQUEST['page']=="show_result"){
			include("show_result.php");
		}else if($_REQUEST['page']=="edit_course"){
		include("edit_course.php");	
		}else if($_REQUEST['page']=="edit_assign"){
			include("edit_assigned_course.php");
		}else if($_REQUEST['page']=="edit_student"){
			include("edit_student.php");
		}else if($_REQUEST['page']==""){
			include("dashboard.php");
		}
		
		?>
	</div>
</div>
<div id="footer">
	<P>Online Examination System</P>
	<P>Group Members: </P>
</div>




</body>
</html>