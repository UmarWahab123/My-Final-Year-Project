
<?php
include("connection.php");
$select=mysql_query("select * from departments where depart_id='".$_GET['depart_id']."'");
$fetch=mysql_fetch_array($select);


?>
<p class="line"><?php echo $fetch['depart_name'];?> Department</p>
<fieldset class="fieldset">
<legend ><h2><?php echo $fetch['depart_name'];?> Department Staff</h2></legend>
		<?php
		$staff=mysql_query("select * from staff where depart_id='".$_GET['depart_id']."'");
		while($staff_fetch=mysql_fetch_array($staff))
		{
		?>
			<div id="section">
			<p id="section_title"><?php echo $staff_fetch['name'];?></p>
			<img src="admin/<?php echo $staff_fetch['img_path'];?>" width=200 height=200 style="border-radius:0;" class="im">
			<p id="hod">Designation: <?php echo $staff_fetch['designation'];?></p>
			<p id="depart_detail"><a href="index.php?page=depart_staff_detail&staff_id=<?php echo $staff_fetch['staff_id'];?>"><?php echo $staff_fetch['name'];?>&nbsp; Details Here</a></p>
			</div>
		<?php
		}
		?>
		</fieldset>
		<hr>
	<fieldset class="fieldset">
<legend ><h2><font color=red><?php echo $fetch['depart_name'];?> Department Courses</font></h2></legend>
	<table border=1 width=90% align=center cellpadding=5px id="tbl"> 
	<tr>   
	<Th>Semester </th><Th>Course Name </th><Th>Credit hrs </th> 
	</tr> 
	<?php
	$semester=mysql_query("select * from semester");
	while($semester_f=mysql_fetch_array($semester))
	{
	?>
	<tr><td colspan=5><h3 style="margin:0;"><font color=green><?php echo $semester_f['semester_name'];?></font></h3></td></tr>
	<?php 
	$course_q=mysql_query("select * from courses where depart_id='".$_GET['depart_id']."' AND semester_id='".$semester_f['semester_id']."'");
	while($course_f=mysql_fetch_array($course_q))
	{
	?>

	<tr>
	<td></td><td><?php echo $course_f['course_name']; ?></td><td><?php echo $course_f['credit_hrs']; ?></td>
	</tr>
	<?php
	}
	}
	?>
	</table>	
</fieldset>