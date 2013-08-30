<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<!---add script by kbs-------->
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js">
</script>
<!---------------------------->
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
              <li><a id = "servlink" href="<?php echo base_url('#services');?>">Services</a></li>
              <li><a id = "pricelink" href="<?php echo base_url('#price');?>">Cost</a></li>
              <li><a id = "goodslink" href="<?php echo base_url('#goods');?>">Goods</a></li>
              <li><a id = "aboutlink" href="<?php echo base_url('index.php/Users/site/whoweare');?>">About</a></li>
              <li><a <a id = "contlink"href="<?php echo base_url('#contact');?>">Contact</a></li>
            </ul>
			<ul class = "nav pull-right white_text">
			<li><a class = "white_text sanslight" href = "<?php echo base_url().'index.php/Users/site/logout/';?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>
<div class = "white">
<BR><BR>
<div class = "container text-center">
<BR><BR>
<div class = "white">
 <div class = "text-center">
 <ul id = "bstabs" class = "nav nav-pills sanslight ">

<li ><a class = "pink white_text" href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">Your Account</a></li>
<li><a class = "pink white_text" href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">Your Preferences</a></li>
<li><a class = "pink white_text" href="<?php echo base_url();?>/index.php/Users/site/login?a=rooms"  rel="rooms">Your Rooms</a></li>

<li><a class = "pink white_text"  href="<?php echo base_url();?>/index.php/Concept/site/initial_concepts_for_user/"   rel="Concepts">Initial Concepts</a></li>

<?php 

if(sizeof($designforloginuser)>0)
{
echo '<li><a class = "pink white_text"  href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">YOUR DESIGNS</a></li>';
}
?>
<li><a class = "pink white_text" href="<?php echo base_url();?>/index.php/Users/site/login?a=status" rel="status">Status</a></li>
<li><a class = "pink white_text" href="<?php echo base_url();?>/index.php/Contests/site/designer_availability/"  rel="designer">Designer Availability</a></li>
</ul>
</div>
<?php
     $attributes = array('class' =>'conceptboardform','id' => 'conceptboardform');
     echo form_open('Concept/site/save_comment_concept_bord/',$attributes);
?>


<div class = "carousel slider" id = "myCarousel2">
<div class = "carousel-inner">
<?php
$number = sizeof($conceptboard);

echo '<div class = "well trellis sanslight">';
echo '<p class = "medium">Welcome!  You have '.$number.' concept boards for your review</p>';
echo '<p class = "midsmall">Take a look, and provide some feedback for your designer</p>';
echo '</div>';

$i=1;
foreach($conceptboard as $key)
{
	$comment=($key->comments!=""?$key->comments:"Provide some feedback for your designer");
    $reset=  ($key->comments!=""?0:1);
	
	if ($i==1){
	echo '<div class = "item active">';}
	else {echo '<div class = "item">';}
    
	if($key->status!=1)
   
	
   echo '<img src="'.$key->filename.'" width="100%"/><BR><BR>';
   echo '<textarea width = "20%" rows = "3" id="concepttext'.$key->concept_id.'" onkeypress="removetext(\'concepttext'.$key->concept_id.'\','.$reset.');" onclick="removetext(\'concepttext'.$key->concept_id.'\','.$reset.');" onblur="resettest(\'concepttext'.$key->concept_id.'\')">'.$comment.'</textarea></td><td><input type="button" class = "button2 pink white_text" value="Save" onclick="save_comment(\'concepttext'.$key->concept_id.'\','.$key->concept_id.','.$key->room_id.',\'conceptboardform\')" onblur="reset_text();"/>';	
	$i++;
	echo '</div>';
	}
?>
</div>
<a class="left carousel-control" href="#myCarousel2" data-slide="prev">&lsaquo;</a>
	<a class="right carousel-control" href="#myCarousel2" data-slide="next">&rsaquo;</a>
	</div>
<input type="hidden" value="" id="holdcomment" name="holdcomment"/>
<input type="hidden" value="" id="holdconceptid" name="holdconceptid"/>
<input type="hidden" value="" id="holdroomid" name="holdroomid"/>
<?php echo form_close(); ?>
</div>
</div>

<div class = "push"> 
</div><BR><BR><BR></div>


	<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

