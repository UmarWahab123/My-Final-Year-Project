<style>
.btn{
	background-color:blue;
	color:white;
	font-weight:bold;
	border:2px solid grey;
	padding:5px 5px;
	border-radius:10px;
}
.btn:hover{
	background-color:black;
	color:white;
	cursor:hand;
}

</style>
<script>
/*
function calcu(idName){
	var md=parseInt(idName,2);
		 rowcount=1;
	if(parseInt(idName)>0)
	{
		md="00"+md;
	}else{
		md="00";
	}
	var n=parseFloat($("#"+md).val());
	alert(n);

	
}
*/
function calcu(){
	var md=document.getElementsByName("mid[]");
	var fnal=document.getElementsByName("final[]");
	var a=document.getElementsByName("assign[]");
	var p=document.getElementsByName("pres[]");
	var q=document.getElementsByName("quizz[]");
	var t=document.getElementsByName("total[]");
	var l=document.getElementsByName("lab[]");
	var pro=document.getElementById("prof").value;
	if(l.length==0){
		for(id=0; id<md.length; id++){
		t[id].value=parseInt(md[id].value)+parseInt(fnal[id].value)+parseInt(a[id].value)+parseInt(p[id].value)+parseInt(q[id].value);
	}
	}else{
		for(id=0; id<md.length; id++){
		t[id].value=parseInt(md[id].value)+parseInt(fnal[id].value)+parseInt(a[id].value)+parseInt(p[id].value)+parseInt(q[id].value)+parseInt(l[id].value);
	}
	}
	for(id=0; id<md.length; id++){
		if(md[id].value>30){
			md[id].value="";
			
			alert("Marks Should not be greater than 30");
			return false;
		}if(fnal[id].value>50){
			fnal[id].value="";
			alert("Marks Should not be greater than 50");
			return false;
		}
		if(q[id].value>5 && pro=='wlab'){
			q[id].value="";
			alert("Marks Should not be greater than 05");
			return false;
		}
		if(q[id].value>3 && pro=='lab'){
			q[id].value="";
			alert("Marks Should not be greater than 03");
			return false;
		}
		if(p[id].value>5 && pro=='lab'){
			p[id].value="";
			alert("Marks Should not be greater than 05");
			return false;
		}if(p[id].value>10 && pro=='wlab'){
			p[id].value="";
			alert("Marks Should not be greater than 10");
			return false;
		}
		if(a[id].value>2 && pro=='lab'){
			a[id].value="";
			alert("Marks Should not be greater than 02");
			return false;
		}
		if(a[id].value>5 && pro=='wlab'){
			a[id].value="";
			alert("Marks Should not be greater than 05");
			return false;
		}
		/*if(l[id].value>10 && pro=='lab'){
			l[id].value="";
			alert("Marks Should not be greater than 10");
			return false;
		}*/
	}
	
}
function validate(){
	var sid=document.getElementById("semester").value;
	var stf=document.getElementById("staf").value;
	var subj=document.getElementById("sub").value;
	var pro=document.getElementById("prof").value;
	
	if(sid==''){
		alert("Please select Semester");
		return false;
	}else if(stf==''){
		alert("Please select Staff Member");
		return false;
	}else if(subj==''){
		alert("Please select Staff Subject");
		return false;
	}else if(pro==''){
		alert("Please select proforma");
		return false;
	}
	
}
function simple(){
	var md=document.getElementsByName("mid[]");
	var fnal=document.getElementsByName("final[]");
	var a=document.getElementsByName("assign[]");
	var p=document.getElementsByName("pres[]");
	var q=document.getElementsByName("quizz[]");
	var t=document.getElementsByName("total[]");
	var l=document.getElementsByName("lab[]");
	var pro=document.getElementById("prof").value;
	if(l.length==0){
		for(id=0; id<md.length; id++){
		t[id].value=parseInt(md[id].value)+parseInt(fnal[id].value)+parseInt(a[id].value)+parseInt(p[id].value)+parseInt(q[id].value);
	}
	}else{
		for(id=0; id<md.length; id++){
		t[id].value=parseInt(md[id].value)+parseInt(fnal[id].value)+parseInt(a[id].value)+parseInt(p[id].value)+parseInt(q[id].value)+parseInt(l[id].value);
	}
	}
	for(id=0; id<md.length; id++){
		if(md[id].value=='' || fnal[id].value=='' || a[id].value=='' || p[id].value=='' || q[id].value==''){
			alert("Not entered");
			return false;
		}/*if(l[id].value=='' && pro=='lab'){
			alert("Not entered");
			return false;
		}*/
	}
}


</script>

<div id="depart">
<?php
if($_REQUEST['flage']=='exist'){
	?>
	<script>
	alert("Result is saved/updated successfully");
	</script>
	<?php
}else if($_REQUEST['flage']=='success'){
	?>
	<script>
	alert("Result is submitted successfully");
	</script>
	<?php
}
?>
	<p class="line">Courses Management page</p>
	<fieldset class="fieldset">
	<legend><h3>Add New Course</h3></legend>
	<form method="POST" action="result_process.php" onsubmit="return validate()" >
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
		<td>Select Examination</td>
		<td>
		<select name="sem" class="sem">
			<option value="selected">Select</option>
			<option value="fall">Spring</option>
			<option value="spring">Fall</option>
		</select>
		Year :
		<select name="year" class="year">
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
		<td>Teacher </td>
		<td>
		<select name="staff_id" class="staff" id="staf">
		<option value="">Select Teacher</option>
		<?php
		$staff=mysql_query("select * from staff where depart_id='".$_SESSION['depart_id']."'");
	     while($staff_fetch=mysql_fetch_array($staff))
	     {
	     ?>
		<option value="<?php echo $staff_fetch['staff_id'];?>"><?php echo $staff_fetch['name'];?></option>
		<?php
		 }
		
		?>
		</select>
		</td>
		</tr>
		<tr>
		<td>Select Subject</td>
		<td>
		<select name="subject_id" class="subject" id="sub">
		<option value="">Subject</option>
		</select>
		subjects will shown on the bases of semester and staff 
		</td>
		</tr>
		<tr>
		<td>Award List <br>(Lab OR Without Lab Work)</td>
		<td>
		<select name="proforma" id="prof" class="proforma">
			<option value="">Award List</option>
			<option value="lab">With Lab</option>
			<option value="wlab">Without Lab</option>
		</select>
		
		</td>
		</tr>
		<tr>
		<td>Date :</td><td><input type="text" name="subDate" value="<?php echo date("d-m-Y");?>"></td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type="submit" value="Save Result" class="btn" onclick="return simple()"></td>
		</tr>
		
		</table>
		<div class="show">
		
		</div>
	</form>
	</fieldset>
<hr>
	
</div>
<script>
$(document).ready(function(){
	$("#semester,.proforma").change(function(){
		var pf=$("#semester").val();
		var id=$(".proforma").val();
		var y=$(".year").val();
		var s=$(".sem").val();
		var subj=$(".subject").val();
		
		var exam=s+'-'+y;
		var str='id='+id+'&sem='+pf+'&exam='+exam+'&subject='+subj;
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
		$(".staff,.semester").change(function(){
		var sid=$(".staff").val();
		var did=$(".depart_id").val();
		var semid=$(".semester").val();
		var dataString='sid='+sid+'&did='+did+'&semid='+semid;
		$.ajax({
			type:"POST",
			url:"mk_subject.php",
			data:dataString,
			cache:false,
			success:function(html){
				$(".subject").html(html);
			}
		});
	});
	
});


</script>