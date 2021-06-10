<script>
function validate(){
	var course_name=document.getElementById("course_name").value;
	var department=document.getElementById("department").value;
	var course_credit=document.getElementById("course_credit").value;
	var semester=document.getElementById("semester").value;
	var semester=document.getElementById("program").value;
	if(course_name==''){
		alert("Please Enter Course Name");
		return false;
		
	}
	else if(Number(course_name)){
		alert("Department Name Should not be number");
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
	<p class="line">Courses Updatation Area</p>
	<a href="department_login.php?page=manage_courses">Go Back</a>
	<fieldset class="fieldset">
	<legend><h3>Edit Course</h3></legend>
	
		<table align=center width=50% cellpadding="10" class="tbl">
		
		<tr>
		<td colspan=2>
		<?php
		  include("connection.php");
		    $course_name=$_POST['course_name'];
			$department=$_POST['department']; 
			$program=$_POST['program']; 
			$course_credit=$_POST['credit_hrs']; 
		    $semester=$_POST['semester']; 
			$select=mysql_query("select * from courses where course_name='".$course_name."' AND depart_id='".$department."' AND semester_id='".$semester."'");
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
			$update=mysql_query("update courses set course_name='".$course_name."', credit_hrs='".$course_credit."', depart_id='".$department."', semester_id='".$semester."' where course_id='".$_GET['course_id']."' and depart_id='".$_SESSION['depart_id']."'");
			if($update){
				?>
				<script>
				alert("Course is Updated...");
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
		<?php
		$course_detail=mysql_query("select * from courses inner join departments on courses.depart_id=departments.depart_id inner join semester on courses.semester_id=semester.semester_id where courses.course_id='".$_GET['course_id']."' and courses.depart_id='".$_SESSION['depart_id']."'");
		$fetch_reco=mysql_fetch_array($course_detail);
		
		?>
		<!---break  -->
		<form method="POST" action="" onSubmit="return validate()">
		<tr>
		<td>Department :<font color=red>*</font></td>
		<td>
		<select name="department" id="department" class="depart_id txt" style="width:200px;">
		
		<?php
		if($_SESSION['depart_id']!=''){
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
		<option value="<?php echo $fetch_reco['semester_id']; ?>"><?php echo $fetch_reco['semester_name']; ?></option>
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
		<td>Course Name :<font color=red>*</font></td><td><input type="text" value="<?php echo $fetch_reco['course_name']; ?>" name="course_name" id="course_name" class="txt"></td>
		</tr>
		
		<tr>
		<td>Credit hrs:<font color=red>*</font></td><td><input type="text" name="credit_hrs" id="course_credit" value="<?php echo $fetch_reco['credit_hrs']; ?>"  class="txt" style="width:150px;"></td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type="submit" value="Update Course" class="btn"></td>
		</tr>
		</form>
		</table>
	
	</fieldset>

</div>