<?php
include("connection.php");
$delete=mysql_query("delete from admission_rules where adm_rule_id='".$_GET['adm_rule_id']."'");
if($delete){
	header("location:index.php?page=adm_rules");
}else{
	echo "error";
}


?>