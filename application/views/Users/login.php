<?php 
	include(APPPATH.'/views/templates/header.php');
?>
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
              <li><a id = "servlink" href="<?php echo base_url().'/#services';?>">Services</a></li>
              <li><a id = "pricelink" href="<?php echo base_url().'/#price'; ?>">Cost</a></li>
			      <li><a id = "goodslink" href="<?php echo base_url().'/#goods';?>">Goods</a></li>
              <li><a id = "aboutlink" href="#">About</a></li>
              <li><a <a id = "contlink"href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>
	  

<div class = "chevron center"><BR><BR><BR><BR>

	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=120></a>

<br>
<div class = "container">
<div class="span12 text-center">
<BR><BR>
<div class = "span5 offset3">
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
	
	</div></div>
	<div id = "login" style="display:<?php echo $display;?>">
	

   <?php echo form_open('Users/site/login/');?>



   <table class = "span5 table-center border white">
 
	<tr>
	<td class = "third right-align middle"><BR><BR><BR>
		<label class = "medium condensed" for="email">Email:</label>
	</td>
	<td class = "seventy left-align middle"><BR><BR><BR>
		<input type="text" id="enterloginemail" name="enterloginemail" value="<?php if(isset($_POST['enterloginemail']))echo $_POST['enterloginemail'];?>"/>
	</td>
	</tr>
  
	<tr>
	<td class = "third middle right-align">
		<label class = "medium condensed" for="password">Password:</label>
	</td>
	<td class = "seventy left-align middle">
		<input type="password" id="enterpass" name="enterpass"  value="<?php if(isset($_POST['enterpass']))echo $_POST['enterpass'];?>"/>
	</td></tr>
	<tr>
	<td class = "third middle right-align">
	</td>
	<td class = "half left-align">
		<BR><input type="submit" class="button3 horizontal small sanslight" value="SIGN IN" /><BR><BR>
	</td>
	</tr>
	</table>
	<div class = "sanslight blue_text small"><br/>
	<a id = "forgotbutton" class = "small sanslight blue_text" href = "#forgot">Forgot Password</a>
</div>
 <?php echo form_close(); ?>
</div>

</div>	
	<div class="displayinfoerror">
<div class = "row">
<div class = "span8 offset3">
    <?php 
	$display="none";
	if($title=="forgotpassword")
    {
	  $display="block";
      echo validation_errors('<div class="alert alert-error">');
   
    }
    if (!empty($errors))
	{
		
		$display="block";
		echo '<div class = "alert alert-error">'.$errors.'</div>';}
	?>
  </div></div></div>
	
<div id = "forgot" style="display:<?php echo $display; ?>">

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
  <input type="submit" class="button3 small text-center sanslight" value="SIGN IN" /><BR><BR><BR></td></tr>
   </table>

 <div class = "sanslight blue_text small"><br/>
	<a id = "loginbutton" class = "small sanslight blue_text" href = "#login">Login</a>
</div>
 <?php echo form_close(); ?>
	
</div>
</div>

<br><BR><BR><BR><BR><BR><BR>
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
