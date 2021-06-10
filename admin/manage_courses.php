<style>
.btn{
	background-color:blue;
	color:white;
	font-weight:bold;
	border:2px solid grey;
	padding:5px 5px;
	border-radius:10px;
}
.btn:hover{
	background-color:black;
	color:white;
	cursor:hand;
}
@media print{
fieldset{
	border:0;
}
legend{
	display:none;
}

 .line{
	 display:none;
 }
.fieldset{
	display:none;
}
tr th:last-child{
	display:none;
}
#a{
	display:none;
}
#b{
	display:none;
}

}
.table{
	border:1px dashed red;
}
.table td{
	padding:10px;
	border:1px solid black;
	border-right:none;
	border-bottom:none;
}
.table tr{
	border-bottom:none;
	border-right:none;
	
}
</style>

<script>
function validate(){
	var course_name=document.getElementById("course_name").value;
	var department=document.getElementById("department").value;
	var course_credit=document.getElementById("course_credit").value;
	var semester=document.getElementById("semester").value;
	
	if(course_name==''){
		alert("Please Enter Course Name");
		return false;
		
	}
	else if(Number(course_name)){
		alert("Course Name Should not be number");
		
		return false;
	}else if(department==''){
		alert("Please Enter Description..");
		return false;
	}else if(course_credit==''){
		alert("Please Enter Marks...");
		return false;
	}
	else if(!Number(course_credit)){
		alert("Marks Should be Letters...");
		return false;
	}else if(semester==''){
		alert("Please Select Semester..");
		return false;
	}
	
	
}
function sure(){
	if(confirm("Are you Sure Want to delete this record..")){
		return true;
	}else{
		return false;
	}
}


</script>

<div id="depart">
	<p class="line">Courses Management page</p>
	<fieldset class="fieldset">
	<legend><h3>Add New Course</h3></legend>
	
		<table align=center width=50% cellpadding="10" class="tbl">
		
		<tr>
		<td colspan=2>
		<?php
		error_reporting(0);
		  include("connection.php");
		    $course_name=$_POST['course_name'];
			$department=$_POST['department']; 
			$program=$_POST['program']; 
			$course_credit=$_POST['credit_hrs']; 
		$semester=$_POST['semester']; 
			$select=mysql_query("select * from courses where course_name='".$course_name."' AND depart_id='".$department."' AND semester_id='".$semester."' AND program_id='".$program."'");
			$rows=mysql_num_rows($select);
			if($rows>=1){
				?>
				<script>
				alert("Course Name Already Exist");
				</script>
				<?php
			}else{
				
			if(!empty($course_name) && !empty($department) && !empty($course_credit))
			{
			$insert=mysql_query("insert into courses (course_name, credit_hrs, depart_id, semester_id) values ('".$course_name."','".$course_credit."','".$department."','".$semester."')");
			if($insert){
				?>
				<script>
				alert("Course is added...");
				</script>
				<?php
			}else{
				echo"error";
			}
		}
	}
		?>
		</td>
		</tr>
		<form method="POST" action="" onSubmit="return validate()">
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
		<td>Semester :<font color=red>*</font></td>
		<td>
		<select name="semester" id="semester" class="txt" style="width:200px;">
		<option value="">Select Semester</option>
		<?php
		$query1=mysql_query("select * from semester");
	     while($q_fetch1=mysql_fetch_array($query1))
	     {
	     ?>
		<option value="<?php echo $q_fetch1['semester_id'];?>"><?php echo $q_fetch1['semester_name'];?></option>
		<?php
		 }
		?>
		</select>
		
		</td>
		</tr>
		<tr>
		<td>Course Name :<font color=red>*</font></td><td><input type="text" name="course_name" id="course_name" class="txt" maxlength="50"></td>
		</tr>
		
		<tr>
		<td>Credit hrs:<font color=red>*</font></td><td><input type="text" name="credit_hrs" id="course_credit" class="txt" style="width:150px;" onkeypress="return (event.charCode==51 || event.charCode==52)" maxlength="1"></td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type="submit" value="Add New Course" class="btn"></td>
		</tr>
		</form>
		</table>
	
	</fieldset>
<hr>
	<table width=70% border=1 align=center class="table">
	<tr>
	<td colspan="7"><a href="javascript:window.print()" style="margin:10px 400px;"><img src="images/print.jpg" height="40px" style="border-radius:50px;"></a></td>
	</tr>
	<tr>
	<th>S.No</th><th>Course Name</th><th>Department Name</th><th>Credit hrs</th><th>Semester</th><th colspan=2>Actions</th>
	</tr>
	<?php
	$i=1;
	$query=mysql_query("select * from courses inner join departments on courses.depart_id=departments.depart_id inner join semester on courses.semester_id=semester.semester_id left outer join programs on courses.program_id=programs.program_id where courses.depart_id='".$_SESSION['depart_id']."' order by courses.course_id DESC");
	while($q_fetch=mysql_fetch_array($query))
	{
	?>
	<tr>
	<td><?php echo $i;?></td><td><?php echo $q_fetch['course_name'];?></td><td><?php echo $q_fetch['depart_name'];?></td><td><?php echo $q_fetch['credit_hrs'];?></td><td><?php echo $q_fetch['semester_name'];?></td>
	<td id="a"><a href="department_login.php?page=edit_course&course_id=<?php echo $q_fetch['course_id'];?>">Edit</a></td>
	<td id="b"><a href="delete_course.php?course_id=<?php echo $q_fetch['course_id'];?>" onClick="return sure()">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
	</table>
</div>