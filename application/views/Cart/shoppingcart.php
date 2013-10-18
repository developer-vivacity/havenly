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

<div class = "overlay">
<div class = "renderfull white"></div></div>

<form method ="post" action="<?php echo base_url('index.php/Cart/site/products_associate_design/'.$designid.'');?>" id="shoppingcartform">

<div id = "cartcircle" class="circle1 white_text small sanslight text-center midsmall"><a class = "black_text" href="<?php echo base_url('index.php/Cart/site/products_in_cart/'.$designid);?>">
<img class = "border img-circle" src="<?php echo base_url()?>/assets/Images/cart.png" width="50px" height="50px" /></a>
<div class = "black_text" id="total_items_in_cart"><?php echo $totalitemincart;?>
</div></div>

<div class = "span4 well canvas designrender">

<div class = "button3 pink white_text" id="addallproduct">BUY THE WHOLE ROOM</div><BR>
<?php 
foreach($designimage as $key)
{
    echo'<div class = "design_image"><img src="'.$key->filename.'" width="100%"/></div><BR><BR>';
}
?>
<?php if(sizeof($design_color)>0):?>

<?php
  endif;
  
 
?>
</div>
<div class = "span8 offset1">
<div class = "text-center horizontal">
<p class = "condensed medium ">S&nbsp; H &nbsp;O &nbsp;P &nbsp;&nbsp; Y&nbsp; O&nbsp; U&nbsp; R &nbsp;&nbsp; R&nbsp; O&nbsp; O&nbsp; M</p>
<hr class = "style">
</div>


<?php
foreach($productname as $key=>$value)
{
        echo 
        '<div class = "producthold" >
        <div class="productimg">
       <img src="'.$value->filename.'" height = 200px; id="'.$value->product_id.'" class="designproduct" />';
	
       if(in_array($value->product_id,explode(',',$shoppingproduct[0]->product_id)))
       {
	   	echo '<div class = "clicktoadd white_text condensed small" id = "clicktoadd'.$value->product_id.'"><p>C L I C K &nbsp; T O &nbsp R E M O V E<p></div>';
		echo '<div class = "checkimg gray_text serif small"  style = "opacity:0.8"><img src = "'.base_url('assets/Images/Tick-icon.png').'" height = "200px"></div>';
       }
	   else
       {
	   	echo '<div class = "clicktoadd white_text condensed small" id = "clicktoadd'.$value->product_id.'"><p>C L I C K &nbsp; T O &nbsp A D D<p></div>';
		echo '<div class = "checkimg gray_text serif small" style = "opacity:0;"><img src = "'.base_url('assets/Images/Tick-icon.png').'" height = "200px"></div>';
       }
	   
	   echo'<input type="hidden" name="holdproductidfordesign[]" value="'.$value->product_id.'"/>';
  
    if(in_array($value->product_id,explode(',',$shoppingproduct[0]->product_id)))
    {
		echo '<input type="checkbox" class = "productcheck" id="designproductcheck'.$value->product_id.'" name="id[]" value="'.$value->product_id.'" checked="checked"/>';
    }
	else{
		echo '<input type="checkbox" class = "productcheck" id="designproductcheck'.$value->product_id.'" name="id[]" value="'.$value->product_id.'"/>';
    }  
   echo '</div>
 <div class = "productdetails sanslight">
 <div class = "productname small"><a class = "black_text productname" href = "'.base_url().'/index.php/Cart/site/product_details_of_design/'.$value->product_id.'/'.$designid.'">
'.$value->product_name.'</a>
 </div>
 <div class = "productprice">
$'.$value->price.'
 </div>

 </div></div>';
}
echo '<input type="hidden" value="'.base_url().'" id="basepath" name="basepath"/>';

echo '<input type="hidden" id="holdroomid" name="holdroomid" value="'.$room_type[0]->id.'"/>';

echo '<input type="hidden" id="holddesignid" name="holddesignid" value="'.$designid.'"/>';
?>
 <div>
 <!--<input type="button" value="Add to cart" onclick="add_to_cart();"/>-->
 <div class = "paint">
<hr class= "style">
<p class = "condensed text-center">
P A I N T &nbsp; C O L O R S</p>
<p class = "condensed small text-center">Pick these up at your nearest paint retailer.</p>
<div class = "text-center">
<?php
 foreach($design_color as $keycolor)
 {
   echo '<div style="background-color:'.$keycolor->color.'height:50px;width:200px;color:white;vertical-align:middle;display:inline-block;">'.$keycolor->description.'</div>';
 }
?><hr class= "style">
</div></div>
</div>
</div>

</form>
<div style = "clear:both;"></div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

