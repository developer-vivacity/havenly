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
		<li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=status"  rel="status">YOUR STATUS</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">YOUR ACCOUNT</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">YOUR PREFERENCES</a></li>
   
	  <?php if(sizeof($designforloginuser)>0)
	  {
               echo '<li><a href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">VIEW DESIGN & SHOP</a></li>';
           }
	  ?>
	
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
		 <?php 
		
		if(sizeof($designforloginuser)>0)
		{
		  echo '<li><a href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">YOUR DESIGNS</a></li>';
		}
		
		?>
	 <li><a href="<?php echo base_url();?>/index.php/Contests/site/designer_availability/" >Designer Availability</a></li>	  	  	
          <li><a href="<?php echo base_url().'index.php/Users/site/logout/';?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- nav-mobile -->
</div><!-- top nav -->	  
 
 
<div class = "white">
<BR><BR>
<div class = "container text-center">
<BR><BR>
<div class = "white">

<?php
     $attributes = array('class' =>'conceptboardform','id' => 'conceptboardform');
     echo form_open('Concept/site/save_comment_concept_bord/',$attributes);
?>
<div class = "carousel slider" id = "myCarousel2">
<div class = "carousel-inner">
<?php
$number = sizeof($conceptboard);

echo '<div id = "conceptwelcome" class = "sanslight">';
echo '<p class = "medium condensed"> You have <span class = "pink_text">'.$number.' </span>concept boards for your review</p>';
echo '<p class = "condensed midsmall">Take a look, and provide some feedback for your designer</p>';
echo '</div>';

$i=1;


foreach($conceptboard as $key)
{
	$comment=($key->comments!=""?$key->comments:"Provide some feedback for your designer");
         $reset=  ($key->comments!=""?0:1);
	
	if ($i==1)
	{
	  echo '<div class = "item active" id="room_des_'.$i.'">';
	}
	else 
	{
	  echo '<div class = "item"  id="room_des_'.$i.'">';
	}
    
	if($key->status==1)
         echo '<img src="'.$key->filename.'" width="100%"/><BR><BR>';
         echo '<textarea width = "70%" rows = "3" id="concepttext'.$key->concept_id.'" onkeypress="removetext(\'concepttext'.$key->concept_id.'\','.$reset.');" onclick="removetext(\'concepttext'.$key->concept_id.'\','.$reset.');" onblur="resettest(\'concepttext'.$key->concept_id.'\')">'.$comment.'</textarea></td><td><input type="button" class = "button3 pink white_text" value="Save" onclick="save_comment(\'concepttext'.$key->concept_id.'\','.$key->concept_id.','.$key->room_id.',\'conceptboardform\')" onblur="reset_text();"/>';	
	
	$i++;
	echo '</div>';
	}
?>
</div>
<?php
if (sizeof($conceptboard)>1)
{
echo '<a class="left carousel-control" href="#myCarousel2" data-slide="prev" onclick="slide_nav(\''.sizeof($conceptboard).' \',\'prev\')">&lsaquo;</a>';
echo '<a class="right carousel-control" href="#myCarousel2" data-slide="next" onclick="slide_nav(\''.sizeof($conceptboard).'\',\'next\')">&rsaquo;</a>';
}

?>
</div>
<input type="hidden" value="" id="holdcomment" name="holdcomment"/>
<input type="hidden" value="" id="holdconceptid" name="holdconceptid"/>
<input type="hidden" value="" id="holdroomid" name="holdroomid"/>
<?php 
echo form_close(); 
?>
</div>
</div>

<div class = "push"> 
</div><BR><BR><BR></div>


	<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

