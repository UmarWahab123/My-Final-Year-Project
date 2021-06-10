<?php
session_start();
if($_SESSION['uname']==''){
	header("location:admin_login.php");
}
?>
<html>
<head>
<link href="css/layout.css" rel="stylesheet">

</head>
<body>
<div id="container">
	<div id="header">
		<a href="logout.php" style="float:right; color:yellow; background-color:black; font-size:29px;">Logout</a>
		</div>

	<div id="navigation_bar">
	 <ul>
	 <li><a href="index.php?page=downloads">Downloads</a></li>
	  <li><a href="index.php?page=manage_depart">Manage Departments</a></li>

	<li><a href="index.php?page=adm_rules">Admission Rules</a></li>
	 <li><a href="index.php?page=manage_staff">Staff</a></li>
	
	 <li><a href="index.php?page=manage_news">News</a></li>
	 <li><a href="index.php?page=gallery" style="border-right:none;">Gallery</a></li>
	 </ul>
	
	</div>
	<div id="main_body">
	
		<?php
		error_reporting(0);
		if($_REQUEST['page']=='admission_rules'){
			include("admission_rules.php");
		}else if($_REQUEST['page']=='manage_depart'){
		include("manage_departements.php");
		}else if ($_REQUEST['page']=='manage_staff'){
			include("manage_staff.php");
		}else if ($_REQUEST['page']=='add_staff'){
		include("add_staff.php");
		}else if($_REQUEST['page']=="view_results"){
			include("view_resulta.php");
		}
		else if ($_REQUEST['page']=='update_staff'){
		include("update_staff.php");
		}else if ($_REQUEST['page']=='adm_rules'){
		include("admission_rules.php");
		}else if ($_REQUEST['page']=='gallery'){
		include("manage_gallery.php");
		}else if ($_REQUEST['page']=='manage_news'){
		include("view_news.php");
		}else if ($_REQUEST['page']=='add_news'){
		include("add_news.php");
		}else if ($_REQUEST['page']=='downloads' || $_REQUEST['page']==''){
		include("manage_download_files.php");
		}else if($_REQUEST['page']=='show_result' && $_REQUEST['flage']=='ad'){
			include("show_result.php");
		}else if($_REQUEST['page']=='show_result'){
			include("show_result.php");
		}
		?>
	
	
	</div>
</div>
<div id="footer">
	<P>University of Buner Online Result Managment System</P>
	<P>Group Members: </P>
</div>




</body>
</html>