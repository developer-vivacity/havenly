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
   
	<li><a href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">VIEW DESIGN & SHOP</a></li>
 
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
          <li><a href="<?php echo base_url().'index.php/Users/site/logout/';?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- nav-mobile -->
</div><!-- top nav -->	 
<div class = "white">
<div class = "container">

<br/>
<br/>
<br/>
<br/>
<input type = "hidden" value = <?php echo $designid; ?> id = "designidhold" name = "designidhold"/>
<input type = "hidden" value = <?php echo base_url(); ?> id = "siteurl" name = "siteurl"/>


<?php if(sizeof($productincart)==0):
echo '<div class = "emptycart">';
echo '<p class="sanslight midlarge"><BR><BR>You haven\'t added products in your cart yet<p>';
echo '<p class = "sanslight midsmall">Please add products to your cart from your shopping cart page, or ask your designer for more help.</p>';
echo '</div>';
endif;
?>

<BR>

<div id= "overlaymsg">
<div class = "checkoutmsg white" id = "checkoutmsg"><BR><BR>
<p class = "medium sanslight">Thanks for your order!</p>
<p class = "small sanslight">Your account representative will confirm that all of these items are in stock, and bill you for your final price (including shipping and tax).
</p></div></div>
<BR><BR>


<a class = "gray_text small border padding sanslight" href = "<?php echo base_url('index.php/Cart/site/products_associate_design/'.$designid); ?>">&larr; Continue Shopping</a>
<hr>
<?php
if(sizeof($productincart)!=0):
?>

<?php 
$totalcartprice=0;
$shippingtotal=0;
$totalitemprice=0;
foreach($productincart as $key)
{

	$subtotal=($key->qty)*($key->price);
	$shipping = ($key->qty*$key->ship_cost)+$key->shipping_flat+($key->price*$key->qty*$key->shipping_percent);
	$totalinclshipping=($key->qty)*($key->price+$key->ship_cost+$key->shipping_flat+($key->price*$key->shipping_percent));
	$itemcost=$key->qty*$key->price;
	
	echo '<div class = "productcheckouthold">';
    echo '<div class = "row"><div class = "span2 prodimg"><img src = "'.$key->filename.'" height="100px"></div><div class = "span2 checkoutname">'.$key->product_name.'<br>';
	if ($key->time_to_ship<>""&&$key->time_to_ship<>NULL){
		echo '<BR><div class = "sanslight shiptime">This product ships in '.$key->time_to_ship.'</div>';
	}
	echo '</div><div class = "span1 checkoutqty">'.$key->qty.'</div><div class = "span2 checkoutprice">Item Price: $'.$key->price;
	
	if ($key->ship_cost!=""&$key->ship_cost!=NULL&$key->ship_cost!=0)
	{echo '<BR><div class = "shipcost">($'.$key->ship_cost.' white glove delivery surcharge)</div>';}
	echo '</div><div class = "span2 subtotal"><b>Total: $'.$subtotal.'</b></div></div></div><BR>';

	$totalcartprice = $totalcartprice+$totalinclshipping;
	$shippingtotal = $shippingtotal+$shipping;
	$totalitemprice = $totalitemprice+$itemcost;
	}
endif;
?>




<div id = "carttotalestimate">
<?php 
echo '<div class = "itemprice sanslight">Cost of Items:&nbsp;&nbsp;$'.$totalitemprice.'</div><br>';
echo '<div class = "itemprice sanslight">Shipping Cost:&nbsp;&nbsp;$'.$shippingtotal.'</div><br><hr>';
echo '<div class = "itemprice sanslight midsmall"><b>Subtotal:&nbsp;&nbsp;$'.$totalcartprice.'</b></div><br>'; ?>
<div class = "smallnote">Please note that this price does NOT include sales taxes, and shipping costs are estimates.  Any difference in your final price will be reimbursed to your card.</div>

</div>
<div id = "checkoutbutton"><BR><BR>
<div class = "padding border lightgray"><a href = "#checkoutmsg" class = "medium gray_text">
CHECKOUT NOW<a></div>


<BR><BR><BR>
<div style="clear:both;"><BR><BR>
</div>
</div></div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
