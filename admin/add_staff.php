<?php

?>
<style>
.btn{
	color:white;
	padding:5px 5px;
	background-color:black;
	outline:none;
	border:3px solid pink;
}
.btn:hover{
	background-color:green;
	cursor:hand;
}
#staff_name{
	outline:none;
	padding:3px 5px;
	border: 1px dashed blue;
}
#contact_no{
	outline:none;
	padding:3px 5px;
	border: 1px dashed blue;
}
#paddress{
	outline:none;
	padding:3px 5px;
	border: 1px dashed blue;
}
#department{
	outline:none;
	padding:3px 5px;
	border: 1px dashed blue;
	color:blue;
}
#qualification{
	outline:none;
	padding:3px 5px;
	border: 1px dashed blue;
	color:blue;
}
#majors{
	outline:none;
	padding:3px 5px;
	border: 1px dashed blue;
}
#designation{
	outline:none;
	padding:3px 5px;
	border: 1px dashed blue;
}
#staff_category{
	outline:none;
	padding:3px 5px;
	border: 1px dashed blue;
	color:red;
}
#email{
	outline:none;
	padding:3px 5px;
	border: 1px dashed blue;
}
#pass{
	outline:none;
	padding:3px 5px;
	border: 1px dashed blue;
	color:red;
}

</style>
<script>

function validate(){
	var staff_name=document.getElementById("staff_name").value;
	var staff_img=document.getElementById("staff_img").value;
	var contact_no=document.getElementById("contact_no").value;
	var paddress=document.getElementById("paddress").value;
	var department=document.getElementById("department").value;
	var qualification=document.getElementById("qualification").value;
	var majors=document.getElementById("majors").value;
	var staff_category=document.getElementById("staff_category").value;
	var designation=document.getElementById("designation").value;
	var email=document.getElementById("email").value;
	var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
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
	}else if(department==''){
		alert("Please Select Department..");
		return false;
	}else if(qualification==''){
		alert("Select Qualification..");
		return false;
		
	}else if(majors==''){
		aler("Please select staff_category..");
		return false;
	}else if(designation==''){
		alert("Please Select Designation..");
		return false;
	}else if(email==''){
		alert("Please Enter Email..");
	}else   if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        alert("Not a valid e-mail address");
        return false;
    }
}
function eve(e){
	
	document.getElementById("show").src=URL.createObjectURL(e);
}


</script>
<style>
#staff_img{
	display:none;
}

</style>
<div id="depart">
	<p class="line">Staff Management Page</p>
	<fieldset class="fieldset">
	<legend><h3>Add New Staff</h3></legend>
	
		<table align=center width=70% cellpadding="10" class="tbl">
		
		<form method="POST" action="staff_process.php" onSubmit="return validate()" enctype="multipart/form-data">
		<tr>
			<input type="hidden" name="dflage" value="<?php echo $_GET['dflage'];?>">
		<td id="txt">Name: </td><td><input type="text" name="staff_name" id="staff_name" class="txt" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123 || event.charCode==32)" maxlength="20"></td>
		<td rowspan=3>
		<input type="file" name="staff_img" onchange="eve(this.files[0])" id="staff_img" style="width:80px; border:1;" accept=".jfif,.jpg,.jpeg,.png,.gif">
		<label for="staff_img" id="img"><img src="../images/img_icon.png" id ="show" height="140" width="120"></label>
		
		</td>
		</tr>
		<tr>
		<td>Contact Number: </td><td><input type="text" name="contact_no" id="contact_no" class="txt" onkeypress="return (event.charCode>47 && event.charCode<58)" maxlength="11"></td>
		</tr>
	
		<tr>
		<td>Permanent address: </td><td><textarea name="paddress" id="paddress" cols=45 rows=5 class="txt" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123 || event.charCode==32 || event.charCode>45 && event.charCode<60 || event.charCode==44 || event.charCode==13)" maxlength="30"></textarea></td>
		</tr>
		<tr>
		
		<td>Department :<font color=red>*</font></td>
		<td>
	
		<select name="department" id="department" class="txt" style="width:200px;">
		<?php
		if($_REQUEST['dflage']=='dp'){
			?>
			<option value="<?php echo $_SESSION['depart_id'];?>"><?php echo $_SESSION['depart_name'];?></option>
			<?php
		}else{
		?>
		<option value="">Select Department</option>
		<?php
		include("connection.php");
		$query=mysql_query("select * from departments");
	     while($q_fetch=mysql_fetch_array($query))
	     {
	     ?>
		<option value="<?php echo $q_fetch['depart_id'];?>"><?php echo $q_fetch['depart_name'];?></option>
		<?php
		 }
		}
		?>
		</select>
		
		</td>
		</tr>
		<tr>
		<td>Qualification: </td>
		<td>
		<select name="qualification" id="qualification" class="txt">
		<option value="">Select Qualification</option>
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
		<tr>
		<td>Qualification Majors: </td><td><textarea name="qual_majors" id="majors" cols=30 rows=4 class="txt" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123 || event.charCode==32 || event.charCode==44 || event.charCode==13)" maxlength="20"></textarea></td>
		</tr>
		<tr>
		<td>Designation: </td><td><input type="text" name="designation" id="designation" class="txt" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123 || event.charCode==32)" maxlength="20"></td>
		</tr>
		<tr>
		<td>Staff Category: </td>
		<td>
		<select name="staff_category" id="staff_category" class="txt">
		<option value="">Select</option>
		<option value="HOD">HOD</option>
		<option value="other">Other</option>
		</div>
		</td>
		</tr>
		<tr>
		<tr>
		<td>Email Address: </td><td><input type="email" name="email" id="email" class="txt"></td>
		</tr>
		<tr>
		<td>Password: </td><td><input type="password" name="pass" id="pass" class="txt"></td>
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