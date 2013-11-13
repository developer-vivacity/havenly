<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<!---add script by kbs-------->
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js">
</script>
<!---------------------------->
 
 <div class="account-nav">
    <div class="account-nav-logo"><a href="<?php echo base_url();?>"><img src = "<?php echo base_url('assets/Images/Blue_dalle.png');?>" height = "85"></a></div>
    <div class="account-nav-left">
	
	<ul id="bstabs">
		<li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=status"  rel="status">STATUS</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">YOUR ACCOUNT</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">YOUR PREFERENCES</a></li>
		    <li><a href = "<?php echo base_url();?>/index.php/Concept/site/initial_concepts_for_user/"   rel="Concepts">YOUR INITIAL CONCEPT BOARDS</a></li>
   	
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
        <a href=""><img src=<?php echo base_url('theme/img/menu.png'); ?> height = "25px"></a>
        <ul id="bstabs" class="dropdownList">
		<li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=status"  rel="status">Current Status</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">Your Account</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">Your Preferences</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=rooms"  rel="rooms">Your Rooms</a></li>
		  <li><a href="<?php echo base_url();?>/index.php/Concept/site/initial_concepts_for_user/"   rel="Concepts">Initial Concepts</a></li>
 	
          <li><a href="<?php echo base_url().'index.php/Users/site/logout/';?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- nav-mobile -->
</div><!-- top nav -->	  
<div class = "white">
<div class = "container" id = "product_holder">
<Br><BR><BR><BR>
<input type = "hidden" value = <?php echo base_url();?> id = "siteurl" name = "siteurl"/>
<?php
echo '<table class = "product_display">';
foreach ($categories as $key=>$index)
{
	echo '<tr><td class = "serif medium">'.$key.'s</td>';
	foreach ($index as $file){
	 echo '<td id = "key_'.$file->id.'"><div class = "holder"><div class="comment_holder"><textarea id = "prod_comment_'.$file->id.'" onfocus="clearContents(this);">';
		if ($file->comments!=NULL&&$file->comments!="") {echo $file->comments;}
		else {echo 'Type Feedback Here...';}
		echo '</textarea><a class = "button4" onclick="add_prod_comment('.$file->id.');">Save</a></div><div class = "prod_img_hold"><img src = "'.$file->filename.'" height = "200px"><p class = "prod_price">$'.$file->price.'</p></div></td>';
	 }
	echo '</tr>';
	}
?>	
</table></div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>