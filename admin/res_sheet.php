<script>
 
	
</script>
<style>
.txt{
	width:80px;
}
</style>

<?php
error_reporting(0);
include("connection.php");
session_start();
$depart_id=$_SESSION['depart_id'];
$s2=mysql_query("select * from results inner join departments on results.depart_id=departments.depart_id inner join semester on results.semester_id=semester.semester_id inner join staff on results.staff_id=staff.staff_id inner join courses on results.subject_id=courses.course_id where results.depart_id='".$depart_id."' and results.semester_id='".$_POST['sem']."' and results.subject_id='".$_POST['subject']."' and results.exam='".$_POST['exam']."'");
$f=mysql_fetch_array($s2);
$r1=mysql_num_rows($s2);
if($r1>0){


	 if($_POST['id']=="wlab"){
	

?>
    <table width=90% border=1 align=center class="table">

	<tr>
	<th rowspan=2>Reg No</th><th rowspan=2>Student Name</th><th colspan=5>Obtained Marks</th><th rowspan=2>Total (100)</th>
	
	</tr>
	<tr>
		<th>Mid. (30) </th><th>Final (50)</th><th>Assign. (05)</th><th>Pres. (10)</th><th>Quizzes (05)</th>
     </tr>	
	<?php
	
	//$s1=mysql_query("select * from results inner join departments on results.depart_id=departments.depart_id inner join semester on results.semester_id=semester.semester_id inner join staff on results.staff_id=staff.staff_id inner join courses on results.subject_id=courses.course_id where results.depart_id='".$depart_id."' and results.semester_id='".$_POST['sem']."' and results.subject_id='".$_POST['subject']."' and results.exam='".$_POST['exam']."'");
	//$f=mysql_fetch_array($s1);
	$r1=mysql_num_rows($s1);
	//
	
		//new code
	
	$show=mysql_query("select * from result_detail inner join students on result_detail.reg_no=students.std_reg_no where result_detail.result_id='".$f['result_id']."'");
	
	//$row=mysql_num_rows($show);
	//if($row>=1){
		while($f3=mysql_fetch_array($show)){
		?>
	<tr>
	<td><?php echo $f3['reg_no'];?><input type="hidden" name="reg_no[]" value="<?php echo $f3['reg_no'];?>"></td>
	<td><?php echo $f3['name'];?></td>
	<td><input type="text" name="mid[]" value="<?php echo $f3['mid'];?>" class="txt" id="00" onKeyUp="calcu()"></td>
	<td><input type="text" name="final[]" value="<?php echo $f3['final'];?>" class="txt" id="000" onKeyUp="calcu()" ></td>
	<td><input type="text" name="assign[]" value="<?php echo $f3['assign'];?>" class="txt" id="0000" onKeyUp="calcu()" ></td>
	<td><input type="text" name="pres[]" value="<?php echo $f3['pres'];?>" class="txt" id="00000" onKeyUp="calcu()" ></td>
	<td><input type="text" name="quizz[]" value="<?php echo $f3['quizz'];?>" class="txt" id="000000" onKeyUp="calcu()" ></td>
	<td><input type="text" name="total[]" value="<?php echo $f3['total'];?>" class="txt" id="00000000"></td>
	</tr>
		<?php
		}
	
?>
	</table>
	<?php
	}
else if($f['proforma']=="lab"){
	?>
    <table width=90% border=1 align=center class="table">
	<tr>
	<th rowspan=2>Reg No</th><th rowspan=2>Student Name</th><th colspan=6>Obtained Marks</th><th rowspan=2>Total (100)</th>
	
	</tr>
	<tr>
		<th>Mid (30)</th><th>Final (50)</th><th>Assign. (02)</th><th>Pres. (05)</th><th>Quizzes (03)</th><th>Lab. (10)</th>
     </tr>	
	<?php
	
	
	//$s1=mysql_query("select * from results inner join departments on results.depart_id=departments.depart_id inner join semester on results.semester_id=semester.semester_id inner join staff on results.staff_id=staff.staff_id inner join courses on results.subject_id=courses.course_id where results.depart_id='".$depart_id."' and results.semester_id='".$_POST['sem']."' and results.subject_id='".$_POST['subject']."' and results.exam='".$_POST['exam']."'");
	//$f=mysql_fetch_array($s1);
	$r1=mysql_num_rows($s1);
	//
	
		//new code
	
	$show=mysql_query("select * from result_detail inner join students on result_detail.reg_no=students.std_reg_no where result_detail.result_id='".$f['result_id']."'");
	
	//$row=mysql_num_rows($show);
	//if($row>=1){
		while($f3=mysql_fetch_array($show)){
		?>
	<tr>
	<td><?php echo $f3['reg_no'];?><input type="hidden" name="reg_no[]" value="<?php echo $f3['reg_no'];?>"></td>
	<td><?php echo $f3['name'];?></td>
	<td><input type="text" name="mid[]" value="<?php echo $f3['mid'];?>" class="txt" id="00" onKeyUp="calcu()"></td>
	<td><input type="text" name="final[]" value="<?php echo $f3['final'];?>" class="txt" id="000" onKeyUp="calcu()"></td>
	<td><input type="text" name="assign[]" value="<?php echo $f3['assign'];?>" class="txt" id="0000" onKeyUp="calcu()"></td>
	<td><input type="text" name="pres[]" value="<?php echo $f3['pres'];?>" class="txt" id="00000" onKeyUp="calcu()"></td>
	<td><input type="text" name="quizz[]" value="<?php echo $f3['quizz'];?>" class="txt" id="000000" onKeyUp="calcu()"></td>
	<td><input type="text" name="lab[]" value="<?php echo $f3['lab'];?>" class="txt" id="000000" onKeyUp="calcu()"></td>
	<td><input type="text" name="total[]" value="<?php echo $f3['total'];?>" class="txt" id="00000000"></td>
	</tr>
		<?php
		}
}
?>
	</table>
	
	<?php

}
else{
	 if($_POST['id']=="wlab"){
		?>
		<table width=90% border=1 align=center class="table">

	<tr>
	<th rowspan=2>Reg No</th><th rowspan=2>Student Name</th><th colspan=5>Obtained Marks</th><th rowspan=2>Total (100)</th>
	
	</tr>
	<tr>
		<th>Mid. (30) </th><th>Final (50)</th><th>Assign. (05)</th><th>Pres. (10)</th><th>Quizzes (05)</th>
     </tr>	
	<?php
	
	$sql=mysql_query("select * from students where semester_id='".$_POST['sem']."' and depart_id='".$depart_id."'");
	while($r=mysql_fetch_array($sql)){	
	
	?>
	<tr>
	<td><?php echo $r['std_reg_no'];?><input type="hidden" name="reg_no[]" value="<?php echo $r['std_reg_no'];?>"></td>
	<td><?php echo $r['name'];?></td>
	<td><input type="text" name="mid[]" value="0" class="txt" id="00" onKeyUp="calcu()" ></td>
	<td><input type="text" name="final[]" value="0" class="txt" id="000" onKeyUp="calcu()"></td>
	<td><input type="text" name="assign[]" value="0" class="txt" id="0000" onKeyUp="calcu()" ></td>
	<td><input type="text" name="pres[]" value="0" class="txt" id="00000" onKeyUp="calcu()"></td>
	<td><input type="text" name="quizz[]" value="0" class="txt" id="000000" onKeyUp="calcu()" ></td>
	<td><input type="text" name="total[]" class="txt" id="00000000"></td>
	</tr>
<?php
	}
	

		
?>
	</table>
	<?php
}else if($_POST['id']=="lab"){
	?>
    <table width=90% border=1 align=center class="table">
	<tr>
	<th rowspan=2>Reg No</th><th rowspan=2>Student Name</th><th colspan=6>Obtained Marks</th><th rowspan=2>Total (100)</th>
	
	</tr>
	<tr>
		<th>Mid (30)</th><th>Final (50)</th><th>Assign. (02)</th><th>Pres. (05)</th><th>Quizzes (03)</th><th>Lab. (10)</th>
     </tr>	
	<?php

	$sql=mysql_query("select * from students where semester_id='".$_POST['sem']."' and depart_id='".$depart_id."'");
	while($r=mysql_fetch_array($sql)){
	?>
	<tr>
	<td><?php echo $r['std_reg_no'];?><input type="hidden" name="reg_no[]" value="<?php echo $r['std_reg_no'];?>"></td>
	<td><?php echo $r['name'];?></td>
	<td><input type="text" name="mid[]" value="0" class="txt" id="00" onKeyUp="calcu()"></td>
	<td><input type="text" name="final[]" value="0" class="txt" id="000" onKeyUp="calcu()" ></td>
	<td><input type="text" name="assign[]" value="0" class="txt" id="0000" onKeyUp="calcu()" ></td>
	<td><input type="text" name="pres[]" value="0" class="txt" id="00000" onKeyUp="calcu()" ></td>
	<td><input type="text" name="quizz[]" value="0" class="txt" id="000000" onKeyUp="calcu()" ></td>
	<td><input type="text" name="lab[]" value="0" class="txt" id="0000000" onKeyUp="calcu()"></td>
	<td><input type="text" name="total[]" class="txt" id="00000000"></td>
	</tr>
<?php
	}
?>
	</table>
		
		<?php
	}
}
?>