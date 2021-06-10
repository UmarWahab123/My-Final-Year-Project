
<?php
include("connection.php");
$select=mysql_query("select * from departments");

while($fetch=mysql_fetch_array($select))
{
?>
<p class="line"><?php echo $fetch['depart_name'];?> Department</p>
<fieldset  class="fieldset">
<legend ><h2><?php echo $fetch['depart_name'];?> Department Staff</h2></legend>
		<?php
		$staff=mysql_query("select * from staff where depart_id='".$fetch['depart_id']."'");
		while($staff_fetch=mysql_fetch_array($staff))
		{
		?>
			<div style="border:none;" id="section">
			<p id="section_title" ><?php echo $staff_fetch['name'];?></p>
			<img src="admin/<?php echo $staff_fetch['img_path'];?>" width=200 height=200 style="border-radius:20px; border-color:green;" class="im">
			<p id="hod">Designation: <?php echo $staff_fetch['designation'];?></p>
			<p id="depart_detail"><a style="color:blue;" href="index.php?page=depart_staff_detail&staff_id=<?php echo $staff_fetch['staff_id'];?>"><?php echo $staff_fetch['name'];?>&nbsp; Details Here</a></p>
			</div>
		<?php
		}
		?>
		</fieldset>
<?php
}
?>