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
<table>
	<form method="post"  action="<?php echo base_url('index.php/Cart/site/update_or_insert_qty');?>" id="productdetails">
	<tr><td colspan="2"><?php echo '<div style="float:right;"><a href="#" onclick="history.back();">Back</a></div>';
?></td></tr>
<tr>
<td align="center">
<?php
  
  echo '<div><b>Product Name:</b>'.$productdetails[0]->product_name.'</div>';
  echo '<div><img src="'.$productdetails[0]->link.'" height="300px" width="400px">';
?>
</td>
<td style="vertical-align:top;">
<table><tr><td colspan="3">
<?php
     $quantity=((sizeof($qty)==0)?"":(($qty[0]->qty==0)?"":$qty[0]->qty));
     echo '<div><b>Description:</b>'.$productdetails[0]->description.'</div>';
     echo '<div><b>product price:</b>'.$productdetails[0]->price.'</div>';
     echo '<div id="productamount"><div style="float:left;width:400px;"><b>ship cost:</b> '.$productdetails[0]->ship_cost.'</div><div style="float:left;"><input type="text" style="width:20px;height:20px;" id="totalvalueadd" name="totalvalueadd" value="'.$quantity.'"/></div><div style="float:left;width:20px;height:20px;"><input type="button" value="Add to Cart" onclick="submitcartvalue();"/></div></div>';
?></td></tr>
<tr><td><a href="#">Product Dimension</a></td><td><a href="#">Shipping Info</a></td><td><a href="#">Return Info</a></td></tr>
<tr><td><?php echo $productdetails[0]->dimensions; ?></td><td><?php echo $productdetails[0]->ship_cost; ?></td><td></td></tr>
</table>	
</td>

</tr>
<?php
echo '<input type="hidden" name="holdproductid" id="holdproductid" value="'.$productid.'"/>';
?>
</form>
</table>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
