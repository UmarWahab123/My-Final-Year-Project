<div id="hostel">
<h1 > downloads</h1>
<br><br><br>
<table border=1 align=center width=50% cellpadding=10px class="tbl">
<tr>

<th>File Name</th><th>File Link</th>
</tr>
<?php 
include("connection.php");
$d=mysql_query("select * from download_files");

while($df=mysql_fetch_array($d)){
?>
<tr>
<td><?php echo $df['name'];?></td><td><a href="admin/<?php echo $df['file_path'];?>" style="color:blue;">Click here to download</a></td>
</tr>
<?php
}
?>
</table>


</div>