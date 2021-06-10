<style>
.btn{
	background-color:brown;
	color:white;
	font-weight:bold;
	border:2px solid grey;
	padding:5px 5px;
	border-radius:10px;
}
.btn:hover{
	background-color:black;
	color:red;
	cursor:hand;
}
.table{
	margin-top:70px;
}
@media print{
fieldset{
	display:none;
}	
.line{
color:black;
font-size:25px;
margin-left:300px;
border:none;
text-decoration:underline;	
}
.table tr th:last-child{
	display:none;
}
#a{
	display:none;
}
#b{
	display:none;
}
.table tr td{
	padding:10px 10px;
	font-size:23px;
}
}
</style>

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
function sure(){
	if(confirm("Are you Sure Want to delete this record..")){
		return true;
	}else{
		return false;
	}
}

function sub(){
	if(confirm("Are you realy want to assign the subject")){
		return true;
	}else{
		return false;
	}
}


</script>

<div id="depart">
	<p class="line">Assign Subjects To Teacher</p>
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
		
			$select=mysql_query("select * from subjects_assigned where subject_id='".$subject_id."'");
			$rows=mysql_num_rows($select);
			if($rows>=1){
				?>
				<script>
				alert("Subject is already assinged");
				</script>
				<?php
			}else{
				
			if(!empty($depart_id) && !empty($semester_id) && !empty($subject_id) && !empty($staff_id))
			{
			$insert=mysql_query("insert into subjects_assigned (depart_id, staff_id, subject_id, semester_id) values ('".$depart_id."','".$staff_id."','".$subject_id."','".$semester_id."')");
			if($insert){
				?>
				<script>
				alert("Subject Is assigned successfully");
				</script>
				<?php
			}else{
				echo"error";
			}
		}else{
		echo"<font color=red>Please select all fields</font>";	
		}
	}
		?>
		</td>
		</tr>
		<form method="POST" action="" onSubmit="return sub()">
		<tr>
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
		<td>Subject</td>  
		<td>
		<select name="subject_id" id="subject_id" class="subject">
		<option value="selected">Select Subject</option>
		</select>
		</td>
		</tr>
		<tr>
		
		
		<td>Teacher :<font color=red>*</font></td>
		<td>
		<select name="staff_id" id="staff_id" class="txt" style="width:200px;">
		<option value="">Select Teacherr</option>
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
		<td colspan=2 align=center><input type="submit" value="Assign Subject" class="btn"></td>
		</tr>
		</form>
		</table>
	
	</fieldset>
<hr>
	<table width=70% border=1 align=center class="table">
	<a href="javascript:window.print()"><img src="images/print.jpg" height="40px" style="border-radius:50px; float:right;" title="print"></a>
	<tr>
	<th>S.No</th><th>Department</th><th>Semester</th><th>Subject</th><th>Credit Hrs</th><th>Teacher Name(assigned to)</th><th colspan=2>Actions</th>
	</tr>
	<?php
	$i=1;
	$query=mysql_query("select * from subjects_assigned inner join courses on subjects_assigned.subject_id=courses.course_id inner join departments on subjects_assigned.depart_id=departments.depart_id inner join semester on subjects_assigned.semester_id=semester.semester_id left outer join staff on subjects_assigned.staff_id=staff.staff_id where subjects_assigned.depart_id='".$_SESSION['depart_id']."'");
	while($q_fetch=mysql_fetch_array($query))
	{
	?>
	<tr>
	<td><?php echo $i;?></td><td><?php echo $q_fetch['depart_name'];?></td><td><?php echo $q_fetch['semester_name'];?></td><td><?php echo $q_fetch['course_name'];?></td><td><?php echo $q_fetch['credit_hrs'];?></td>
	<td><?php echo $q_fetch['name'];?></td><td id="a"><a href="department_login.php?page=edit_assign&assign_id=<?php echo $q_fetch['assign_id'];?>">Edit</a></td>
	<td id="b"><a href="delete_assign_subject.php?assign_id=<?php echo $q_fetch['assign_id'];?>" onClick="return sure()">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
	</table>
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