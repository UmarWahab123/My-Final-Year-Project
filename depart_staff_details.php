<?php
include("connection.php");
$staff_detail=mysql_query("select * from staff inner join departments on staff.depart_id=departments.depart_id inner join qualification on staff.qual_id=qualification.qual_id where staff_id='".$_GET['staff_id']."'");
$staff_fetch=mysql_fetch_array($staff_detail);

?>
<div id="depart">
	<p class="line">Details</p>
	<fieldset class="fieldset">
	<legend><h3>Details</h3></legend>
	
		<table align=center width=70% cellpadding="15" class="tbl">
		
		<tr>
		<td>Name: </td><td><?php echo $staff_fetch['name'];?></td>
		<td rowspan=5><img src="admin/<?php echo $staff_fetch['img_path'];?>" width="200" height="200"></td>
		</tr>
		<tr>
		<td>Contact Number: </td><td><?php echo $staff_fetch['contact_no'];?></td>
		</tr>
	
		<tr>
		<td>Permanent address: </td><td><?php echo $staff_fetch['paddress'];?></td>
		</tr>
		<tr>
		<td>Department :<font color=red>*</font></td>
		<td>
         <?php echo $staff_fetch['depart_name'];?>
		</td>
		</tr>
		<tr>
		<td>Qualification: </td>
		<td>
		<?php echo $staff_fetch['Qualification'];?>
		</td>
		</tr>
		<tr>
		<td>Qualification Majors: </td><td><?php echo $staff_fetch['qual_majors'];?></td>
		</tr>
		<tr>
		<td>Designation: </td><td><?php echo $staff_fetch['designation'];?></td>
		</tr>
		<tr>
		<td>Staff Category: </td>
		<td>
		<?php echo $staff_fetch['staff_category'];?>
		</td>
		</tr>
		<tr>
		<tr>
		<td>Email Address: </td><td><?php echo $staff_fetch['email'];?></td>
		</tr>
		
		</form>
		</table>
	
	</fieldset>
<hr>
	
</div>
