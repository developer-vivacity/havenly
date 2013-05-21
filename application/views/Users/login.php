
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
<div id = "login">
<div class="padding">
	<?php 
	
    echo validation_errors('<p class="error">');?>
   <?php echo form_open('Users/site/login/');?>
   <div class = "horizontal">
   <div class = "third inline right-align bottom	">
  <label class = "medium condensed" for="email">Email:</label></div>
  <div class = "half inline">
  <input type="text" id="enteremail" name="enteremail"  /><br></div>
  </div>
  <div class = "horizontal">
  <div class = "third inline right-align">
  <label class = "medium condensed " for="password">Password:</label></div>
  <div class = "half inline">
  <input type="password" id="enterpass" name="enterpass"  /><br></div></div><br>
  <div class = "third inline right-align">
  </div>
  <div class = "half inline">
  <input type="submit" class="button3 horizontal small condensed" value="Sign in" /></div>
 <?php echo form_close(); ?>
</div>
<div class = "sanslight blue_text small">
	<a id = "forgotbutton" class = "small sanslight blue_text" href = "#forgot">Forgot Password</a>
	</div>

	</div>
	
<div id = "forgot">
<div class = "padding">
<?php 
	if(!empty($register_info))
    echo $register_info;
    echo validation_errors('<p class="error">');
    ?>
	<div class="signin_form">
   <?php echo form_open('Users/site/validatemail/');?>
  <div class = "horizontal">
   <div class = "third inline right-align bottom	">
  <label class = "medium condensed" for="enteremail">Email:</label></div>
  <div class = "half inline">
  <input type="text" id="enteremail" name="enteremail"  /></div></div><BR><BR>
    <div class = "third inline right-align bottom	"></div>
	<div class = "half inline">
 <input type="submit" class="button3 small horizontal condensed" value="Sign in" /></div>
 <?php echo form_close(); ?>
	
</div>
</div>
</div>
	
	</div>
	</div>
<div class = "bgcontainer">
<br><BR><BR><BR><div class = "push">
</div>
	</div>
	

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

<script>
$("#forgot").hide();

$("#forgotbutton").click(function(){
$("#login").hide();
$("#forgot").fadeIn();
});
</script>
