<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/cart_design.js"></script>
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
              <li><a id = "servlink" href="<?php echo base_url('#services');?>">Services</a></li>
              <li><a id = "pricelink" href="<?php echo base_url('#price');?>">Cost</a></li>
			      <li><a id = "goodslink" href="<?php echo base_url('#goods');?>">Goods</a></li>
              <li><a id = "aboutlink" href="<?php echo base_url('index.php/Users/site/whoweare');?>">About</a></li>
              <li><a <a id = "contlink"href="<?php echo base_url('#contact');?>">Contact</a></li>
            </ul>
			<ul class = "nav pull-right white_text">
			<li><a class = "white_text sanslight" href = "<?php echo base_url().'index.php/Users/site/logout/';?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
</div>
<br/>
<br/>
<br/>
<br/>
<div><div style="width:100px;margin-left:700px;"><a href="<?php echo base_url().'index.php/Cart/site/products_associate_design/'.$designid.'';?>">Back</a></div>
<?php if(sizeof($productincart)==0):
echo '<div style="margin-left:400px;">';
echo "NO PRODUCT IN CART";
echo '</div>';
endif;
?>
</div>
<?php
if(sizeof($productincart)!=0):
?>
<table width="600px" style="vertical-align:center;text-align:center;margin-left:50px;" border="1">
<tr><td><h5>Design Name</h5></td><td><h5>Product Name</h5></td><td><h5>Qty</h5></td><td><h5>Price</h5></td><td><h5>Rent Price</h5></td><td><h5>Ship Cost</h5></td></tr>
<?php
foreach($productincart as $key)
{
	
    echo '<tr><td>'.$key->design_name.'</td><td>'.$key->product_name.'</td><td>'.$key->qty.'</td><td>'.$key->price.'</td><td>'.$key->rent_price.'</td><td>'.$key->ship_cost.'</td></tr>';
	
}
endif;
?>
</table>
<br/>
<br/>
<br/>
<br/>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
