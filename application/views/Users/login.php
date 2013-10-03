<?php 
	include(APPPATH.'/views/templates/header.php');
?>

   <div class="top-nav">
    <div class="nav-left">
      <div class="logo"><a href = "<?php echo base_url();?>">Havenly<a></div>
      <ul>
        <li class="services-nav"><a href = "<?php echo base_url('/#services');?>"> Services</a></li>
        <li class="cg-nav"><a href = "<?php echo base_url('/#goods');?>">Cost &amp; Goods</a></li>
        <li class="about-nav"><a href = "<?php echo base_url('/#about');?>">About</a></li>
        <li class="contact-nav"><a href = "<?php echo base_url('index.php/Users/site/howwework');?>">How We Work</a></li>
      </ul>
    </div><!-- nav left -->

    <div class="nav-mobile">
      <ul id="list-pages-accordion">
        <li>
          <a href=""><img src=<?php echo base_url('theme/img/menu.png');?>></a>
          <ul id="dropdownList">
            <li><a class="login"href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
            <li><a id="startbutton" class="button3" href="#overlay">GET STARTED</a><li>
            <li class="services-nav"><a href = "<?php echo base_url('/#services');?>">Services</a></li>
            <li class="cg-nav"><a href = "<?php echo base_url('/#goods');?>">Cost &amp; Goods</a></li>
           <li class="contact-nav"><a href = "<?php echo base_url('index.php/Users/site/howwework');?>">How We Work</a></li>
            </ul>
        </li>
      </ul>
    </div>
</div>
<div class = "chevron text-center row">
	<div class = "home-login-logo">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=120></a>
</div>
<div class = "row">
<div class = "span5 offset4">
	<div class="displayinfoerror">
	<?php 
    $display="none";
    if($title=="Login")
	{
	$display="block";
	if(validation_errors()!=false){
	echo '<div class = "alert alert-error">';
	echo validation_errors();
	echo '</div>';}
    }
	if (!empty($loginerrors))
	{
		$display="block";
		echo '<div class="alert alert-error">'.$loginerrors.'</div>';
		}
	?>
</div>
	</div>
	</div>
	<div id = "login" class = "login-form" style="display:<?php echo $display;?>">
<?php 
   $attributes = array('name' => 'loginform','id'=>'loginform');
   echo form_open('Users/site/login/',$attributes);?>
   <iframe src="http://leemayer.myshopify.com/cart/clear.js" style="display:none;"></iframe> 
   <iframe src="https://leemayer.myshopify.com/cart/clear.js" style="display:none;"></iframe>
   <input type="hidden" id="sitepath" value="<?php echo base_url();?>"/> 

   <table class = "table-center span5 border white">
 
	<tr>
	<td class = "third right-align middle"><BR><BR><BR>
		<label class = "midsmall sanslight" for="email">&nbsp;&nbsp;&nbsp;Email:</label>
	</td>
	<td class = "seventy left-align middle"><BR><BR><BR>
		<input type="text" id="enterloginemail" name="enterloginemail" value="<?php if(isset($_POST['enterloginemail']))echo $_POST['enterloginemail'];?>"/>
	</td>
	</tr>
  
	<tr>
	<td class = "third middle right-align">
		<label class = "midsmall sanslight" for="password">&nbsp;&nbsp;&nbsp;Password:</label>
	</td>
	<td class = "seventy left-align middle">
		<input type="password" id="enterpass" name="enterpass"  value="<?php if(isset($_POST['enterpass']))echo $_POST['enterpass'];?>"/>
	</td></tr>
	<tr>
	<td class = "third middle right-align">
	</td>
	<td class = "half left-align">
		<BR>
			<input type="submit" class="button3 pink horizontal small sanslight" value="SIGN IN" />
	
			<BR><BR>
	</td>
	</tr>
	</table>
	<div class = "sanslight blue_text small"><br/>
	<a id = "forgotbutton" class = "small sanslight blue_text" href = "#forgot">Forgot Password</a>
</div>
 <?php echo form_close(); ?>
</div>

<div class="displayinfoerror text-center">

    <?php 
	$display="none";
	if($title=="forgotpassword")
    {
	  $display="block";
      echo validation_errors('<div class="alert third alert-error">');
   
    }
    if (!empty($errors))
	{        $display="block";
		echo '<div class = "alert alert-error">'.$errors.'</div>';}
	?>
</div>
<div id = "forgot"  class = "text-center" style="display:<?php echo $display; ?>">

<div class="signin_form" >
   <?php echo form_open('Users/site/validatemail/');?>
   <table class = "white border span5 table-center">
 <tr>
  <td class = "middle"><BR><BR><BR>
  <label class = "medium condensed" for="enteremail">Email:</label>
  </td>
  <td><BR><BR><BR>
  <input type="text" id="enteremail" name="enteremail"  class = "middle"  value="<?php if(isset($_POST['enteremail']))echo $_POST['enteremail']; ?>"/>
  </td></tr>
  <tr><td> </td>
  <td>
<input type="submit" class="button3 pink horizontal small sanslight" value="SIGN IN" />-
	<BR><BR><BR></td></tr>
   
   </table>

 <div class = "sanslight blue_text small"><br/>
	<a id = "loginbutton" class = "small sanslight blue_text" href = "#login">Login</a>
</div>
 <?php echo form_close(); ?>
	
</div>
</div>

</div>
</div>

	
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>


</div>
<script>
$("#forgotbutton").click(function(){
$("#login").hide();
$("#forgot").fadeIn();
$("#enteremail").val("");
$(".displayinfoerror").html("");
});

$("#loginbutton").click(function(){
$("#login").fadeIn();
$("#forgot").hide();
$("#enterloginemail").val("");
$("#enterpass").val("");
$(".displayinfoerror").html("");
});
</script>
