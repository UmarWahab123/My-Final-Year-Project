	<style>
@media print{ 
#tbl tr td{
padding:20px;
font-size:20px;
	}
.table tr td{
	padding:30px;
	font-size:20px;
}	
}
	</style>
	<br><br>
	<a href="department_login.php?page=view_results" style="padding-left:40px;"><img src="images/back.png" height="40px" title="Go Back"></a>
	<br>
	<hr>
	
	<br>
	<?php
	//session_start();
	include("connection.php");
	
	$s1=mysql_query("select * from results inner join semester on results.semester_id=semester.semester_id inner join staff on results.staff_id=staff.staff_id inner join courses on results.subject_id=courses.course_id where results.depart_id='".$_SESSION['depart_id']."' and results.result_id='".$_GET['rid']."'");
	$f=mysql_fetch_array($s1);
		?>
		<table border=1 width="90%" align=center id="tbl">
		<a href="javascript:window.print()" style="margin:20px 300px;"><img src="images/print.jpg" height="40px" style="float:right; padding-bottom:10px; border-radius:30px;" title="Print"></a>
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
	
	$sql=mysql_query("select * from result_detail inner join students on result_detail.reg_no=students.std_reg_no where result_detail.result_id='".$_GET['rid']."'");
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
	<br><br>