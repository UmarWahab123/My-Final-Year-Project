<?php
include("connection.php");
if($_POST['id']){
	$id=$_POST['id'];
	if($id=="admin"){
		
	}else if($id=="department"){
		$q=mysql_query("select * from departments");
		while($r=mysql_fetch_array($q)){
			
		?>
			<option value="<?php echo $r['depart_id'];?>"><?php echo $r['depart_name'];?></option>
			
			
		
		
		<?php
		}
	}
}

?>