<p class="line">Departments of GC Daggar</p>

<div id="depart">
<?php
include("connection.php");
$depatments=mysql_query("select * from departments");
while($fetch=mysql_fetch_array($depatments))
{
	$hod=mysql_query("select * from staff where depart_id='".$fetch['depart_id']."' AND staff_category='HOD'");
	$hod_fetch=mysql_fetch_array($hod);
?>
	<div id="section">
	<p id="section_title"><?php echo $fetch['depart_name'];?></p>
	<img src="admin/<?php echo $hod_fetch['img_path'];?>" width=200 height=200 class="im">
	<p id="hod">HOD: <?php echo $hod_fetch['name'];?></p>
	<p id="depart_detail"><a href="index.php?page=depart_detail&depart_id=<?php echo $fetch['depart_id'];?>">Department Details Here</a></p>
	</div>
<?php
}
?>
</div>
