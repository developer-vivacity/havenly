<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/cart_design.js"></script>
 <div class="account-nav">
    <div class="account-nav-logo"><a href="<?php echo base_url();?>"><img src = "<?php echo base_url('assets/Images/Blue_dalle.png');?>" height = "100"></a></div>
    <div class="account-nav-left">
	
	<ul id="bstabs">
		<li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=status"  rel="status">Current Status</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">Your Account</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">Your Preferences</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=rooms"  rel="rooms">Your Rooms</a></li>
	  	  <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designs" rel="designs">YOUR DESIGNS</a></li>
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
		<li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=status"  rel="status">Current Status</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">Your Account</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">Your Preferences</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=rooms"  rel="rooms">Your Rooms</a></li>
		   <li><a href="<?php echo base_url();?>/index.php/Concept/site/initial_concepts_for_user/"   rel="Concepts">Initial Concepts</a></li>
		 <?php if(sizeof($designforloginuser)>0)
		{
		echo '<li><a href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">YOUR DESIGNS</a></li>';
		}
		?>
          <li><a href="<?php echo base_url().'index.php/Users/site/logout/';?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- nav-mobile -->
</div><!-- top nav -->	 
<br/>
<br/>
<br/>
<br/>
<div class = "container">
<form method="post"  action="<?php echo base_url('index.php/Cart/site/update_or_insert_qty');?>" id="productdetails">
<BR><BR><BR>

<div class = "span5">

	<img src="<?php echo$productdetails[0]->link;?>" width="90%">

</div>
<div class = "span4">
<p class = "sanslight productname">
<?php echo $productdetails[0]->product_name;?></p>
<p class = "sanslight description">
<?php echo $productdetails[0]->description;?>
</p>

<p class = "sanslight productprice">
$<?php echo $productdetails[0]->price;?><BR>
<span class = "sanslight shippingprice">
($<?php echo $productdetails[0]->ship_cost;?> shipping)
</p>

<?php
     $quantity=((sizeof($qty)==0)?"":(($qty[0]->qty==0)?"":$qty[0]->qty));
    echo '<div><input type="text" class = "sanslight" style="width:20px;height:20px;" 
	id="totalvalueadd" name="totalvalueadd" value="'.$quantity.'"/>
	<input type="button"  class = "button2 small pink white_text sanslight" 
	value="Add to Cart" onclick="submitcartvalue();"/></div>';
?>

<div class = "productdetails border sanslight ">
<p class = "small sanslight">
<b>Product Details</b></p>
<div class = "small">
Approximate Dimensions:  <?php echo $productdetails[0]->dimensions; ?>
<br><BR>
This product will take approximately <?php echo $productdetails[0]->ship_cost; ?> to ship.
</div>
</div>
</div>
</div>
<?php
echo '<input type="hidden" name="holdproductid" id="holdproductid" value="'.$productid.'"/>';
echo '<input type="hidden" name="holddesignid" id="holddesignid" value="'.$designid.'"/>';

?>
<BR><BR><BR>
<div style="clear: both;">
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
