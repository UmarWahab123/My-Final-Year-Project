<script>
function sure(){
	if(confirm("Are you realy want to delete this record")){
		return true;
	}else {
		return false;
	}
}
</script>

<div id="depart">
	<p class="line">Student Management Area</p>
<fieldset class="fieldset">
	<legend><h3>Manage Students</h3></legend>
	<table align=center width=80%>
	<tr>
	<td>Search By Reg Number :</td><td><input type="text" id="input1" onkeyup="myFunction1()" placeholder="Search By Reg No"></td>
	<td>Search By Semester</td>
	<td><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Semester" title="Type in a Semester"></td>
	<td></td>
	</tr>
	</table>
	<hr>
<table border=1 width="90%" align=center id="myTable" cellpadding=5>
<tr>
<th>Select</th><th>Reg No</th><th>Name</th><th>Gender</th><th>Photo</th><th>Father Name</th><th>Contact No</th><th>Address</th><th>Department</th><th>Semester</th><th>Session</th><th>Email</th><th colspan=2>Operations</th>
</tr>
<?php
include("connection.php");
$i=1;
$q=mysql_query("select * from students left join departments on students.depart_id=departments.depart_id  left join semester on students.semester_id=semester.semester_id where students.depart_id='".$_SESSION['depart_id']."' order by students.semester_id ASC");
while($r=mysql_fetch_array($q)){
?>	
<tr>
<td><input type="checkbox" name="reg_no[]" value="<?php echo $r['reg_no'];?>"></td><td><?php echo $r['std_reg_no']; ?></td><td><?php echo $r['name']; ?></td><td><?php echo $r['gender']; ?></td><td><img src="<?php echo $r['std_img']; ?>" width="100" height=100></td>
<td><?php echo $r['fname']; ?></td><td><?php echo $r['contact_no']; ?></td><td><?php echo $r['paddress']; ?></td><td><?php echo $r['depart_name']; ?></td><td><?php echo $r['semester_name']; ?></td><td><?php echo $r['session']; ?></td><td><?php echo $r['email']; ?></td>
<td><a href="department_login.php?page=edit_student&std_id=<?php echo $r['std_reg_no'];?>">Edit</a></td><td><a href="delete_std.php?std_reg_no=<?php echo $r['std_reg_no'];?>" onclick="return sure()">Delete</a></td>
</tr>
<?php
$i++;
}
?>	
</table>	
</fieldset>
</div>
<?php
if($_REQUEST['flage']=='dsuccess'){
	?>
	<script>
	alert("Student Record Deleted successfully");
	</script>
	<?php
}

?>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[9];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("input1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
$(document).ready(function(){
	
});
</script>