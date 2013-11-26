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
<?php echo form_open('Admin/site/vendorUpdate'); ?>
<div id="vendorBody" style="width:98%; margin:auto; padding-top:35px;">
<table width="100%" align="center" height="" border="1" style="margin-bottom:25px;" cellspacing="3">
<tr>
<td valign="top" align="left" colspan="11"><h2>Vendors Product Lists</h2></td>
</tr>

<tr>
<td valign="top" align="center"><strong>User Id</strong></td>
<td valign="top" align="center"><strong>Product Name</strong></td>
<?php /*?><td valign="top" align="center"><strong>Product Color Code</strong></td>
<td valign="top" align="center"><strong>Product Material Code</strong></td><?php */?>
<td valign="top" align="center"><strong>Cost</strong></td>
<td valign="top" align="center"><strong>Ship Cost</strong></td>
<?php /*?><td valign="top" align="center"><strong>Quantity</strong></td><?php */?>
<td valign="top" align="center"><strong>Username</strong></td>
<td valign="top" align="center"><strong>E-mail</strong></td>
<td valign="top" align="center"><strong>User Address</strong></td>
<td valign="top" align="center"><strong>Zipcode</strong></td>
<td valign="top" align="center"><strong>Phone No.</strong></td>
<td valign="top" align="center"><strong>Status</strong></td>
<td valign="top" align="center"><strong>Confirm</strong></td>
</tr>

<?php
$i=0;
foreach($vendorOrders as $vendorOrdersdata){ ?>

<tr>
<td valign="top" align="center"><?=$vendorOrdersdata->user_id;?></td>
<td valign="top" align="center"><?=$vendorOrdersdata->product_name;?></td>
<?php /*?><td valign="top" align="center"><?=$vendorOrdersdata->product_color_id;?></td>
<td valign="top" align="center"><?=$vendorOrdersdata->product_material_id;?></td><?php */?>
<td valign="top" align="center"><?=$vendorOrdersdata->price;?></td>
<td valign="top" align="center"><?=$vendorOrdersdata->ship_cost;?></td>
<?php /*?><td valign="top" align="center"><?=$vendorOrdersdata->qty;?></td><?php */?>
<td valign="top" align="center"><?=$vendorOrdersdata->first_name." ".$vendorOrdersdata->last_name;?></td>
<td valign="top" align="center"><?=$vendorOrdersdata->email;?></td>
<td valign="top" align="center"><?=$vendorOrdersdata->address;?></td>
<td valign="top" align="center"><?=$vendorOrdersdata->zipcode;?></td>
<td valign="top" align="center"><?=$vendorOrdersdata->phone;?></td>
<td valign="top" align="center"><?php $options = array(
				  ''          => 'Select Box',									   
                  'open'      => 'Open',
                  'placed'    => 'Placed',
                  'transit'   => 'In Transit',
                  'delivered' => 'Delivered',
				  'exception' => 'Exception'
                );

$shirts_on_sale = array('select', '');

echo form_dropdown('orders_'.$i, $options, 'small'); ?></td>
<td valign="top" align="center"><?php $data = array(
              'name'        => 'confirmNumber_'.$i,
              'id'          => 'confirmNumber',
              'value'       => '',
            );

echo form_input($data); ?>
<?php $data = array(
              'shopID_'.$i  => $vendorOrdersdata->shopID
            );
echo form_hidden($data); 

$i++;
?>
</td>

</tr>
<?php } ?>



<tr>
<td valign="top" align="right" colspan="11"><?php 
 $data = array(
              'totalShop'  => $i
            );
echo form_hidden($data); 

$data = array(
              'ven_id'  => $ven_id
            );
echo form_hidden($data);
echo form_submit('mysubmit', 'Submit Post!');?></td>
</tr>
</table>
</div>

</div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
