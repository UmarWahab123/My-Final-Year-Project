<script>
function sure(){
	if(confirm("Are you realy want to delete this record..")){
		return true
	}else{
		return false;
	}
}

</script>

<p class="line">Manage News</p><br><br>
<a href="index.php?page=add_news" style=" border:2px solid blue; padding:10px; margin-left:100px; font-size:18px; color:blue;"><img src="images/th.jpg"  height=30 width=40 align=top>Add news</a>
<br><br><br>
<hr>
<br><br>
<table width=95%  align=center class="table" border=1 cellpadding=5>
<tr>
<th>News_id</th><th>News Title</th><th>Heading</th><th>News Date</th><th>Delete</th><th colspan=2>Detail</th>
</tr>
<?php
include("connection.php");
$sel=mysql_query("select * from News");
$i=0;
while($row=mysql_fetch_array($sel)){
	$i++;

?>

<tbody>
<tr>
<td><?php echo $row['news_id']; ?></td><td><?php echo $row['title']; ?></td><td><?php echo $row['heading']?></td><td><?php echo $row['date']; ?></td>
<td><a href="delete_news.php?news_id=<?php echo $row['news_id'];?>" onClick="return sure()">Delete</a></td>
<td><a href="news_detail.php?news_id=<?php echo $row['news_id'];?>">Details</a></td>
</tr>
<?php
}
?>
</tbody>
</table>

