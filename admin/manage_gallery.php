<style>
.btn{
	background-color:pink;
	color:blue;
	font-weight:bold;
	border:2px solid black;
	padding:5px 5px;
	border-radius:10px;
}
.btn:hover{
	background-color:yellow;
	color:red;
	cursor:hand;
}
</style>
<script>
function valid(){
	var gall=document.getElementById("gall").value;
	if(gall==''){
		alert("Please Select image");
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
	<p class="line">Gallery Management Page</p>
	<fieldset class="fieldset">
	<legend><h3>Add photo to Gallery</h3></legend>
	
		<table align=center width=70% cellpadding="10" class="tbl">
		
		<tr>
		<td colspan=2>
		<?php
		include("connection.php");
		$photo=$_FILES['gall_photo']['name'];
		$temp=$_FILES['gall_photo']['tmp_name'];
		$dir="photos/".$photo;
		if(!empty($photo)){
		$add=mysql_query("insert into gallery (img_path) values ('".$dir."')");
		if($add){
			move_uploaded_file($temp,$dir);
			?>
			<script>
			alert("Photo is Added to gallery");
			</script>
			<?php
		}
		}else{
			echo "Please Select image";
		}
		?>
		</td>
		</tr>
		<form method="post" action="" onSubmit="return valid()" enctype="multipart/form-data">
		<tr>
		<td>Upload photo</td><td><input type="file" name="gall_photo" id="gall"></td>
		</tr>
		
		<tr>
		<td colspan=2 align=center><input type="submit" value="Upload Photo" class="btn"></td>
		</tr>
		</form>
		</table>
	
	</fieldset>
<hr>
	<table width=70% border=1 align=center class="table">
	<tr>
	<th>S.No</th><th>Photo</th><th>Actions</th>
	</tr>
	<?php
	$i=1;
	$photo=mysql_query("select * from gallery");
	while($ph=mysql_fetch_array($photo)){
	?>
	<tr>
	<td><?php echo $i; ?></td><td><img src="./<?php echo $ph['img_path'];?>" height="100" width=80></td>
	<td><a href="delete_gall.php?photo_id=<?php echo $ph['img_id'];?>" onClick="return sure()">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
	</table>
