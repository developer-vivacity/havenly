<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/cart_design.js"></script>
 <div class="account-nav">
    <div class="account-nav-logo"><a href="<?php echo base_url();?>"><img src = "<?php echo base_url('assets/Images/Blue_dalle.png');?>" height = "100"></a></div>
    <div class="account-nav-left">
	
	<ul id="bstabs">
		<li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=status"  rel="status">STATUS</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">YOUR ACCOUNT</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">YOUR PREFERENCES</a></li>
		    <li><a href="#">YOUR INITIAL CONCEPT BOARDS</a></li>
   	       <li><a href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">VIEW DESIGN & SHOP</a></li>';
          
	
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
   
	  <li><a href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">VIEW DESIGN & SHOP</a></li>
      
	
    </ul>
      </li>
    </ul>
  </div><!-- nav-mobile -->
</div><!-- top nav -->	 
<br/>
<br/>
<br/>
<br/>
<div class = "canvas">
<div class = "container">
<form method="post"  action="<?php echo base_url('index.php/Cart/site/update_or_insert_qty');?>" id="productdetails">
<BR><BR><BR>

<div class = "span5">
<a class = "black_text condensed small" href = "<?php echo base_url('index.php/Cart/site/products_associate_design/'.$designid);?>">&larr;&nbsp;Back to Products</a>
<br><br>
<img src="<?php echo$productdetails[0]->weblink;?>" width="90%">

</div>
<div class = "span4">
<p class = "sanslight productname">
<?php echo $productdetails[0]->product_name;?></p>
<p class = "sanslight description">
<?php echo $productdetails[0]->description;?>
<?php echo $productdetails[0]->color_name;?><BR>
<?php echo $productdetails[0]->material_name;?>
</p>

<p class = "sanslight productprice">
$<?php echo $productdetails[0]->price;?><BR>
<span class = "sanslight shippingprice">
($<?php echo $productdetails[0]->ship_cost;?> additional shipping surcharge)
</p>

<?php
     $quantity=((sizeof($qty)==0)?"":(($qty[0]->qty==0)?"":$qty[0]->qty));
    echo '<div id = "productamount"><input type="text" class = "sanslight" style="width:20px;height:20px;" 
	id="totalvalueadd" name="totalvalueadd" value="'.$quantity.'"/>
	<input type="button"  class = "button2 small pink white_text sanslight" 
	value="Add to Cart" onclick="submitcartvalue();"/></div>';
?>

<div class = "productdetails border sanslight ">
<p class = "midsmall gray_text condensed">
P R O D U C T &nbsp; D E T A I L S</p>
<hr class = "style"
<div class = "small">
Approximate Dimensions:  <?php echo $productdetails[0]->dimensions; ?>
<br><BR>
This product will take approximately <?php echo $productdetails[0]->time_to_ship; ?> to ship.
</div>
</div><BR><BR>
</div>
<?php
echo '<input type="hidden" name="holdproductid" id="holdproductid" value="'.$productid.'"/>';
echo '<input type="hidden" name="holddesignid" id="holddesignid" value="'.$designid.'"/>';

?>
<BR><BR><BR>
<div style="clear: both;">
<?php 
	include(APPPATH.'/views/templates/footer.php');
?></div>
