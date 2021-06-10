<style>
.btn{
	background-color:green;
	color:white;
	font-weight:bold;
	border:2px solid grey;
	padding:5px 5px;
	border-radius:10px;
}
.btn:hover{
	background-color:yellow;
	color:red;
	cursor:hand;
}
</style>
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
	if(std_img==""){
		alert("Please select image");
		return false;
	}else
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
	<p class="line">Add Student</p>
	<fieldset class="fieldset">
	<legend><h3>Add New Student</h3></legend>
	<table align=center width=70% cellpadding="10" class="tbl">
		
		<form method="POST" action="student_process.php" onSubmit="return validate()" enctype="multipart/form-data">
		<tr>
		<td>Session: </td><td><input type="text" name="session"  id="session" class="txt" onkeypress="return (event.charCode>47 && event.charCode<58)" maxlength="4" value="<?php if(empty($_GET['session'])){}else{ echo $_GET['session'];} ?>" ></td>
		<td rowspan=4><input type="file" name="std_img" onchange="eve(this.files[0])" id="std_img" style="width:80px; border:1;" accept=".png, .jpg, .jpeg"">
		<label for="std_img" id="img"><img src="../images/img_icon.png" id ="show" height="140" width="120"></label>
		</tr>
		<tr>
		<td>Reg No: </td><td><input type="text" name="reg_no" id="reg_no" class="txt" placeholder="Enter reg no" maxlength="8"></td>
		
		</td>
		</tr>
		<tr>
		<td>Name: </td><td><input type="text" name="name" id="name" class="txt" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123 || event.charCode==32)" maxlength="20" value="" ></td>
		
		</tr>
		<tr>
		<td>Gender: </td><td><input type="radio" name="gender" id="name" value="Male">Male  <input type="radio" name="gender" id="name" value="Female"> Female</td>
		</tr>
		<tr>
		<td>Father Name: </td><td><input type="text" name="fname" id="fname" class="txt" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123 || event.charCode==32)" maxlength="20"></td>
		</tr>
		<tr>
		<td>Contact Number: </td><td><input type="text" name="contact_no" id="contact_no" class="txt" onkeypress="return (event.charCode>47 && event.charCode<58)" maxlength="11"></td>
		</tr>
	
		<tr>
		<td>Permanent address: </td><td><textarea name="paddress" id="paddress" cols=45 rows=5 class="txt" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123 || event.charCode==32 || event.charCode>45 && event.charCode<60)" maxlength="50"></textarea></td>
		</tr>
		<tr>
		
		<td>Department :</td>
		<td>
	
		<select name="depart_id" id="department" class="txt" style="width:200px;">
		<?php
		if($_SESSION['depart_id']!=""){
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
		<td>Select</td>
		<td>
		<select name="sem" class="sem">
			<option value="selected">Select</option>
			<option value="fall">Spring</option>
			<option value="spring">Fall</option>
		</select>
		</td>
		</tr>
		<tr>
		<td>Semester: </td>
		<td>
		<select name="semester" id="semester" class="semester txt">
		<option value="">Select Semester</option>
		</select>
		</td>
		</tr>
		<tr>
		<tr>
		<td>Email Address: </td><td><input type="email" name="email" id="email" class="txt" maxlength="28"></td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type="submit" value="Add Student Record" class="btn" name="submit"></td>
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