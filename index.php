<html>
<head>
<link href="css/layout.css" rel="stylesheet">
  <link rel="stylesheet" href="gallery/css/responsiveslides.css">
  <link rel="stylesheet" href="gallery/css/demo.css">
  <script src="gallery/js/jquery.min.js"></script>
  <script src="gallery/js/responsiveslides.min.js"></script>
  <script>

    $(function () {

      $("#slider3").responsiveSlides({
        manualControls: '#slider3-pager',
        maxwidth: 900
		
		});
		
		});
  </script>
<style>
#top_bar_right a:hover{
	background:blue;
    color:black;
    border:1px solid black;
}
#navigation_bar{
	width:100%;
    height:40px;
    font-family:sans serif, arial;
    font-weight:bold;
    color:black;
    font-size:14.5px;
    background:black;
    float:left;
    border-bottom:1px solid #0c456d;
}
#navigation_bar ul li{
	list-style:;

}
#navigation_bar ul li a:hover{
	background:#59a9de;
    text-decoration:underline;
}
#navigation_bar ul{
margin:0;
padding:0;
margin-left:100px;

}
#navigation_bar ul li{
list-style:none;

}
#navigation_bar ul li a{

float:left;
border-right:1px dotted black;
padding:16px 16px;
background:linear-gradient(180deg,#0c456d,#44b7e4);
text-decoration:none;
color:yellow;



}
#navigation_bar ul li a:hover{
background:#59a9de;
text-decoration:underline;
}
</style>
</head>
<body>
<?php
error_reporting(0);
?>
<div id="container">
	<div id="header">
		<div id="top_bar">
			<div id="top_bar_left">
			<div style="float:left; width:10%; height:100%; color:white;  font-weight:bold; background:black; border-bottom-right-radius:70px; border-top-right-radius:70px; font-size:25px">NEWS</div>
			<div style="float:right; width:90%;" >
			<?php
			include("connection.php");
			$news=mysql_query("select * from news");
			?>
			<marquee onmouseover="this.stop()" onmouseout="this.start()">
			<?php
			while($n=mysql_fetch_array($news)){
			?>
			<a href="news_detail.php?news_id=<?php echo $n['news_id'];?>"><font color=red>**&nbsp;&nbsp;</font><font color="black"><?php echo $n['title'];?></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			</font></marquee>
			
			</div>
			</div>
			<div id="top_bar_right">
				<a href="findResult.php" style="float:right; margin-right:0px; padding:0px 8px; border:1px solid yellow; border-radius:10px; font-size:25px;"><font color="white">Find Results Here</font></a>
			</div>
			<div id="main_head">
		    <img src="images/buner.jpg" height="260px" width="100%"/>
			</div>
		</div>
	
	</div>
	<div id="navigation_bar">
	 <ul>
	 <li><a href="index.php?page=home">HOME</a></li>
	 <li><a href="index.php?page=admission_rules">ADMISSIONS RULES</a></li>
	 <li><a href="index.php?page=departements">DEPARTMENTS</a></li>
	  <li><a href="index.php?page=course_of_conduct">COURSE of CONDUCT</a></li>
	 <li><a href="index.php?page=gallery">GALLERY</a></li>
	  <li><a href="index.php?page=hostel">HOSTEL</a></li>
	 <li><a href="index.php?page=staff">All STAFF</a></li>
	 <li><a href="index.php?page=download" style="border-right:none;">DOWNLOADS</a></li>
	 </ul>
	</div>
	<div id="main_body">
	
		<?php
		error_reporting(0);
		if($_REQUEST['page']=='admission_rules'){
			include("admission_rules.php");
		}else if($_REQUEST['page']=='departements'){
		include("departements.php");
		}else if($_REQUEST['page']=='depart_detail'){
		include("depart_detail.php");
		}else if($_REQUEST['page']=='depart_staff_detail'){
		include("depart_staff_details.php");
		}else if ($_REQUEST['page']=='course_of_conduct'){
			include("course_of_conduct.php");
		}else if ($_REQUEST['page']=='gallery'){
			include("gallery.php");
		}
		
		else if ($_REQUEST['page']=='hostel'){
			include("hostel.php");
		}
		else if ($_REQUEST['page']=='staff'){
			include("staff.php");
		}else if ($_REQUEST['page']=='download'){
		include("download.php");
		}else if ($_REQUEST['page']=='gallery'){
		include("gallery.php");}
		else if ($_REQUEST['page']=='home' || $_REQUEST['page']==''){
		include("home.php");}
		?>

	</div>
</div>
<div id="footer">
	<P>Online Examination System</P>
	<P>Group Members: </P>
</div>




</body>
</html>