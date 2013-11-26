<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<br/>
<br/>
<br/>
<br/>
<?php

if($privileges=='global'):?>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
        <div class="container"> 
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		<a class="brand" href="<?php echo base_url();?>">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator')?>">Rooms</a></li>
              <li><a>Designs</a></li>
			   <li><a href="#">Order Tracker</a></li>
              <li><a href="#">Vendor Management</a></li>
              <li><a href="<?php echo base_url('index.php/Admin/site/vendorsView')?>">Vendor View</a></li>
              </ul>
			<ul class = "nav pull-right white_text">
			
			<li><a class = "white_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
   </div>

<?php else:?>


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
              <li class="active"><a href="#">Home</a></li>
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator');?>">Rooms</a></li>
              <li><a>Designs</a></li>
			               </ul>
			<ul class = "nav pull-right white_text">
			
			<li><a class = "white_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>

<?php endif; ?>
<div id="vendorBody" style="width:90%; margin:auto; padding-top:35px;">
<table width="90%" align="center" height="" border="1" style="margin-bottom:25px;">
<tr>
<td valign="top" align="left" colspan="2"><h2>Vendors Lists</h2></td>
</tr>

<tr>
<td valign="top" align="center" width="50%"><strong>Vendors Name</strong></td>
<td valign="top" align="center" width="50%"><strong>View</strong></td>
</tr>

<?php
foreach($vendor as $vendorData){ ?>

<tr>
<td valign="top" align="center" width="50%"><?=$vendorData->vendor_name;?></td>
<td valign="top" align="center" width="50%"><a  style="color:#000;" href="<?php echo base_url('index.php/Admin/site/vendorsOrders?ven_id='.$vendorData->vendor_id)?>">Edit</a></td>
</tr>
<?php } ?>
</table>
</div>

</div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
