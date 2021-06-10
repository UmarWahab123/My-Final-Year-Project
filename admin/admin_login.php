<style>
</style>
<head>
<style>
.btn{
font-size:27px;	
padding:2px 7px 2px 7px;
color:white;	
background:black;
cursor:pointer;
border:1px solid black;
}
#adm_log{
margin:200px auto;

}
#adm_log table{
width:40%;
border-collapse:collapse;
border:1px solid black;
box-shadow:1px 2px 10px gray;
}
#adm_log table th{
padding:15px;
background:red;
border-bottom:3px solid gold;
}

.btn:hover{
color:red;
}
</style>

<script src="js/jquery.min.js"></script>
</head>
<div id="adm_log">
<table align=center border=0 cellpadding=10>
    <tr>
	<th colspan=2><font color="#030bfc" size="5px">Admin & Departments Login</font></th>
	</tr>
	<tr>
	<td colspan=2 align=center>
	
	<?php
	$con=mysql_connect("localhost","root","");
	//$select=
	mysql_select_db("uob",$con);
	//if($select){
	//	echo"connection is successfull";
	//}
	
	if(!empty($_POST['uname']) && !empty($_POST['upass']) && isset($_POST['user']))
	{
		if($_POST['user']=='admin'){
		$check=mysql_query("select * from admin where uname='".$_POST['uname']."' AND upass='".$_POST['upass']."'");
		$fetch=mysql_fetch_array($check);
		$count=mysql_num_rows($check);
		if($count>=1){
			session_start();
			$_SESSION['uname']=$fetch['uname'];
			header("location:index.php");
			
		}else{
			echo"invalid username or password";
		}
		}else if($_POST['user']=='department'){
		$check=mysql_query("select * from staff where email='".$_POST['uname']."' AND password='".$_POST['upass']."' AND depart_id='".$_POST['depart_id']."'");
		$fetch=mysql_fetch_array($check);
		$count=mysql_num_rows($check);
		if($count>0){
			session_start();
			$_SESSION['name']=$fetch['name'];
			$_SESSION['depart_id']=$fetch['depart_id'];
			$_SESSION['staff_id']=$fetch['staff_id'];
			$_SESSION['depart_name']=$fetch['depart_name'];
			header("location:department_login.php");
			
		}else{
			echo "<font color=red> Check your Username and Password </font>";
		}
		}
		
	}else{
		echo"<font color=red size=5px>Please fill all Fields</font>";
	}
	?>
	
	</td>
	</tr>
	<form method="POST" action="">
	<tr>
	<td align=right>Username</td><td ><input type="email" name="uname" maxlength="25"></td>
	</tr>
    <tr>
	<td align=right>Password</td><td> <input type="password" name="upass" maxlength="20"></td>
	</tr>
	<tr>
		<td align=right >User Type</td><td> &nbsp&nbsp <input type="radio" name="user" id="user" value="admin">Admin   <input type="radio" name="user" id="user" value="department"> Department</td>
	<tr id="r">
	<td align=right>Departments</td><td> 
		<select name="depart_id" class="show">
		</select>
		</td>
	</tr>
 
	<tr>
	<td colspan=2 align=center><input type="submit" value="Login" class="btn"></td>
	</tr>
	</form>
</table>
</div>
<script>
$(document).ready(function(){
	$("#r").hide();
	$("input[type=radio]").change(function(){
		var id=$(this).val();
		
		if(id=="admin"){
			$("#r").hide();
		}else{
			$("#r").show();
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		var str='id='+id;
		
		$.ajax({
			type:"POST",
			url:"select_user.php",
			data:str,
			cache:false,
			success:function(html){
				$(".show").html(html);
			}
		});
		
	});
	//second function
		
});


</script>