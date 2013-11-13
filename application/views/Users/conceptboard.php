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
		    <li><a href="#">YOUR INITIAL CONCEPT BOARDS</a></li>
   
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
        <a href=""><img src=<?php echo base_url('theme/img/menu.png'); ?> height = "25px"></a>
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
  	
          <li><a href="<?php echo base_url().'index.php/Users/site/logout/';?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- nav-mobile -->
</div><!-- top nav -->	  
 
 
<div class = "white">
<BR><BR>
<div class = "conceptimages text-center">
<BR><BR>
<div class = "white">

<?php
     $attributes = array('class' =>'conceptboardform','id' => 'conceptboardform');
     echo form_open('Concept/site/save_comment_concept_bord/',$attributes);
?>
<div>
<?php
$number = sizeof($conceptboard);

echo '<div id = "conceptwelcome" class = "sanslight">';
echo '<p class = "medium serif"> You have <span class = "pink_text">'.$number.' </span>concept boards for your review</p>';
echo '<p class = "sanslight midsmall">Take a look, and provide some feedback for your designer</p>';
echo '</div>';

$i=0;
$t=0;
if(sizeof($haveproducts)>0){
foreach ($haveproducts as $prod){
$concwprod[$t]= $prod['concept_id'];
$t++;
}}


echo '<table><tr>';

foreach($conceptboard as $key)
{
	$comment=($key->comments!=""?$key->comments:"Provide overall feedback on the concept you see for your designer.  The more details, the better.");
    $reset=  ($key->comments!=""?0:1);
	if($key->status==1)
	{	
	echo '<td><div class = "concept"  id="room_des_'.$i.'">';
	echo '<div class = "concepthold">';
	if(in_array($key->concept_id,$concwprod)){
		echo '<a href="'.base_url().'index.php/Concept/site/concept_products/'.$key->concept_id.'">';
		echo '<div class = "clickhold">This concept has products for your review. Click to view your product suggestions</div>';}
     $i++;
   
  
   
	
         echo '<img class = "conceptimg" src="'.$key->filename.'" width="500px"/></a>';
         echo '<textarea width = "70%" rows = "6" id="concepttext'.$key->concept_id.'" onkeypress="removetext(\'concepttext'.$key->concept_id.'\','.$reset.');" onclick="removetext(\'concepttext'.$key->concept_id.'\','.$reset.');" onblur="resettest(\'concepttext'.$key->concept_id.'\')">'.$comment.'</textarea><input type="button" class = "button4 black medium condensed white_text" value="SAVE" onclick="save_comment(\'concepttext'.$key->concept_id.'\','.$key->concept_id.','.$key->room_id.',\'conceptboardform\')" onblur="reset_text();"/>';	
	
	echo '</div></div></td>';}
	}
?>

</tr></table>
</div>

<input type="hidden" value="" id="holdcomment" name="holdcomment"/>
<input type="hidden" value="" id="holdconceptid" name="holdconceptid"/>
<input type="hidden" value="" id="holdroomid" name="holdroomid"/>
<?php 
echo form_close(); 
?>
</div>
</div>

<div class = "push" style="clear:both;"> 
</div><BR><BR><BR></div>




	<?php 
	include(APPPATH.'/views/templates/footer.php');
?>


