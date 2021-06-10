<style>
.btn{
	background-color:grey;
	color:white;
	font-weight:bold;
	border:2px solid black;
	padding:5px 5px;
	border-radius:10px;
}
.btn:hover{
	background-color:blue;
	color:white;
	cursor:hand;
}
#adm{
	border:1px solid brown;
	outline:none;
	color:blue;
}
#program{
	border:1px solid brown;
	outline:none;
	color:blue;
}
</style>
<script>
function sure(){
	if(confirm("Are You sure Want to delete this record...")){
		return true;
		
	}else{
		return false;
	}
}
function check(){
	var a=document.getElementById("adm").value;
	var b=document.getElementById("program").value;
	if(a==''){
		alert("Please Write Addmission Rules");
	}else if(b==''){
		alert("Please Select Program");
	}
}
</script>
	<p class="line">Admissions Rules</p>
	<fieldset class="fieldset">
	<legend><h3>Add New Admission Rule Detail</h3></legend>
	
		<table align=center width=70% cellpadding="10" class="tbl">
		
		<tr>
		<td colspan=2>
		<?php
		include("connection.php");
		if(!empty($_POST['adm_rule']) && !empty($_POST['program'])){
			$insert=mysql_query("insert into admission_rules(adm_rule,program_id) values ('".$_POST['adm_rule']."','".$_POST['program']."')");
			if($insert){
				?>
				<script>
				alert("Admssion Rule Is Added..")
				</script>
				<?php
			}
		}else{
			echo"<font color=red>Please Fill All Fields</font>";
		}
		
		
		?>
		</td>
		</tr>
		<form method="post" action="" onSubmit="return valid()">
		<tr>
		<td> Admission Rule :<font color=red>*</font></td>
		<td><textarea name="adm_rule" id="adm" cols=70 rows=5 class="txt" placeholder="Admission Rule" maxlength="10000" onkeypress="return (event.charCode>64 && event.charCode<91 || event.charCode>96 && event.charCode<123|| event.charCode>64 && event.charCode<91 || event.charCode>47 && event.charCode<58 || event.charCode==32 || event.charCode==59 || event.charCode==58 || event.charCode==45 || event.charCode==47)" maxlength="30"></textarea></td>
		</tr>
		<tr>
		<td>Program  :<font color=red>*</font></td><td>
		<select name="program" id="program" class="txt" style="width:200px;">
		<option value="">Select Program</option>
		<?php
		
		$query=mysql_query("select * from programs");
	     while($q_fetch=mysql_fetch_array($query))
	     {
	     ?>
		<option value="<?php echo $q_fetch['program_id'];?>"><?php echo $q_fetch['program_name'];?></option>
		<?php
		 }
		?>
		</select>
		</td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type="submit" value="Add Admission Rule" class="btn" onclick="return check()"></td>
		</tr>
		</form>
		</table>
	
	</fieldset>
<hr>
	<table width=70% border=1 align=center class="table">
	<tr>
	<th>S.No</th><th>Admission Rule</th><th>Program</th><th>Actions</th>
	</tr>
	<?php
	
	$i=1;
	$rules=mysql_query("select * from admission_rules inner join programs on admission_rules.program_id=programs.program_id");
	while($row=mysql_fetch_array($rules))
	{
	?>
	<tr>
	<td><?php echo $i; ?></td><td><?php echo $row['Adm_rule']; ?></td><td><?php echo $row['program_name']; ?></td>
	<td><a href="delete_adm_rule.php?adm_rule_id=<?php echo $row['adm_rule_id'];?>" onClick="return sure()">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	
	?>
	</table>
