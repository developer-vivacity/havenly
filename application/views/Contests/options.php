<?php 

include(APPPATH.'/views/templates/header.php');
?>

<div class = "form_container_center">
<?php echo form_open("Contests/site/save_options");?>
<p class = "title">What Works for you?</p><br><br>
<div class = "left_form_1"><p class = "text1"><span>Classic</span></p>
<p class = "text1">With this option, you get a design plan, a concept board and a full product list.  An affordable option for a beautiful home.	</p>
<p class = "text1"><?php echo $price_main;?></p>
<input type="radio" name="contest_type" id="contest_type" value="Classic" checked="checked" /></div>
<div class = "right_form_1">
<p class = "text1"><span>Luxe</span></p>
<p class = "text1">Looking for the high touch experience? Your selected designer will come to your house, measure your room for you, and set up your room for you.</p>
<p class = "text1"><?php echo $price_high;?></p>
 
<input type="radio" name="contest_type" id="contest_type" value="Luxe" />
<div id = "contest_details">
<p class = "text1">Right now, we're only available in <span>NYC.</span></p></div> 
<input type="hidden" name="contestid" id="contestid" value="<?php echo $contestid;?>" />
</div>
<div id = "second_row">
<input type="submit" value="Submit!" class = "flat2" id = "contest_submit"/>
</div><?php echo form_close();?>
</div>


<script>
$(document).ready(function(){
$("#contest_details").hide();


$("input[name='contest_type']").change(function(){
 if($(this).val()=='Luxe'){
	$("#contest_details").show();
	
	}
	
	});
});
</script>