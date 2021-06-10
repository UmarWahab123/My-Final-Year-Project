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
	<p class="line">Result Management Area</p>
<fieldset class="fieldset">
	<legend><h3>View Results</h3></legend>
	
	<hr>
<table border=1 width="90%" align=center id="myTable" cellpadding=5>
<tr>
<th>Result Id</th><th>Department</th><th>Semester</th><th>Examination</th><th>Subject</th><th>Instructor Name</th><th>Submission Date</th><th colspan=2>Operations</th>
</tr>
<?php
include("connection.php");
$i=1;
$q=mysql_query("select * from results left join departments on results.depart_id=departments.depart_id left join courses on results.subject_id=courses.course_id left join semester on results.semester_id=semester.semester_id left join staff on results.staff_id=staff.staff_id");
while($r=mysql_fetch_array($q)){
?>	
<tr>
<td><?php echo $r['result_id']; ?></td><td><?php echo $r['depart_name']; ?></td><td><?php echo $r['semester_name']; ?></td><td><?php echo $r['exam']; ?></td>
<td><?php echo $r['course_name']; ?></td><td><?php echo $r['name']; ?></td><td><?php echo $r['subDate']; ?></td>
<td><a href="index.php?page=show_result&rid=<?php echo $r['result_id'].'&flage='.$_GET['flage'];?>">Show Result Detail</a></td><td><a href="delete_result.php?result_id=<?php echo $r['result_id'];?>" onclick="return sure()">Delete</a></td>
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
$(document).ready(function(){
	
});
</script>