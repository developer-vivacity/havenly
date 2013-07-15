<?php 
	include(APPPATH.'/views/templates/header.php');
?>


 <div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
        <div class="container"> 
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		<a class="brand" href="#">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url('/index.php/Admin/site/currentroomwithuser/'.$roomid);?>">Back</a></li>
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator')?>">Rooms</a></li>
              <li><a>Designs</a></li>
			               </ul>
			<ul class = "nav pull-right black_text">
			
			<li><a class = "black_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>

<div class = "white">
<div class = "container">
<BR><BR><BR><BR><BR>
	  
<table>

<tr><td class = "midlarge"><?php echo $designname;?></td><td>

	&nbsp;&nbsp;<a class = "btn" href = <?php echo base_url('index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid);?>>Edit Design</a>
	</td></tr>
	
	<tr><td>&nbsp;</td></tr>
<tr>
	
<td>
	<?php
if(sizeof($designimage)==0)
echo "No Image";
foreach($designimage as $key)
{
	
echo '<div style="float:left;width:110px;"><a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'"><img src="'.$key->filename.'" width="100%"/></a></div>';
	
	
}


?>
	

</td>
</tr>
<tr>
<td>&nbsp;</td></tr>



<tr>
<td>

<?php

	if(sizeof($productassign)==0)
	echo "No Products Uploaded";
        foreach($productassign as $key)
	{
	echo '<div style="float:left;width:110px;"><a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'"><img src="'.$key->link.'" height="100px" width="100px"/><br><span>&nbsp;'.wordwrap($key->product_name,15,"<br />\n").'</span></a></div>';
			
	}
	?>

</td>

</tr>


</table>
