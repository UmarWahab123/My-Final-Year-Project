<script>
function sure(){
	if(confirm("Are you Realy Want to Delete This Record..")){
		return true;
	}else{
		return false;
	}
}

</script>
<div id="depart">
	<p class="line">Staff Management Page</p>
	<div style="float:left; width:100%;">
	<a href="index.php?page=add_staff" style=" border:2px solid blue; padding:10px; margin-left:100px; font-size:18px; color:blue;"><img src="images/th.jpg"  height=30 width=40 align=top>Add new Staff Record</a>
<br><br><br>
<hr>
<br><br>
	
	</div>
	<table width=98% border=1 align=center class="table">
	<tr>
	<th>S.No</th><th>Name</th><th>Photo</th><th>Contact No</th><th>Address</th><th>Department</th><th>Qualification</th><th>Majors</th>
	<th>Designation</th><th>Email</th><th colspan=2>Actions</th>
	</tr>
	<?php
	
	include("connection.php");
	$select="select * from staff inner join departments on staff.depart_id=departments.depart_id inner join qualification on staff.qual_id=qualification.qual_id";
	$query=mysql_query($select);
	$i=1;
	while($row=mysql_fetch_array($query)){
	?>
	<tr>
	<td><?php echo $i; ?></td><td><?php echo $row['name']; ?></td><td><img src="<?php echo $row['img_path'];?>" height="100" width=70></td><td><?php echo $row['contact_no']; ?></td><td><?php echo $row['paddress']; ?></td><td><?php echo $row['depart_name']; ?></td><td><?php echo $row['Qualification']; ?></td><td><?php echo $row['qual_majors']; ?></td><td><?php echo $row['designation']; ?></td><td><?php echo $row['email']; ?></td>
	<td><a href="index.php?page=update_staff&staff_id=<?php echo $row['staff_id'];?>">Edit</a></td>
	<td><a href="delete_staff.php?staff_id=<?php echo $row['staff_id'];?>" onClick="return sure()">Delete</a></td>
	</tr>
	<?php
	}
	?>
	</table>
<hr>
	
</div>
<?php
if($_REQUEST['flage']=='success'){
?>
<script>
alert("Staff Record is added Successfully..");
</script>
<?php
}else if($_REQUEST['flage']=='exist'){
	?>
	<script>
alert("Email already taken");
</script>
	<?php
}else if($_REQUEST['flage']=='hexist'){
	?>
	<script>
alert("HOD is already taken");
</script>
	<?php
}
?>