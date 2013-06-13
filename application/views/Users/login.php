<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<div class="navmenu">  
    <ul>  
        <li><a href=<?php echo base_url('index.php/Users/site/whoweare');?>>About</a></li>  
        <li><a href=<?php echo base_url('index.php/Users/site/howwework');?>>How we work</a></li>  
        <li><a href="#">1-888-978-3152</a></li>  
      </ul>  
</div>  
<div class = "bgM horizontal right-align">
	  <a class = "button1 right-align inline condensed margin white_text midlarge" id="pull"> &#9776; </a>  
</div>
<div class = "center bgcontainer">
<div class = "center padding_small_top">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=120></a>
</div>
<br>
<div class="half border white center">
	<div class="displayinfoerror">
	<?php 
    $display="none";
    if($title=="Login")
	{
	$display="block";
	echo validation_errors('<p class="error">');
    }
	if (!empty($loginerrors))
	{
		$display="block";
		echo '<p class = "error">'.$loginerrors.'</p>';}
	?>
	
	</div>
<div id = "login" style="display:<?php echo $display;?>">
	
	<div class="padding">
	
   <?php echo form_open('Users/site/login/');?>
   <table class = "horizontal">
	<tr class = "horizontal">
	<td class = "third right-align middle">
		<label class = "medium condensed" for="email">Email:</label>
	</td>
	<td class = "seventy left-align middle">
		<input type="text" id="enterloginemail" name="enterloginemail" value="<?php if(isset($_POST['enterloginemail']))echo $_POST['enterloginemail'];?>"/>
	</td>
	</tr>
  
	<tr class = "horizontal">
	<td class = "third middle right-align">
		<label class = "medium condensed " for="password">Password:</label>
	</td>
	<td class = "seventy left-align middle">
		<input type="password" id="enterpass" name="enterpass"  value="<?php if(isset($_POST['enterpass']))echo $_POST['enterpass'];?>"/>
	</td></tr>
	<tr class = "horizontal">
	<td class = "third middle right-align">
	</td>
	<td class = "half left-align">
		<BR><input type="submit" class="button3 horizontal small sanslight" value="SIGN IN" />
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
    <?php 
	$display="none";
	if($title=="forgotpassword")
    {
	  $display="block";
      echo validation_errors('<p class="error">');
   
    }
    if (!empty($errors))
	{
		
		$display="block";
		echo '<p class = "error">'.$errors.'</p>';}
	?>
    
    </div>
<div id = "forgot" style="display:<?php echo $display; ?>">
<div class = "padding">
	
	<div class="signin_form" >
   <?php echo form_open('Users/site/validatemail/');?>
   <table class = "horizontal">
 <tr class = "middle horizontal">
  <td class = "third right-align middle">
  <label class = "medium condensed" for="enteremail">Email:</label>
  </td>
  <td class = "forty">
  <input type="text" id="enteremail" name="enteremail"  class = "middle"  value="<?php if(isset($_POST['enteremail']))echo $_POST['enteremail']; ?>"/>
  </td></tr>
   </table>
<BR><BR><BR>
<div class = "horizontal">
   <div class = "third inline right-align bottom"></div>
	<div class = "forty inline">
 <input type="submit" class="button3 small horizontal sanslight" value="SIGN IN" /></div>
 <div class = "sanslight blue_text small"><br/>
	<a id = "loginbutton" class = "small sanslight blue_text" href = "#login">Login</a>
</div>
 <?php echo form_close(); ?>
	
</div>
</div>
</div>
</div>
</div>
<br><BR><BR><BR><div class = "push">
</div>
	</div>
	

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

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
