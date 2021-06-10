<script>
/*function check(){
var b=document.getElementById("reg").value;
if(b==''){
	alert("Enter Registration Number");
	return false;
}else{
	return true;
}
	}
*/

</script>
<style>
#tbl,table{
	border-collapse: collapse;
}
#tbl td{
	padding:5px;
}
#regtxt{
	float:right;
	
}
input[type='text']{
	outline:none;
}
fieldset{
	border:1px dashed #0c456d;
	width:90%;
	margin:0 auto;
	border-radius:20px;
}
legend{
	text-align:center;
	font-size:32px;

	
}
.btn{
	background:blue;
	name:search;
	color:red;
	border:none;
	outline:none;
	font-weight:bolder;
	font-size:50px;
	cursor:pointer;
}
hr{
	border:1px dashed #0c456d;
}
a{
	color:blue;
	padding:10px;
	
}
.tbl{
	
}
span a{
	font-size:40px;
}

@media print{
fieldset{
	border:0;
}
legend{
	display:none;
}
 .none{
	 display:none;
 }
 hr{
	 display:none;
	 
 }
 a{
	 display:none;
 }
 .print{
	 border:none;
 }
}
</style>
<script src="js/jquery.min.js"></script>
<span><a href="index.php" title="Home">&#8678;</a></span>
<div id="depart">


	<fieldset class="fieldset">
	<legend><h3><font color="solid blue">Find Result</font></h3></legend>
	<form method="POST" action="" >
	<div class="none" style="margin:20px 30%">
		<table align="center" width="70%" cellpadding="10" class="tbl" >
		
		<tr>
		<td>Department :<font color=red>*</font></td>
		<td>
		<select name="department" id="department" class="depart_id txt" style="width:200px;">
		<?php
		error_reporting(0);
		include("connection.php");
		$q=mysql_query("select * from departments");
		while($r=mysql_fetch_array($q)){
			
			?>
			<option value="<?php echo $r['depart_id'];?>"><?php echo $r['depart_name'];?></option>
		<?php
		}
		?>
		</select>
		
		</td>
		</tr>
		<tr>
		<td>Select Examination<font color=red>*</font></td>
		<td>
		<select name="sem" class="sem" id="date">
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
		<td>Select Subject<font color=red>*</font></td>
		<td>
		<select name="subject_id" class="subject">
		<option value="">Subject</option>
		</select>
		</td>
		</tr>
	<tr>
	<td id="">Registration No.<font color=red>*</font><span id="regtxt"><input type="text" style="margin:-15px 110%" name="rgn" value="" id="reg" maxlength="8"></span></td>
	</tr>
		<tr>
		<td colspan=2 align=center><input type="submit" value="&#128269" class="btn" title="Search Result" onclick="return check()"></td>
		</tr>
		
		</table>
		</div>
		<hr>
		<?php
	$sem=$_POST['sem'];
	$year=$_POST['year'];
	$exam=$sem."-".$year;
	$subject=$_POST['subject_id'];
	$semester=$_POST['semester'];
	$depart=$_POST['department'];
	$rollno=$_POST['rgn'];
	$s1=mysql_query("select * from results inner join departments on results.depart_id=departments.depart_id inner join semester on results.semester_id=semester.semester_id inner join staff on results.staff_id=staff.staff_id inner join courses on results.subject_id=courses.course_id where results.depart_id='".$depart."' and results.semester_id='".$semester."' and results.subject_id='".$subject."' and results.exam='".$exam."'");
	$f=mysql_fetch_array($s1);
		?>
		<div class="print">
		<p align=center><a href="javascript:window.print()"><img src="images/print.jpg" height="40"></a></p>
		<table border=1 width="90%" align=center id="tbl">
		<tr>
		<th colspan=2 style="padding:15px; font-size:30px;">University of Buner</th>
		</tr>
		<tr>
		<td>Department : &nbsp; <?php echo $f['depart_name'];?></td><td>Examination : &nbsp; <?php echo $f['exam'];?></td>
		</tr>
		<tr>
		<td>Semester : &nbsp; <?php echo $f['semester_name'];?></td><td></td>
		</tr>
		<tr>
		<td>Teacher Name : &nbsp; <?php echo $f['name'];?></td><td>Subject : &nbsp; <?php echo $f['course_name'];?></td>
		</tr>
		</table>
		</div>
	<?php
	if($f['proforma']=="lab"){
	?>	
		  <table width=90% border=1 align=center class="table" cellpadding=5>
	<tr>
	<th rowspan=2>Reg No</th><th rowspan=2>Student Name</th><th colspan=6>Obtained Marks</th><th rowspan=2>Total (100)</th>
	
	</tr>
	<tr>
		<th>Mid (30)</th><th>Final (50)</th><th>Assign.(2) </th><th>Pres. (5)</th><th>Quizzes (3)</th><th>Lab. (10)</th>
     </tr>	
	<?php
	
	$sql=mysql_query("select * from result_detail inner join students on result_detail.reg_no=students.std_reg_no where result_detail.result_id='".$f['result_id']."' and std_reg_no='".$rollno."'");
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
	<?php
	}else if($f['proforma']=="wlab")
	{
	?>
		  <table width=90% border=1 align=center class="table" cellpadding=5>
	<tr>
	<th rowspan=2>Reg No</th><th rowspan=2>Student Name</th><th colspan=5>Obtained Marks</th><th rowspan=2>Total (100)</th>
	
	</tr>
	<tr>
		<th>Mid (30)</th><th>Final (50)</th><th>Assign.(5) </th><th>Pres. (10)</th><th>Quizzes (5)</th>
     </tr>	
	<?php
	
	$sql=mysql_query("select * from result_detail inner join students on result_detail.reg_no=students.std_reg_no where result_detail.result_id='".$f['result_id']."' and std_reg_no='".$rollno."'");
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
	
	<td><?php echo $r['total'];?></td>
	</tr>
	<?php
		}
	?>
	</table>
	<?php
	}
	?>
	</form>
	
	</fieldset>

	
</div>

<p align=center>University of Buner Online Result Management System</p>
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