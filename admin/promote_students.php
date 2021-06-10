<style>
#depart a{
	
	background:#0c456d;
	padding:5px;
	color:white;
	text-decoration:none;
	border-radius:10px;
	border:1px solid black;
	
}
#depart a:hover{
	background:#44b7e4;
}
</style>
<script>
function validate(){
	var semFrom=document.getElementById("semFrom");
	var semTo=document.getElementById("semTo");
	if(semFrom.selectedIndex==""){
		alert("Please Select Semester from which you want to promote students");
		return false;
	}else if(semTo.selectedIndex==""){
		alert("Please select semester to which you want to promote students");
		return false;
	}else if(semTo.value==semFrom.value){
		alert("Promote From semester should not be same to promote to semester");
		return false;
	}
	else if(parseInt(semTo.value)==parseInt(semFrom.value)+1){
		if(confirm("are you realy want to promote students")){
			return true;
		}else{
		return false;
		}
	}else{
		alert("please select correct combination");
		return false;
	}
	
}
</script>
<?php
if($_REQUEST['flage']=="promoted"){
	?>
	<script>
	alert("Students are promoted");
	</script>
	<?php
}else if($_REQUEST['flage']=="selectStd"){
	?>
	<script>
	alert("Select Students to be promoted");
	</script>
	<?php
}else if($_REQUEST['flage']=="notPromoted"){
	?>
	<script>
	alert("At least after 4 months of addmission or promotion you can promote students");
	</script>
	<?php
}
?>
<div id="depart">
	<p class="line">Promote</p>
<fieldset class="fieldset">
	<legend><h3>Promote Students</h3></legend>
	<form id="myForm" method="POST" action="promote_process.php" onsubmit="return validate()">
	<table align=center width=80%>
	<tr>
	<td>Promote From :</td>
	<td>
	<select name="semFrom" class="semesterfrom" id="semFrom">
	<option value="">Semester</option>
	<?php
	include("connection.php");
	$q=mysql_query("select * from semester");
	while($r=mysql_fetch_array($q)){
		?>
		<option value="<?php echo $r['semester_id'];?>"><?php echo $r['semester_name'];?></option>
		<?php
	}
	?>
	</select>
	</td>
	<td>To</td>
	<td>
	<select name="semTo" class="semTo" id="semTo">
	<option value="">Semester</option>
	<?php
		$q=mysql_query("select * from semester");
	while($r=mysql_fetch_array($q)){
		?>
		<option value="<?php echo $r['semester_id'];?>"><?php echo $r['semester_name'];?></option>
		<?php
	}
	?>
	<option value="9">Release</option>
	</select>
	</td>
	<td><input type="submit" value="Promote"></td>
	</tr>
	
	</table>
	<hr>

<table border=1 width="90%" align=center id="myTable" cellpadding=7>
<thead>
<tr>
<th colspan=12 "><a href="#" class="checkAll">CheckAll</a> &nbsp; &nbsp;&nbsp;<a href="#" class="uncheckAll">UncheckAll</a></th>
</tr>
<tr>
<th>Select</th><th>Reg No</th><th>Name</th><th>Gender</th><th>Photo</th><th>Father Name</th><th>Contact No</th><th>Address</th><th>Department</th><th>Semester</th><th>Session</th><th>Email</th>
</tr>
</thead>
<tbody id="mytr">

</tbody>
</table>
</form>	
</fieldset>
</div>
<script>
$(document).ready(function(){
	$(".semesterfrom").change(function(){
		var id=$(this).val();
		var dataString='semId='+id;
		$.ajax({
			type:"POST",
			url:"select_students.php",
			data:dataString,
			cache:false,
			success:function(html){
				$("#mytr").html(html);
			}
		});
	});
	$('.checkAll').click(function(){
    $('form#myForm input:checkbox').each(function(){
        $(this).prop('checked',true);
	});               
	});

	$('.uncheckAll').click(function(){
		$('form#myForm input:checkbox').each(function(){
			$(this).prop('checked',false);
	   })               
	});
});
</script>