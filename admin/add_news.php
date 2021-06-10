<style>
.btn{
	background-color:blue;
	color:white;
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
#date{
	 outline:none;
	 background-color:forestgreen;
	 color:white;
	 font-family:Lucida Fax;
	 font-weight:bold;
}
#t{
	outline:none;
	border:1px dashed blue;
	padding:5px 5px;
}
</style>

<?php
session_start();
if($_SESSION['uname']==''){
	header("location:admin_login.php");
}
if($_REQUEST['flage']=='news_added'){
	?>
	<script>alert("News is Added Successfully..");</script>
	<?php
}

?>
<script>
function validate_news(){
	var title=document.forms["news"]["news_title"].value;
	var head=document.forms["news"]["heading"].value;
	var desc=document.forms["news"]["news_desc"].value;
	var url=document.forms["news"]["url"].value;
	if(title=="" || title==null || desc=="" || desc==null || head=="" || head==null || url=="" || url==null){
		alert("All fields Must be filled");
		return false;
	}
	else{
		return true;
	}
}

</script>

<p class="line">Add News</p>
<form method="POST" action="add_news_query.php" name="news" onSubmit="return validate_news()" enctype="multipart/form-data">

<fieldset class="fieldset">
<legend><h2 align=center >Add News</h2></legend>
<table align="center" border=0 cellpadding=10>

<tr>
<td align="right" ><div id="lab">Title :</div></td><td ><input type="text" name="news_title" maxlength="20" id="t"></td>

</tr>
<tr>
<td align="right" ><div id="lab">Heading :</div></td><td ><input type="text" name="heading" maxlength="20" id="t"></td>

</tr>
<tr>
<td align="right" ><div id="lab">Link URL :</div></td><td ><input type="text" value="http://" name="url" maxlength="40" id="t"></td>

</tr>
<tr>
<td align="right"><div id="lab">Description :</div></td><td ><textarea name="news_desc" cols="70" rows="10"  maxlength="50" id="t"></textarea></td>
</tr>
<tr>
<td align="right"><div id="lab">Date :</div></td><td><input type="text" value="<?php echo date("d-M-Y"); ?>" name="news_date" readonly id="date"></td>
</tr>
<tr>
<td colspan=2 align=center><input type="submit" value="Add News" name="add_News" class="btn"></td>
</tr>
</table>
