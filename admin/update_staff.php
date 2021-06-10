<script>
function validate(){
	var staff_name=document.getElementById("staff_name").value;
	var staff_img=document.getElementById("staff_img").value;
	var contact_no=document.getElementById("contact_no").value;
	var paddress=document.getElementById("paddress").value;
	var department=document.getElementById("department").value;
	var qualification=document.getElementById("qualification").value;
	var majors=document.getElementById("majors").value;
	var designation=document.getElementById("designation").value;
	var email=document.getElementById("email").value;
	if(staff_name==''){
		alert("Please Enter your name");
		return false;
	}else if(Number(staff_name)){
		alert("staff Name should not be number");
		return false;
	}else if(staff_img==''){
		alert("Please Select Image..");
		return false;
	}else if(contact_no==''){
		alert("Please Enter your Contact Number");
		return false;
	}else if(paddress==''){
		alert("Please Enter Your permanenet address");
		return false;
	}
}


</script>
<?php
include("connection.php");

$staff=mysql_query("select * from staff inner join departments on staff.depart_id=departments.depart_id inner join qualification on staff.qual_id=qualification.qual_id where staff.staff_id='".$_GET['staff_id']."'");
$staff_fetch=mysql_fetch_array($staff);
?>
<div id="depart">
	<p class="line">Staff Management Page</p>
	<fieldset class="fieldset">
	<legend><h3>Update Staff</h3></legend>
	
		<table align=center width=70% cellpadding="10" class="tbl">
		<form method="POST" action="update_staff_process.php" onSubmit="return validate()" enctype="multipart/form-data">
		<input type="hidden" name="dp" value="<?php echo $_GET['dflage'];?>">
		<tr>
		<td>Name: </td><td><input type="text" name="staff_name" value="<?php echo $staff_fetch['name']; ?>" id="staff_name" class="txt"></td>
		<td rowspan=2><input type="file" name="staff_img" id="staff_img"  style="width:80; border:1;"></td>
		</tr>
		<tr>
		<td>Contact Number: </td><td><input type="text" name="contact_no" value="<?php echo $staff_fetch['contact_no']; ?>" id="contact_no" class="txt"></td>
		</tr>
	
		<tr>
		<td>Permanent address: </td><td><textarea name="paddress" id="paddress" cols=45 rows=5 class="txt"><?php echo $staff_fetch['paddress']; ?></textarea></td>
		</tr>
		<tr>
		<?php
		if($_REQUEST['dflage']=='dp'){
			
		}else{
		?>
		<td>Department :<font color=red>*</font></td>
		
		<td>
		<select name="department" id="department" class="txt" style="width:200px;">
		<option value="<?php echo $staff_fetch['depart_id']; ?>"><?php echo $staff_fetch['depart_name']; ?></option>
		<?php
		include("connection.php");
		$query=mysql_query("select * from departments");
	     while($q_fetch=mysql_fetch_array($query))
	     {
	     ?>
		<option value="<?php echo $q_fetch['depart_id'];?>"><?php echo $q_fetch['depart_name'];?></option>
		<?php
		 }
		?>
		</select>
		
		</td>
		<?php
		}
		?>
		</tr>
		<tr>
		<td>Qualification: </td>
		<td>
		<select name="qualification" id="qualification" class="txt">
		<option value="<?php echo $staff_fetch['qual_id']; ?>"><?php echo $staff_fetch['Qualification']; ?></option>
		<?php
	    $qual=mysql_query("select * from qualification");
		while($qual_fetch=mysql_fetch_array($qual)){	
		?>
		<option value="<?php echo $qual_fetch['qual_id'];?>"><?php echo $qual_fetch['Qualification'];?></option>
		<?PHP
		
		}
		?>
		</select>
		</td>
		</tr>
		<input type="hidden" name="staff_id" value="<?php echo $_GET['staff_id'];?>">
		<tr>
		<td>Qualification Majors: </td><td><textarea name="qual_majors" id="majors" cols=30 rows=4 class="txt"><?php echo $staff_fetch['qual_majors']; ?></textarea></td>
		</tr>
		<tr>
		<td>Designation: </td><td><input type="text" name="designation" value="<?php echo $staff_fetch['designation']; ?>" id="designation" class="txt"></td>
		</tr>
		<tr>
		<tr>
		<td>Email Address: </td><td><input type="text" name="email" id="email" value="<?php echo $staff_fetch['email']; ?>" class="txt"></td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type="submit" value="Add New Staff" class="btn"></td>
		</tr>
		</form>
		</table>
	
	</fieldset>
<hr>
	
</div>
<?php
if($_REQUEST['flage']=='updated'){
?>
<script>
alert("Staff Record is updated  Successfully..");
</script>
<?php
echo $_GET['staff_id'];
}
?>