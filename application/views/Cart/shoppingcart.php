<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/cart_design.js"></script>
<div class="account-nav">
    <div class="account-nav-logo"><a href="<?php echo base_url();?>"><img src = "<?php echo base_url('assets/Images/Blue_dalle.png');?>" height = "100"></a></div>
    <div class="account-nav-left">
	
	<ul id="bstabs">
	<li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=status"  rel="status">STATUS</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">YOUR ACCOUNT</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">YOUR PREFERENCES</a></li>
		    <li><a href="#">YOUR INITIAL CONCEPT BOARDS</a></li>
   
	  <?php if(sizeof($designforloginuser)>0)
	  {
               echo '<li><a href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">VIEW DESIGN & SHOP</a></li>';
           }
	  ?>
	
    </ul>
    </ul>
  </div><!-- nav left -->
  <div class="account-nav-right">
    <ul>
      <li><a href ="<?php echo base_url().'index.php/Users/site/logout/'; ?>">Logout</a></li>
    </ul>
  </div><!-- nav right -->
  <div class="nav-mobile">
    <ul id="list-pages-accordion">
      <li>
        <a href=""><img src=<?php echo base_url('theme/img/menu.png'); ?>></a>
        <ul id="bstabs" class="dropdownList">
	<li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=status"  rel="status">STATUS</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">YOUR ACCOUNT</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">YOUR PREFERENCES</a></li>
		    <li><a href="#">YOUR INITIAL CONCEPT BOARDS</a></li>
   
	  <?php if(sizeof($designforloginuser)>0)
	  {
               echo '<li><a href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">VIEW DESIGN & SHOP</a></li>';
           }
	  ?>
	
    </ul>
          <li><a href="<?php echo base_url().'index.php/Users/site/logout/';?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- nav-mobile -->
</div><!-- top nav -->	 

<div class = "white">


<form method ="post" action="<?php echo base_url('index.php/Cart/site/products_associate_design/'.$designid.'');?>" id="shoppingcartform">

<div id = "cartcircle" class="circle1 white_text small sanslight text-center midsmall">
<img class = "border img-circle" src="<?php echo base_url()?>/assets/Images/cart.png" width="50px" height="50px"/>
<div class = "black_text" id="total_items_in_cart"><?php echo $totalitemincart;?>
</div></div>

<div class = "span4 well">

<div class = "button3 pink white_text" id="addallproduct">BUY THE WHOLE ROOM</div><BR>
<?php 
foreach($designimage as $key)
{
    echo'<div class = "design_image"><img src="'.$key->filename.'" width="100%"/></div><BR><BR>';
}
?>
<?php if(sizeof($design_color)>0):?>
<div class = "paint">
<p class = "sanslight text-center">
Paint Color Suggestions:</p>
<div class = "text-center">
<?php
 foreach($design_color as $keycolor)
 {
   echo '<div style="background-color:'.$keycolor->color.'height:30px;width:100px;display:inline-block;">&nbsp;</div>';
 }
?>
</div></div>
<?php
  endif;
?>
</div>
<div class = "span8 offset1">
<?php
foreach($productname as $key=>$value)
{
        echo
        '<div class = "producthold" >
        <div class="productimg">
       <img src="'.$value->weblink.'" height = 150px; id="designproduct_'.$value->product_id.'" class="designproduct" />';
       if(in_array($value->product_id,explode(',',$shoppingproduct[0]->product_id)))
       echo'<div class = "checkimg gray_text serif small"><img src = "'.base_url('assets/Images/Tick-icon.png').'" height = "150px"></div>';
       else
       echo'<div class = "checkimg gray_text serif small"><img src = "'.base_url('assets/Images/Tick-icon.png').'" height = "150px"></div>';
       echo'<input type="hidden" name="holdproductidfordesign[]" value="'.$value->product_id.'"/>';
    /*if(in_array($value->product_id,explode(',',$shoppingproduct[0]->product_id)))
       echo '<input type="checkbox" class = "productcheck" id="designproductcheck'.$value->product_id.'" name="designproductcheck[]" value="'.$value->product_id.'" checked="checked"/>';
       else
       echo '<input type="checkbox" class = "productcheck" id="designproductcheck'.$value->product_id.'" name="designproductcheck[]" value="'.$value->product_id.'"/>';
    */
    if(in_array($value->product_id,explode(',',$shoppingproduct[0]->product_id)))
    echo '<input type="checkbox" class = "productcheck" id="designproductcheck'.$value->product_id.'" name="id[]" value="'.$value->variant_id.'" checked="checked"/>';
    else
    echo '<input type="checkbox" class = "productcheck" id="designproductcheck'.$value->product_id.'" name="id[]" value="'.$value->variant_id.'"/>';
    echo '</div>
 <div class = "productdetails sanslight">
 <div class = "productname medium">
'.$value->product_name.'
 </div>
 <div class = "productprice">
$'.$value->price.'
 </div>
 <div class = "shippingprice">
($'.$value->ship_cost.' shipping)
 </div>
 </div></div>';
}
echo '<input type="hidden" value="'.base_url().'" id="basepath" name="basepath"/>';

echo '<input type="hidden" id="holdroomid" name="holdroomid" value="'.$room_type[0]->id.'"/>';

echo '<input type="hidden" id="holddesignid" name="holddesignid" value="'.$designid.'"/>';
?>
 <div>
 <input type="button" value="Add to cart" onclick="add_to_cart();"/>
</div>
</div>

</form>
<div style = "clear:both;"></div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

