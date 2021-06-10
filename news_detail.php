<head>
<style>
#detail{
	width:400px;
	height:auto;
	font-family:verdana;
	margin:10px;
}





</style>

</head>
<?php
include("connection.php");
$news_id=$_GET['news_id'];
$select=mysql_query("select * from news where news_id='".$news_id."'");
$fetch=mysql_fetch_array($select);
?>
<table align=center>
<tr>
<td>
<h2 align="center" style="color:blue; border-bottom:1px solid white;" >News Details</h1>
<h3><font color=green>Heading:</font><br><?php echo $fetch['heading'];?></h3>
<p style="color:green; font-weight:bolder;"><u>Description:</u></p>
<p><?php echo $fetch['description']; ?></p>	
<p style="color:green; font-weight:bolder;"><u>URL:</u></p>
<p><a href="<?php echo $fetch['url']; ?>"><?php echo $fetch['url']; ?></a></p>	
</td>
</tr>
</table>