	
	
	    <?php
	    include("connection.php");
		if($_POST['id']=="fall"){
			 $qual=mysql_query("select * from semester where mod(semester_id,2)=0");
		while($qual_fetch=mysql_fetch_array($qual)){	
		?>
		<option value="<?php echo $qual_fetch['semester_id'];?>"><?php echo $qual_fetch['semester_name'];?></option>
		<?PHP
		
		}
		}else if($_POST['id']=="spring"){
			
	    $qual=mysql_query("select * from semester where mod(semester_id,2)=1");
		while($qual_fetch=mysql_fetch_array($qual)){	
		?>
		<option value="<?php echo $qual_fetch['semester_id'];?>"><?php echo $qual_fetch['semester_name'];?></option>
		<?PHP
		
		}
		}
		?>