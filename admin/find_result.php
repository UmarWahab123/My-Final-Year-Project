<style>
.btn{
	background-color:magenta;
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
function check(){
var a=document.getElementById("semester").value;
var b=document.getElementById("subject").value;
if(a==''){
	alert("Select Semester");
}else if(b==''){
	alert("Select Subject");
}else{
	return true;
}
}
</script>
<style>
#tbl{
	border-collapse: collapse;
}
#tbl td{
	padding:5px;
}
</style>

<div id="depart">

	<p class="line">Result Management Area</p>
	<fieldset class="fieldset">
	<legend><h3>Manage Result</h3></legend>
	<form method="POST" action="" >
		<table align=center width=70% cellpadding="10" class="tbl">
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
			
		}
		?>
		</select>
		
		</td>
		</tr>
		<tr>
		<td>Select Examination</td>
		<td>
		<select name="sem" class="sem">
			<option value="selected">Select</option>
			<option value="fall">Spring</option>
			<option value="spring">Fall</option>
		</select>
		Year :
		<select name="year">
		<option value="">Year</option>
		<?php
		for($y=2010; $y<=2040; $y++){
			?>
			<option value="<?php echo $y;?>"><?php echo $y;?></option>
			<?php
		}
		
		?>
		</select>
		
		</td>
		</tr>
		<tr>
		<td>Semester :<font color=red>*</font></td>
		<td>
		<select name="semester" id="semester" class="semester txt" style="width:200px;">
		<option value="">Select Semester</option>
		
		</select>
		
		</td>
		</tr>
		
		<tr>
		<td>Select Subject</td>
		<td>
		<select name="subject_id" class="subject" id="subject">
		<option value="">Subject</option>
		</select>
		</td>
		</tr>
	
		<td colspan=2 align=center><input type="submit" value="View Result" class="btn" onclick="return check()"></td>
		</tr>
		
		</table>
		<?php
	$sem=$_POST['sem'];
	$year=$_POST['year'];
	$exam=$sem."-".$year;
	$subject=$_POST['subject_id'];
	$semester=$_POST['semester'];
	$depart=$_POST['department'];
	$s1=mysql_query("select * from results inner join semester on results.semester_id=semester.semester_id inner join staff on results.staff_id=staff.staff_id inner join courses on results.subject_id=courses.course_id where results.depart_id='".$depart."' and results.semester_id='".$semester."' and results.subject_id='".$subject."' and results.exam='".$exam."'");
	$f=mysql_fetch_array($s1);
		?>
		<table border=1 width="90%" align=center id="tbl">
		<tr>
		<td>Department : &nbsp; <?php echo $_SESSION['depart_name'];?></td><td>Examination : &nbsp; <?php echo $f['exam'];?></td>
		</tr>
		<tr>
		<td>Semester : &nbsp; <?php echo $f['semester_name'];?></td><td></td>
		</tr>
		<tr>
		<td>Teacher Name : &nbsp; <?php echo $f['name'];?></td><td>Subject : &nbsp; <?php echo $f['course_name'];?></td>
		</tr>
		</table>
		  <table width=90% border=1 align=center class="table">
	<tr>
	<th rowspan=2>Reg No</th><th rowspan=2>Student Name</th><th colspan=6>Obtained Marks</th><th rowspan=2>Total (100)</th>
	
	</tr>
	<tr>
		<th>Mid (30)</th><th>Final (50)</th><th>Assign. </th><th>Pres. </th><th>Quizzes </th><th>Lab. </th>
     </tr>	
	<?php
	
	$sql=mysql_query("select * from result_detail inner join students on result_detail.reg_no=students.std_reg_no where result_detail.result_id='".$f['result_id']."'");
	while($r=mysql_fetch_array($sql)){
	?>
	<tr>
	<td><?php echo $r['reg_no'];?></td>
	<td><?php echo $r['name'];?></td>
	<td><?php echo $r['mid'];?></td>
	<td><?php echo $r['final'];?></td>
	<td><?php echo $r['assign'];?></td>
	<td><?php echo $r['pres'];?></td>
	<td><?php echo $r['quizz'];?></td>
	<td><?php echo $r['lab'];?></td>
	<td><?php echo $r['total'];?></td>
	</tr>
	<?php
		}
	?>
	</table>
	</form>
	</fieldset>
<hr>
	
</div>
<script>
$(document).ready(function(){
	$("#semester,.proforma").change(function(){
		var pf=$("#semester").val();
		var id=$(".proforma").val();
		var str='id='+id+'&sem='+pf;
		$.ajax({
			type:"POST",
			url:"res_sheet.php",
			data:str,
			cache:false,
			success:function(html){
				$(".show").html(html);
			}
		});
		
	});
	//second function
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
	$(".semester").change(function(){
		
		var did=$(".depart_id").val();
		var semid=$(".semester").val();
		var dataString='did='+did+'&semid='+semid;
		$.ajax({
			type:"POST",
			url:"vsubject.php",
			data:dataString,
			cache:false,
			success:function(html){
				$(".subject").html(html);
			}
		});
	});
		
	
});


</script>