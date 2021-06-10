

<script>
/*
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
	}else if(program==''){
		alert("Please select Program");
		return false;
	}
	
	
}
*/

</script>

<div id="depart">
	<p class="line">Edit Assigned Subject</p>
	<a href="department_login.php?page=assign_subjects">Go Back</a>
	<fieldset class="fieldset">
	<legend><h3>Assign Subject</h3></legend>
	
		<table align=center width=50% cellpadding="10" class="tbl">
		
		<tr>
		<td colspan=2>
		<?php
		  include("connection.php");
		    $depart_id=$_POST['depart_id'];
			$semester_id=$_POST['semester_id']; 
			$subject_id=$_POST['subject_id']; 
			$staff_id=$_POST['staff_id']; 
		
			
				
			if(!empty($depart_id) && !empty($semester_id) && !empty($subject_id) && !empty($staff_id))
			{
			$insert=mysql_query("update subjects_assigned set staff_id='".$staff_id."', subject_id='".$subject_id."', semester_id='".$semester_id."' where assign_id='".$_POST['assign_id']."'");
			if($insert){
				?>
				<script>
				alert("Subject assigned is updated successfully");
				</script>
				<?php
			}else{
				die(mysql_error());
			}
		}else{
		echo"<font color=red>Please select all fields</font>";	
		}
	
		$e=mysql_query("select * from subjects_assigned inner join courses on subjects_assigned.subject_id=courses.course_id inner join departments on subjects_assigned.depart_id=departments.depart_id inner join semester on subjects_assigned.semester_id=semester.semester_id left outer join staff on subjects_assigned.staff_id=staff.staff_id where subjects_assigned.depart_id='".$_SESSION['depart_id']."' and subjects_assigned.assign_id='".$_GET['assign_id']."'");
		$ef=mysql_fetch_array($e);
		?>
		</td>
		</tr>
		<form method="POST" action="" onSubmit="return sub()">
		<tr>
		<input type="hidden" value="<?php echo $_GET['assign_id'];?>" name="assign_id">
		<td>Department :<font color=red>*</font></td>
		<td>
		<select name="depart_id" id="department" class="txt" style="width:200px;">
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
		<select name="semester_id" id="semester" class="semester" style="width:200px;">
		<option value="<?php echo $ef['semester_id'];?>"><?php echo $ef['semester_name'];?></option>
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
		<td>Subject</td>  
		<td>
		<select name="subject_id" id="subject_id" class="subject">
		<option value="<?php echo $ef['subject_id'];?>"><?php echo $ef['course_name'];?></option>
		</select>
		</td>
		</tr>
		<tr>
		
		
		<td>Teacher :<font color=red>*</font></td>
		<td>
		<select name="staff_id" id="staff_id" class="txt" style="width:200px;">
		<option value="<?php echo $ef['staff_id'];?>"><?php echo $ef['name'];?></option>
		<?php
		$query1=mysql_query("select * from staff where depart_id='".$_SESSION['depart_id']."'");
	     while($q_fetch1=mysql_fetch_array($query1))
	     {
	     ?>
		<option value="<?php echo $q_fetch1['staff_id'];?>"><?php echo $q_fetch1['name'];?></option>
		<?php
		 }
		?>
		</select>
		
		</td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type="submit" value="Update" class="btn"></td>
		</tr>
		</form>
		</table>
	
	</fieldset>

</div>
<script>
$(document).ready(function(){
	$("#semester").change(function(){
		var id=$(this).val();
		var id1=$("#department").val();
		var dataString='id='+id+'&id1='+id1;
		$.ajax({
			type:"POST",
			url:"subjects.php",
			data:dataString,
			cache:false,
			success:function(html){
				$(".subject").html(html);
			}
		});
	});
	
});
</script>