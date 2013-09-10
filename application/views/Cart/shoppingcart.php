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

<div class = "white">
<div class = "container">
<br/>
<br/>
<br/>
<br/>
<form method ="post" action="<?php echo base_url('index.php/Cart/site/products_associate_design/'.$designid.'');?>" id="shoppingcartform">


<div id = "cartcircle" class="blue circle1 white_text small sanslight text-center midsmall">
<div id="total_items_in_cart"><?php echo $totalitemincart;?> items
</div></div>

<div style = "position: relative;">
	<a href="<?php echo base_url()?>/index.php/Cart/site/products_in_cart/<?php echo $designid?>">
	<img class = "border img-circle" src="<?php echo base_url()?>/assets/Images/cart.png" width="50px" height="50px"/></a></div>
	<div style = "position:absolute;"><?php echo $totalitemincart;?></div>
	</div>
	


<table border="0">
	<tr><td colspan="2">
		<div style="float:right;">Total products in cart.<div id="total_items_in_cart"><?php echo $totalitemincart;?></div>
	<a href="<?php echo base_url()?>/index.php/Cart/site/products_in_cart/<?php echo $designid?>" id="cart_details"><img src="<?php echo base_url()?>/assets/Images/cart.png" width="50px" height="50px"/></a></div></td></tr>
	<tr><td colspan="2"><?php echo '<div style="float:right;"><a href="'.base_url().'/index.php/Users/site/login?a=designs">Back</a></div>';
?></td></tr>
<tr><td>
<table>
<tr><td>

<?php
 echo '
     <div style="background-color:#D18630;color:white;border:solid 1px;cursor:pointer;" id="addallproduct">&nbsp;&nbsp;Add All to cart</div></div>
    <div><img src="'.$designimage[0]->filename.'" height="300px" width="400px"/>
    </div>';
?>

</td></tr>
<tr><td>
<?php if(sizeof($design_color)>0):?>
<div>Paint Color:</div>
<div style="650px">
<?php
 foreach($design_color as $keycolor)
 {
  
  echo '<div style="background-color:'.$keycolor->color.'height:100px;width:100px;float:left;">&nbsp;</div>';

 }
?>
</div>
<?php
  endif;
?>
</td></tr>

</table>
</td><td style="vertical-align:top;">
<table>
<tr><td ><div style="450px">
<?php

foreach($productname as $key=>$value)
{
echo'<div style="width:150px;float:left;" >
 <div class="productimg">
 <img src="'.$value->link.'" height="100px" width="100px" id="designproduct_'.$value->product_id.'" class="designproduct" /><input type="hidden" name="holdproductidfordesign[]" value="'.$value->product_id.'"/>';
 
 if(in_array($value->product_id,explode(',',$shoppingproduct[0]->product_id)))
 echo '<input type="checkbox" onclick="removecheckbox(\'designproductcheck'.$value->product_id.'\','.$value->product_id.')" id="designproductcheck'.$value->product_id.'" name="designproductcheck[]" value="'.$value->product_id.'" checked/>';
 echo '</div>
 <div>
 <div>
'.$value->product_name.'
 </div>
 <div>
'.$value->price.'
 </div>
 <div>
'.$value->ship_cost.'
 </div>
 </div></div>';
}
echo '<input type="hidden" value="'.base_url().'" id="basepath" name="basepath"/>';

echo '<input type="hidden" id="holdroomid" name="holdroomid" value="'.$room_type[0]->id.'"/>';

echo '<input type="hidden" id="holddesignid" name="holddesignid" value="'.$designid.'"/>';
?>
</div></td></tr>
</table>

</td></tr>


</table>
</form>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

