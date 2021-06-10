
<script>

function validate(){
	var name=document.getElementById("name").value;
	var std_img=document.getElementById("std_img").value;
	var contact_no=document.getElementById("contact_no").value;
	var address=document.getElementById("paddress").value;
	var s=document.getElementById("semester").value;
	var department=document.getElementById("department").value;
	var session=document.getElementById("session").value;
	var fname=document.getElementById("fname").value;
	var email=document.getElementById("email").value;
	var reg_no=document.getElementById("reg_no").value;
	
	var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
	
	if(session==''){
		alert("Please Enter Session");
		document.getElementById("session").focus();
		return false;
	}else if(!Number(session)){
		alert("Session Should be number");
		document.getElementById("session").focus();
		return false;
	}else if(reg_no==""){
		alert("Please enter registration no");
		document.getElementById("reg_no").focus();
		return false;
		
	}else if(name==''){
		alert("Please Enter Name of student");
		document.getElementById("name").focus();
		return false;
	}else if(Number(name)){
		alert("Name should not number");
		document.getElementById("name").focus();
		return false;
	}else if(fname==''){
		alert("Please enter student father name");
		document.getElementById("fname").focus();
		return false;
	}else if(Number(fname)){
		alert("student father name should not be in number");
		document.getElementById("fname").focus();
		return false;
	}else if(contact_no==''){
		alert("Please enter contact No");
		document.getElementById("contact_no").focus();
		return false;
		
	}else if(address==""){
		alert("Please enter student address");
		document.getElementById("address").focus();
		return false;
	}else if(s==''){
		alert("Please select semester");
		return false;
	}
	else if(email==''){
		alert("Please Enter Email..");
		document.getElementById("email").focus();
		return false;
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
#std_img{
	display:none;
}

</style>
<div id="depart">
	<p class="line">Update Student</p>
	<a href="department_login.php?page=view_students">Go Back</a>
	<fieldset class="fieldset">
	<legend><h3>Update Student</h3></legend>
	<table align=center width=70% cellpadding="10" class="tbl">
		<tr>
		<td>
		<?php
		if(isset($_POST['submit'])){
		$reg_no=$_POST['reg_no'];
		
		$name=$_POST['name'];
		$fname=$_POST['fname'];
		$contact_no=$_POST['contact_no'];
		$paddress=$_POST['paddress'];
		$depart_id=$_POST['depart_id'];
		$semester=$_POST['semester'];
		$email=$_POST['email'];
		$session=$_POST['session'];
		$gender=$_POST['gender'];
		$d=date("Y-m-d");

		$std_img=$_FILES['std_img']['name'];
		$temp=$_FILES['std_img']['tmp_name'];
		$dir="std_photos/".$std_img;
		
		
			if(!empty($std_img)){
				
			$sql=mysql_query("update students set name='".$name."',gender='".$gender."',std_img='".$dir."',fname='".$fname."',contact_no='".$contact_no."',paddress='".$paddress."',depart_id='".$depart_id."',semester_id='".$semester."',session='".$session."',email='".$email."' where depart_id='".$depart_id."' and std_reg_no='".$_POST['std_id']."'");
			move_uploaded_file($temp,$dir);	
			}else{
			$sql=mysql_query("update students set name='".$name."',gender='".$gender."',fname='".$fname."',contact_no='".$contact_no."',paddress='".$paddress."',depart_id='".$depart_id."',semester_id='".$semester."',session='".$session."',email='".$email."' where depart_id='".$depart_id."' and std_reg_no='".$_POST['std_id']."'");	
			}
			if($sql){
			
			?>
			<script>
			alert("Student Record Updated succefully");
			</script>
			<?php
			}else{
				die(mysql_error());
			}
		}
		?>
		</td>
		</tr>
		<?php
		
		
		$q=mysql_query("select * from students left join departments on students.depart_id=departments.depart_id  left join semester on students.semester_id=semester.semester_id where students.depart_id='".$_SESSION['depart_id']."' and std_reg_no='".$_GET['std_id']."'");
		$fe=mysql_fetch_array($q);
		?>
		<form method="POST" action="" onSubmit="return validate()" enctype="multipart/form-data">
		<input type="hidden" name="std_id" value="<?php echo $_GET['std_id'];?>">
		<tr>
		<td>Session: </td><td><input type="text" name="session"  value="<?php echo $fe['session'];?>" id="session" class="txt" onkeypress="return (event.charCode>47 && event.charCode<58)" maxlength="4" value="<?php if(empty($_GET['session'])){}else{ echo $_GET['session'];} ?>" ></td>
		<td rowspan=4><input type="file" name="std_img" onchange="eve(this.files[0])" id="std_img" style="width:80px; border:1;" accept=".png, .jpg, .jpeg"">
		<label for="std_img" id="img"><img src="<?php echo $fe['std_img'];?>" id ="show" height="140" width="120"></label>
		</tr>
		<tr>
		<td>Reg No: </td><td><input type="text" name="reg_no" value="<?php echo $fe['std_reg_no'];?>" id="reg_no" class="txt" onkeypress="return (event.charCode>47 && event.charCode<58)" maxlength="8" readonly=true></td>
		
		</td>
		</tr>
		<tr>
		<td>Name: </td><td><input type="text" name="name" id="name" value="<?php echo $fe['name'];?>" class="txt" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123 || event.charCode==32)" maxlength="20" value="" ></td>
		
		</tr>
		<tr>
		<td>Gender: </td><td><input type="radio" name="gender" id="name" value="Male" <?php if($fe['gender']=='Male'){echo"checked";}?>>Male  <input type="radio" name="gender" id="name" value="Female" <?php if($fe['gender']=='Female'){echo"checked";}?>> Female</td>
		</tr>
		<tr>
		<td>Father Name: </td><td><input type="text" name="fname" value="<?php echo $fe['fname'];?>" id="fname" class="txt" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123 || event.charCode==32)" maxlength="20"></td>
		</tr>
		<tr>
		<td>Contact Number: </td><td><input type="text" name="contact_no" value="<?php echo $fe['contact_no'];?>" id="contact_no" class="txt" onkeypress="return (event.charCode>47 && event.charCode<58)" maxlength="11"></td>
		</tr>
	
		<tr>
		<td>Permanent address: </td><td><textarea name="paddress" id="paddress" cols=45 rows=5 class="txt" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123 || event.charCode==32 || event.charCode>45 && event.charCode<60)" maxlength="50">
		<?php echo $fe['paddress'];?>
		</textarea></td>
		</tr>
		<tr>
		
		<td>Department :<font color=red>*</font></td>
		<td>
	
		<select name="depart_id" id="department" class="txt" style="width:200px;">
		<?php
		if($_SESSION['depart_id']!=""){
			?>
			<option value="<?php echo $_SESSION['depart_id'];?>"><?php echo $_SESSION['depart_name'];?></option>
			<?php
		}else{
		?>
		<option value="<?php echo $fe['depart_id'];?>"><?php echo $fe['depart_name'];?></option>
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
		<td>Select</td>
		<td>
		<select name="sem" class="sem">
			<option value="">select</option>
			<option value="fall">Fall</option>
			<option value="spring">Spring</option>
		</select>
		</td>
		</tr>
		<tr>
		<td>Semester: </td>
		<td>
		<select name="semester" id="semester" class="semester txt">
		<option value="<?php echo $fe['semester_id'];?>"><?php echo $fe['semester_name'];?></option>
		</select>
		</td>
		</tr>
		<tr>
		<tr>
		<td>Email Address: </td><td><input type="text" name="email" value="<?php echo $fe['email'];?>" id="email" class="txt" maxlength="20"></td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type="submit" value="Update Student Record" class="btn" name="submit"></td>
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
alert("Student Record is added Successfully..");
</script>
<?php
}else if($_REQUEST['flage']=='exist'){
	?>
	<script>
	alert("student Reg No is already taken");
	</script>
	<?php
	
}
?>
<script>
$(document).ready(function(){
	$(".sem").change(function(){
		var id=$(this).val();
		var dataString='id='+id;
		$.ajax({
			type:"POST",
			url:"sem.php",
			data:dataString,
			cache:false,
			success:function(html){
				$(".semester").html(html);
			}
		});
	});
});

</script>