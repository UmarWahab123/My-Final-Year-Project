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
	background-color:red;
	color:white;
	cursor:hand;
}
</style>
<script>
function valid(){
	var dname=document.getElementById("depart_name").value;
	var desc=document.getElementById("description").value;
	if(dname==''){
		alert("Please Enter Department Name");
		return false;
		
	}
	else if(Number(dname)){
		alert("Department Name Should not be number");
		return false;
	}else if(desc==''){
		alert("Please Enter Description..");
		return false;
	}
	
	
}
function sure(){
	if(confirm("Are you Realy Want to delete this Department")){
		return true;
		
	}else{
		return false;
	}
}

</script>

<div id="depart">
	<p class="line">Manage Departments Page</p>
	<fieldset class="fieldset">
	<legend><h3>Add New Department</h3></legend>
	
		<table align=center width=50% cellpadding="10" class="tbl">
		
		<tr>
		<td colspan=2>
		<?php
			$con=mysql_connect("localhost","root","");
			mysql_select_db("college_web_site",$con);
		    $depart_name=$_POST['depart_name'];
			$description=$_POST['description']; 
			$select=mysql_query("select * from departments where depart_name='".$depart_name."'");
			$rows=mysql_num_rows($select);
			if($rows>=1){
				?>
				<script>
				alert("Department Name Already Exist");
				</script>
				<?php
			}else{
				
			if(!empty($depart_name) && !empty($description))
			{
			$insert=mysql_query("insert into departments (depart_name, description) values ('".$depart_name."','".$description."')");
			if($insert){
				?>
				<script>
				alert("Department is added...");
				</script>
				<?php
			}else{
				echo"error";
			}
		}
	}
		?>
		</td>
		</tr>
		<form method="post" action="" onSubmit="return valid()">
		<tr>
		<td>Department Name :<font color=red>*</font></td><td><input type="text" name="depart_name" id="depart_name" class="txt" maxlength="25"></td>
		</tr>
		<tr>
		<td>Description :<font color=red>*</font></td><td><textarea name="description" cols=45 rows=5 id="description" class="txt" placeholder="Enter Description" maxlength="50"></textarea></td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type="submit" value="Add New Department" class="btn" id=""></td>
		</tr>
		</form>
		</table>
	
	</fieldset>
<hr>
	<table width=70% border=1 align=center class="table">
	<tr>
	<th>S.No</th><th>Department Name</th><th>Description</th><th>Actions</th>
	</tr>
	<?php
	$i=1;
	$query=mysql_query("select * from departments");
	while($q_fetch=mysql_fetch_array($query))
	{
	?>
	<tr>
	<td><?php echo $i;?></td><td><?php echo $q_fetch['depart_name'];?></td><td><?php echo $q_fetch['description'];?></td>
	<td><a href="delete_depart.php?depart_id=<?php echo $q_fetch['depart_id'];?>" onClick="return sure()">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
	</table>
</div>