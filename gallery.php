
<div class="wraper">

    <ul class="rslides" id="slider3">
	<?php
	include("connection.php");
	$photos=mysql_query("select * from gallery");
	while($ph=mysql_fetch_array($photos))
	{
	?>
      <li><img src="admin/<?php echo $ph['img_path'];?>" alt="" ></li>
     <?php
	}
	 ?>
    </ul>

    <ul id="slider3-pager">
	<?php
	$photos=mysql_query("select * from gallery");
	while($ph=mysql_fetch_array($photos))
	{
	?>
	  
      <li><a href="#"><img src="admin/<?php echo $ph['img_path'];?>" alt="" height=50 width=30></a></li>
	   
     <?php
	}
	 ?>
      
    
    </ul>
</div>





