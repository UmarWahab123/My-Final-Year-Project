<style>
.dash{
	width:200px;
	height:200px;
	border:3px dotted purple;
	border-radius:100%;
	text-align:center;
    background:black;
	box-sizing:border-box;
	padding:30px;
	box-shadow:1px 2px 10px gray;
	float:left;
	margin:35px;
}
h3,h4{
	padding:10px;
	margin:0px;
	
}
#no{
	font-size:35px;
	color:white;
}
</style>
<?php
include("connection.php");
$ts=mysql_query("select count(*) as count from staff where depart_id='".$_SESSION['depart_id']."'");
$f=mysql_fetch_array($ts);
$tst=mysql_query("select count(*) as count from students where depart_id='".$_SESSION['depart_id']."' && semester_id=1");
$ft=mysql_fetch_array($tst);
$se=mysql_query("select count(*) as secound from students where depart_id='".$_SESSION['depart_id']."' && semester_id=2");
$seco=mysql_fetch_array($se);
$th=mysql_query("select count(*) as third from students where depart_id='".$_SESSION['depart_id']."' && semester_id=3");
$thrd=mysql_fetch_array($th);
$fo=mysql_query("select count(*) as four from students where depart_id='".$_SESSION['depart_id']."' && semester_id=4");
$fou=mysql_fetch_array($fo);
$fi=mysql_query("select count(*) as five from students where depart_id='".$_SESSION['depart_id']."' && semester_id=5");
$fiv=mysql_fetch_array($fi);
$si=mysql_query("select count(*) as sixth from students where depart_id='".$_SESSION['depart_id']."' && semester_id=6");
$six=mysql_fetch_array($si);
$sev=mysql_query("select count(*) as seven from students where depart_id='".$_SESSION['depart_id']."' && semester_id=7");
$seve=mysql_fetch_array($sev);
$eth=mysql_query("select count(*) as eight from students where depart_id='".$_SESSION['depart_id']."' && semester_id=8");
$eig=mysql_fetch_array($eth);
?>
<div id="depart">

<fieldset class="fieldset">
	<legend><h3>Dashboard</h3></legend>
	<div class="dash">
		<h3 style="color:yellow;">Total No of Teachers in <?php echo $_SESSION['depart_name'];?></h3>
		<h4 id="no"><?php echo $f['count']; ?></h4>
    </div>
	<div class="dash">
		<h3 style="color:yellow;">Total No of Students in First Semester</h3>
		<h4 id="no"><?php echo $ft['count']; ?></h4>
    </div>
	<div class="dash">
		<h3 style="color:yellow;">Total No of Students in 2nd Semester</h3>
		<h4 id="no"><?php echo $seco['secound']; ?></h4>
    </div>
	<div class="dash">
		<h3 style="color:yellow;">Total No of Students in 3rd Semester</h3>
		<h4 id="no"><?php echo $thrd['third']; ?></h4>
    </div>
	<div class="dash">
		<h3 style="color:yellow;">Total No of Students in 4rd Semester</h3>
		<h4 id="no"><?php echo $fou['four']; ?></h4>
    </div>
	<div class="dash">
		<h3 style="color:yellow;">Total No of Students in 5rd Semester</h3>
		<h4 id="no"><?php echo $fiv['five']; ?></h4>
    </div>
	<div class="dash">
		<h3 style="color:yellow;">Total No of Students in 6rd Semester</h3>
		<h4 id="no"><?php echo $six['sixth']; ?></h4>
    </div>
	<div class="dash">
		<h3 style="color:yellow;">Total No of Students in 7rd Semester</h3>
		<h4 id="no"><?php echo $seve['seven']; ?></h4>
    </div>
	<div class="dash">
		<h3 style="color:yellow;">Total No of Students in 8rd Semester</h3>
		<h4 id="no"><?php echo $eig['eight']; ?></h4>
    </div>
	
	
</fieldset>



</div>