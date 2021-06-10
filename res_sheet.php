<style>
.txt{
	width:80px;
}
</style>

<?php
include("connection.php");
session_start();
$depart_id=$_SESSION['depart_id'];
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
	<td><input type="text" name="mid[]" value="0" class="txt" id="00" onKeyUp="calcu()"></td>
	<td><input type="text" name="final[]" value="0" class="txt" id="000" onKeyUp="calcu()"></td>
	<td><input type="text" name="assign[]" value="0" class="txt" id="0000" onKeyUp="calcu()"></td>
	<td><input type="text" name="pres[]" value="0" class="txt" id="00000" onKeyUp="calcu()"></td>
	<td><input type="text" name="quizz[]" value="0" class="txt" id="000000" onKeyUp="calcu()"></td>
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
	<td><input type="text" name="final[]" value="0" class="txt" id="000" onKeyUp="calcu()"></td>
	<td><input type="text" name="assign[]" value="0" class="txt" id="0000" onKeyUp="calcu()"></td>
	<td><input type="text" name="pres[]" value="0" class="txt" id="00000" onKeyUp="calcu()"></td>
	<td><input type="text" name="quizz[]" value="0" class="txt" id="000000" onKeyUp="calcu()"></td>
	<td><input type="text" name="lab[]" value="0" class="txt" id="000000" onKeyUp="calcu()"></td>
	<td><input type="text" name="total[]" class="txt" id="00000000"></td>
	</tr>
<?php
	}
?>
	</table>
	
	<?php
}
