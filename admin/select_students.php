<?php
include("connection.php");
session_start();
$id=$_POST['semId'];
$i=1;
$q=mysql_query("select * from students left join departments on students.depart_id=departments.depart_id  left join semester on students.semester_id=semester.semester_id where students.depart_id='".$_SESSION['depart_id']."' AND students.semester_id='".$id."'");
while($r=mysql_fetch_array($q)){
?>	
<tr>
<td><input type="checkbox" name="reg_no[]" id="reg_no" value="<?php echo $r['std_reg_no'];?>"></td><td><?php echo $r['std_reg_no']; ?></td><td><?php echo $r['name']; ?></td><td><?php echo $r['gender']; ?></td><td><img src="<?php echo $r['std_img']; ?>" width="100" height=100></td>
<td><?php echo $r['fname']; ?></td><td><?php echo $r['contact_no']; ?></td><td><?php echo $r['paddress']; ?></td><td><?php echo $r['depart_name']; ?></td><td><?php echo $r['semester_name']; ?></td><td><?php echo $r['session']; ?><input type="hidden" name="session[]" value="<?php echo $r['session']; ?>"></td><td><?php echo $r['email']; ?></td>
</tr>
<?php
$i++;
}
?>	