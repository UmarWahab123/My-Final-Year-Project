<div id="hostel">
<h1>Admission Rules</h1>
<?php
include("connection.php");
$program=mysql_query("select * from programs");
while($p=mysql_fetch_array($program)){
?>
<p class="line"><?php echo $p['program_name'];?></p>
<ol type='1' style="line-height:40px; font-family:sans serif, arial;">
<?php
$rules=mysql_query("SELECT * FROM `admission_rules` where program_id='".$p['program_id']."'");
while($ru=mysql_fetch_array($rules)){
?>
<li><?php echo $ru['Adm_rule'];?></li>
<?php
}
?>
</ol> 
<?php
}
?>
</div>