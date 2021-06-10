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
	background-color:yellow;
	color:red;
	cursor:hand;
}
#name{
	outline:none;
	border:1px solid brown;
}
</style>
<?php
session_start();
if($_SESSION['uname']==''){
	header("location:admin_login.php");
}
?>


<script>
function valid(){
	var gall=document.getElementById("gall").value;
	var name=document.getElementById("name").value;
	if(gall==''){
		alert("Please Select image");
		return false;
	}else if(name==''){
		alert("please Enter File Name");
		return false;
	}
}
function sure(){
	if(confirm("Are sure to delete this record")){
		return true;
	}else{
		return false;
	}
}

</script>
	<p class="line">Files Management Page</p>
	<fieldset class="fieldset">
	<legend><h3>Add File to Downloads</h3></legend>
	
		<table align=center width=70% cellpadding="10" class="tbl">
		
		<tr>
		<td colspan=2>
		<?php
		include("connection.php");
		$name=$_POST['name'];
		$file=$_FILES['files']['name'];
		$temp=$_FILES['files']['tmp_name'];
		$dir="Downloads/".$file;
		if(!empty($file) && !empty($name)){
		$add=mysql_query("insert into download_files (name, file_path) values ('".$name."','".$dir."')");
		if($add){
			move_uploaded_file($temp,$dir);
			?>
			<script>
			alert("file is uploaded to downloads");
			</script>
			<?php
		}
		}else{
			echo "<font color=red><u>Please Select file</u></font>";
		}
		?>
		</td>
		</tr>
		<form method="post" action="" onSubmit="return valid()" enctype="multipart/form-data">
		<tr>
		<td>Name</td><td><input type="text" name="name" id="name" Maxlength="20"></td>
		</tr>
		<tr>
		<td>Upload File</td><td><input type="file" name="files" id="gall"></td>
		</tr>
		
		<tr>
		<td colspan=2 align=center><input type="submit" value="Upload Files" class="btn"></td>
		</tr>
		</form>
		</table>
	
	</fieldset>
<hr>
	<table width=70% border=1 align=center class="table">
	<tr>
	<th>S.No</th><th>Name</th><th>File Path</th><th>Actions</th>
	</tr>
	<?php
	$i=1;
	$file=mysql_query("select * from download_files");
	while($f=mysql_fetch_array($file)){
	?>
	<tr>
	<td><?php echo $i; ?></td><td><?php echo $f['name']; ?></td><td><a href="<?php echo $f['file_path']; ?>">Click here to view</a></td>
	<td><a href="delete_file.php?file_id=<?php echo $f['file_id'];?>" onClick="return sure()">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
	</table>
