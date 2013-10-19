<?php 
	include(APPPATH.'/views/templates/header2.php');
?>
<a id = "hidden_link" href = "#details"></a>
<div class = "center"><br><br><br>
</div>
<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fineuploader-3.4.1.min.js")?>></script>


<script type="text/javascript" src=<?php echo base_url("assets/Scripts/ajaxfileupload.js")?>></script>

<!------------for stripe integration--------------->


<script type="text/javascript" src="https://js.stripe.com/v2/stripe-debug.js">
</script>


<script type="text/javascript" src="https://js.stripe.com/v2/">
</script>

<script type="text/javascript">

 // This identifies your website in the createToken call below
var flag_sub=0; 

// This identifies your website in the createToken call below
//this plublish key of kbs.php@gmail.com test account. 
 //Stripe.setPublishableKey('pk_test_HRnP8vucwckyxOntuSL0MSC5');
//this plublish key of lee.m.mayer@gmail.com test account. 

//Stripe.setPublishableKey('pk_test_9yS0nvRQ3OHGX0SMmXZ2jDAG');

//this plublish key of lee.m.mayer@gmail.com live account. 

Stripe.setPublishableKey('pk_live_LEf8fHz4TyZG3fN21gAVv3I8');

// ...// ...
var str_amount;
function get_token()
{
     str_amount=$("#show_design_fee").html();
       str_amount=str_amount.replace('$','');

     //if(($("#CVC").val().length>=3)&&($("#cardnumber").val().length<=16))    
     if(($("#CVC").val().length>=3))    
      {
        $('.payment-errors').html("<img src='"+$("#basepath").val()+"/assets/Images/ajax-loader.gif' width='25px' height='25px'>");    
         Stripe.card.createToken({
              
         name: $('#card-name').val(),
         number: $('#cardnumber').val(),
         cvc: $('#CVC').val(),
         exp_month: $('#cart_month').val(),
         exp_year: $("#cart_year").val()
        }, stripeResponseHandler);
       
       }

}

var stripeResponseHandler = function(status, response) 
  {
  
  var $form = $('#payment-form');

  if(response.error) 
  {
    $form.find('.payment-errors').text(response.error.message);
    flag_sub=0;
  } 
  else if(status==200) 
  {
   // token contains id, last4, and card type
    var token = response.id;
    $("#tokencode").val(token);
    flag_sub=1;
    $.post($("#basepath").val()+"index.php/Cart/site/use_token", {stripeToken :token,amount:str_amount,description:$("#email").val()},function(data)
    {
       
    if(data==1)
    {
        $form.find('.payment-errors').text("Thank you!");
        $("#loading").show();
        $("#user_login_form").submit();
     }
    else
    {

      $form.find('.payment-errors').text(data);

    }    
})   

   }
};

</script>

<!-----------------------------$$$$$$$$$$$$$$$$-------------------------------------->

<br>
<noscript>
<style type="text/css">
        .form_container {display:none;}
</style>
<br>
<br>
<div class = "noscript"><p class = "text2">You Should Enable Javascript.  It is, after all, 2013!</p>
		
	<p class = "text">Don't know how?<br><br>
			Click here for <a href = "https://support.mozilla.org/en-US/home">Mozilla.</a><br>
			Click here for <a href= "https://support.microsoft.com/ph/807">Internet Explorer</a><br>
			Click here for <a href= "http://support.google.com/adsense/bin/answer.py?hl=en&answer=12654">Google Chrome</a>
	</p>
</div>
</noscript>	

<div class = "form_container">
<div id="loading">
  <img id="loading-image" src=<?php echo base_url('assets/Images/ajax-loader.gif');?> alt="Loading..." />
</div>

<form class = "user_form" id="user_login_form" name="user_room_form" method="post" action="<?php echo base_url('index.php/Contests/site/room_submit');?>" enctype="multipart/form-data">
<input type="hidden" name="basepath" id="basepath" value="<?php echo base_url();?>">	
	<div id = "intro" class = "resize">
	<p class = "extralarge sans-serif blue_text">
			IT'S NICE TO MEET YOU.
			</p>
			<br><br><br>
			<p class = "medium space half condensed dark_gray_text">
			We're going to ask you just a few questions to get a sense of your style and your needs.  There are no wrong answers.  And don't worry, our designer will call you to talk a little further.
			</p><BR><BR><BR><BR><BR>
			
			<a class = "button2 pink midsmall white_text" id = "introbutton">
			Continue &rarr;</a><BR><BR>
</div>

	<div id = "style_pics" class = "resize">
	<ul class = "survey_step">
<li class = "circle_survey condensed browsable active clickstyle_picks">1</li>
<li class = "circle_survey condensed">2</li>
<li class = "circle_survey condensed">3</li>
<li class = "circle_survey condensed">4</li>
<li class = "circle_survey condensed">5</li>
<li class = "circle_survey condensed">6</li>
</ul>
<BR><BR>
		<p class = "extralarge sans-serif blue_text">THE STYLE QUESTION </p><br>
		<p class = "sanslight medium dark_gray_text"> 
		Pick a few pictures you love. This helps us match you up with the <span>perfect designer.</span></p>
		<br><br>
		<label class = "sanslight" for="room_type">Which room are we decorating?</label>
		<select name="room_type" id="room_type">
			<option value = "none"></option>
			<option value="BR" >Bedroom</option>
			<option value="LR">Living/Dining</option>
	</select><br><br>
		
	<div id = "BR" class = "padding_small">
	<div>
		<input type="checkbox" name="style[]" value = 1 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR1.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 2 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR2.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 3 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR3.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 4 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR4.jpg');?> height=270em> 
		</div><div><input type="checkbox" name="style[]" value = 5 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR5.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 6 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR6.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 7 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR7.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 8 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR8.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 9 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR9.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 10 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR10.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 11 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR11.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 12 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR12.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 13 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR13.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 14 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR14.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 15 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR15.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 16 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR16.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 17 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR17.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 18 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR18.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 19 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR19.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 20 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR20.jpg');?> height=270em></div>
		</div>
		
		<div id = "LR" class = "padding_small">
	        <div>
		<input type="checkbox" name="style[]" value = 1 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR1.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 2 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR2.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 3 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR3.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 4 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR4.jpg');?> height=270em> 
		</div><div><input type="checkbox" name="style[]" value = 5 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR5.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 6 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR6.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 7 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR7.jpg');?> height=270em>
		</div>
		<div><input type="checkbox" name="style[]" value = 8 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR8.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 9 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR9.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 10 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR10.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 11 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR11.jpg');?> height=270em>
		</div><div><input type="checkbox" name="style[]" value = 12 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR12.jpg');?> height=270em>
		</div>
		<div><input type="checkbox" name="style[]" value = 13 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR13.jpg');?> height=170em></div>
		<div><input type="checkbox" name="style[]" value = 14 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR14.jpg');?> height=170em></div>
		<div><input type="checkbox" name="style[]" value = 15 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR15.jpg');?> height=170em></div>
		<div><input type="checkbox" name="style[]" value = 16 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR16.jpg');?> height=170em></div>
		<div><input type="checkbox" name="style[]" value = 17 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR17.jpg');?> height=170em></div>
		<div><input type="checkbox" name="style[]" value = 18 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR18.jpg');?> height=170em></div>
		<div><input type="checkbox" name="style[]" value = 19 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR19.jpg');?> height=170em></div>
		<div><input type="checkbox" name="style[]" value = 20 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR20.jpg');?> height=170em></div>
		</div>
		
		
		<br>
<hr class = "style half"/><br><br><br><br><br><div class = "continue horizontal"><br>
	<!--<a class = "button2 login gray">Login, if this is old</a>-->
	<a class = "button2 midsmall pink" onClick="_gaq.push(['_trackEvent', 'style_photo', 'click', 'userform', '5']);">
	Keep Going &rarr;</a><br><br>
</div><br><br>
</div>


	<div id = "colors" class = "resize">
	
<ul class = "survey_step">
<li class = "circle_survey browsable browsable condensed clickstyle_pics">1</li>
<li class = "circle_survey browsable condensed active clickcolors">2</li>
<li class = "circle_survey condensed">3</li>
<li class = "circle_survey condensed">4</li>
<li class = "circle_survey condensed">5</li>
<li class = "circle_survey condensed">6</li>
</ul>
<BR><BR>
	
	<p class = "extralarge sanslight blue_text">THE COLOR QUESTION</p><br>
		<p class = "sanslight medium dark_gray_text"> Which <span>appeal to you</span> most for your room?</p><br><br>
		<div class = "inline"><div class = "color" style = "background-color: rgb(188,196,188);"></div>
		<input type="checkbox" name="color[]" value = 1 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: rgb(255,243,196);"></div>
		<input type="checkbox" name="color[]" value = 2 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: rgb(99, 121, 134);"></div>
		<input type="checkbox" name="color[]" value = 3 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: rgb(255, 186, 180);"></div>
		<input type="checkbox" name="color[]" value = 4 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: rgb(204, 199, 185);"></div>
		<input type="checkbox" name="color[]" value = 5 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: rgb(241, 242, 235);"></div>
		<input type="checkbox" name="color[]" value = 6 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: rgb(197, 222, 204);"></div>
		<input type="checkbox" name="color[]" value = 7 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: rgb(190, 210, 213);"></div>
		<input type="checkbox" name="color[]" value = 8 class='cbox' /></div><br>
				
		<div class = "inline"><div class = "color" style = "background-color: #FF0055;"></div>
		<input type="checkbox" name="color[]" value = 9 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: #006FFF;"></div>
		<input type="checkbox" name="color[]" value = 10 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: #00FFF7;"></div>
		<input type="checkbox" name="color[]" value = 11 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: #00FF5E;"></div>
		<input type="checkbox" name="color[]" value = 12 class='cbox' /></div>
		<div class = "inline"><div class = "color" style = "background-color: #FFD500;"></div>
		<input type="checkbox" name="color[]" value = 13 class='cbox' /></div><div class = "inline">
		<div class = "color" style = "background-color: #FF1100;"></div>
		<input type="checkbox" name="color[]" value = 14 class='cbox' /></div>	

	<br><br><hr class = "style half"/><br><br><br><br><br>
	<div class = "continue horizontal"><br>
	
	<a class = "button2 midsmall pink"  onClick="_gaq.push(['_trackEvent', 'color_photo', 'click', 'userform', '5']);">
	Keep Going &rarr;</a><br><br>
</div>
</div>	

<div id = "room_pics" class = "resize" ><br>

	<ul class = "survey_step">
<li class = "circle_survey condensed browsable clickstyle_pics">1</li>
<li class = "circle_survey condensed browsable clickcolors">2</li>
<li class = "circle_survey condensed active clickroom_pics">3</li>
<li class = "circle_survey condensed" >4</li>
<li class = "circle_survey condensed">5</li>
<li class = "circle_survey condensed" >6</li>
</ul>
<BR><BR>
<p class = "extralarge sanslight blue_text">THE PICTURE SECTION </p><br>
<p class = "medium sanslight dark_gray_text"> Only your designer sees this, so you don't have to be too embarrassed about your spaceship sheets. </span></p>
<br><br>
<div class = "padding">
<div style = "display: table-row">
<div class = "inline gray" style = "display:table-cell; width:40%"><BR><BR>
<p class = "sanslight white_text midlarge"> Upload photos of your room</p><BR>
<p class = "sanslight white_text midsmall">Take pictures of all four walls of your room, if you can.</p><BR><BR>
<div id = "first_photo" class= "padding inline"> 

	<div>
		<div id="uploader1">.</div>
		<input type="hidden" name="room_file1" id="room_file1" />
		<div id = "file1">
			<a id = "room_button1" onclick = '$("#room_photo1").click();'>
				<img src = <?php echo base_url('assets/Images/uploadpng.png');?> height="150">
			</a>
			<input type = "file" name = "room_photo1" id = "room_photo1"/>
			<div id = "image1"></div>
		</div>	
	</div>
</div>
<div id = "second_photo" class= "padding inline">

	<div>
		<div id="uploader2">.</div>
		<input type="hidden" name="room_file2" id="room_file2" />
		<div id = "file2">
			<a id = "room_button2" onclick = '$("#room_photo2").click();'>
				<img src = <?php echo base_url('assets/Images/uploadpng.png');?> height="150">
			</a>
			<input type = "file" name = "room_photo2" id = "room_photo2"/>
			<div id = "image2"></div>
		</div>	
	</div>
</div>
<div id = "third_photo" class= "padding inline">

	<div>
		<div id="uploader3">.</div>
		<input type="hidden" name="room_file3" id="room_file3" />
		<div id = "file3">
			<a id = "room_button3" onclick = '$("#room_photo3").click();'>
				<img src = <?php echo base_url('assets/Images/uploadpng.png');?> height="150">
			</a>
			<input type = "file" name = "room_photo3" id = "room_photo3"/>
			<div id = "image3"></div>
		</div>	
	</div>
</div>
<div id = "fourth_photo" class = "padding inline">
	<div>
		<div id="uploader4">.</div>
		<input type="hidden" name="room_file4" id="room_file4" />
		<div id = "file4">
		<a id = "room_button4" onclick = '$("#room_photo4").click();'>
				<img src = <?php echo base_url('assets/Images/uploadpng.png');?> height="150">
			</a>
			<input type = "file" name = "room_photo4" id = "room_photo4"/>
			<div id = "image4"></div>
		</div>	
	</div>
</div>


<div class = "horizontal"><a>
<div id = "tweetsend" class = "pink white_text padding_small third border auto light_gray">
	<input type="checkbox" class = "inline top" name="later" id="later" value="later"/><p class = "medium teal_text condensed inline"> 
	OR, click here to email (hello@havenly.com) your pictures to us later.</p>
</div></a></div>
</div>




</div></div>
<BR><BR>


<br><br><hr class = "style half"><br><br><br><br><br>
<div class = "continue horizontal"><br>
	<!--<a class = "button2 login gray">Login, if this is old</a>-->
	<a class = "button2 midsmall pink">Keep Going &rarr;</a><br><br>
</div>
</div>


	

	<div id = "sizes" class = "resize" >
	<ul class = "survey_step">
<li class = "circle_survey condensed browsable clickstyle_pics">1</li>
<li class = "circle_survey condensed browsable clickcolors">2</li>
<li class = "circle_survey condensed browsable clickroom_pics">3</li>
<li class = "circle_survey condensed active">4</li>
<li class = "circle_survey condensed">5</li>
<li class = "circle_survey condensed">6</li>
</ul>
<BR><BR>
	
	<p class = "extralarge sanslight blue_text">THE ROOM QUESTIONS</p><br>
		<p class = "sanslight medium dark_gray_text">Tell us a little about your room. <span>And what you're looking for.</span></p><br><br>
		<div class = "horizontal">
		
		<div class = "center top half">
		<p class = "midsmall sanslight center dark_gray_text">Rough room dimensions:<p class = "small condensed dark_gray_text"> (in feet)</span></p><br>
		<input type="text" name="room_width" value="width" id = "room_width" maxlength="6" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};"/> 
			<br>
		x  <br>
		<input type="text" name="room_height" value="length" id = "room_height" maxlength="6" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};"/>
		</div>
		<div class = "center top half">
			<p class = "midsmall sanslight center dark_gray_text ">A bit about what you want, want to keep, want to buy:</p><br>
			<BR><textarea name="about" id="about" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};">I like the couch, but need your help with everything else, including a new coffee table</textarea>
	  </div></div>
	  <br><br><br><br><br><br><br>
	  <div class = "continue horizontal"><br>
		<a class = "button2 midsmall pink" onClick="_gaq.push(['_trackEvent', 'room_desc', 'click', 'userform', '5']);">Keep Going &rarr;</a><br><br>
</div>	</div>


<div id = "type" class = "resize">
<ul class = "survey_step">
<li class = "circle_survey condensed browsable clickstyle_pics">1</li>
<li class = "circle_survey condensed browsable clickcolors">2</li>
<li class = "circle_survey condensed browsable clickroom_pics">3</li>
<li class = "circle_survey condensed browsable clicksizes">4</li>
<li class = "circle_survey condensed active clicktype">5</li>
<li class = "circle_survey condensed" >6</li>
</ul>
<BR><BR>
	  
	  <p class ="extralarge sanslight blue_text">THE NEEDS QUESTION</p><br>
	  <p class = "medium sanslight dark_gray_text">Are you a <span>total beginner</span>, or do you <span>just need help </span>putting it all together?</p><br>
	  
	  <div class = "third padding_small inline top">

		<img class = "inactive_one" src = <?php echo base_url('assets/Images/Type1.png');?> height=300em >
		<input type="radio" name="type"  id="type" value = "incomplete" class = "cbox"/></div>	 

	
<div class = "third inline padding_small top">
	  <img class = "inactive_one"  src = <?php echo base_url('assets/Images/Type2.png');?> height=300em>
	  <input type="radio" name="type" id="type" value = "complete" class = "cbox"/>
	  
	  </div>		
		<br><br><br><br><hr class = "style half"/><br><br><br><br>
		<div class = "continue horizontal"><br>
	
			<a class = "button2 midsmall pink">Keep Going &rarr;</a><br><br>		
		</div>
		
	</div>
	<div id = "social" class = "resize">
		  	<ul class = "survey_step">
<li class = "circle_survey condensed browsable clickstyle_pics">1</li>
<li class = "circle_survey condensed browsable clickcolors">2</li>
<li class = "circle_survey condensed browsable clickoom_pics">3</li>
<li class = "circle_survey condensed browsable clicksizes">4</li>
<li class = "circle_survey condensed browsable clicktype">5</li>
<li class = "circle_survey condensed active clicksocial">6</li>
</ul>
	
	<p class ="extralarge sanslight blue_text">THE GET TO KNOW YOU PART</p><br>
	<p class = "medium seventy sanslight space dark_gray_text">
		OPTIONAL:  If you feel comfortable, let us see some of your social media profiles.</p>  <br><BR>
		<P class = "small seventy space blue_text sanslight">We won't use this for anything other than to decorate.  <br>
		(Please note, we can only view them if they are public)</p>
		<br><br><br><br>
		<div class = "horizontal">
		<div class = "third middle inline right-align">
		<img src = <?php echo base_url('assets/Images/fblarge.png');?> height = 80>
		</div>
		<div class = "half middle inline">
		<input type = "text" name = "facebook" value = "Link to your Facebook page" id = "facebook"
		onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" 
		/>
		</div></div><BR><BR>
		<div class = "horizontal">
		<div class = "third middle inline right-align">
		<img src = <?php echo base_url('assets/Images/pinlarge.png');?> height = 80>
		</div>
		<div class = "half middle inline">
		<input type = "text" name = "pinterest" value = "Link to a pinterest board" id = "pinterest"
		onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" 
		/>
		</div></div><BR><BR>
		<div class = "horizontal">
		<div class = "third middle inline right-align">
		<img src = <?php echo base_url('assets/Images/instaicon.png');?> height = 80>
		</div>
		
		
		
		<div class = "half middle inline">
		<input type = "text" name = "instagram" value = "Your Instagram Page" id = "instagram"
		onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" 
		/>
		</div></div>
	
	<BR><BR>
	
	<div class = "continue horizontal"><br>
	
			<a class = "button2 midsmall pink" onClick="_gaq.push(['_trackEvent', 'social', 'click', 'userform', '5']);">Keep Going &rarr;</a><br><br>		
	</div>
	</div>
	<!-------------------------@@@@@@@@@@@@@@@@@@@@@----------------------------------->
	<div id = "information" class = "resize">
		<p class = "extralarge sanslight blue_text">CREATE YOUR ACCOUNT</p><br>
		<p class = "medium sanslight dark_gray_text">Your designer will be in <span>touch in three business days.</span></p>
	<div class = "horizontal left-align"><BR><BR>
	<div class = "half inline infosection">
	
	<div class = "horizontal">
	<label class = "labels inline forty middle right-align small sanslight dark_gray_text" for="first_name">First Name:</label>
	<input type="text" name="first_name" value="Holly" id="first_name" class = "forminput inline" maxlength="30" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br></div>
			
	<div class = "horizontal">
	<label class = "labels inline forty middle right-align small sanslight dark_gray_text" for="last_name">Last Name:</label> 
	<input type="text" name="last_name" value="Golightly" id="last_name" class = "forminput"  maxlength="30"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br>
			</div>
			
	<div class = "horizontal">
	<label class = "labels inline forty middle right-align small sanslight dark_gray_text" for="email">Email:</label>
	<input type="text" name="email" value="cat@gmail.com" id="email" class = "forminput"  maxlength="50"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br></div>
		
	<div class = "horizontal">
	<label class = "labels inline forty middle right-align small sanslight dark_gray_text" for="phone">Phone Number:</label>
	<input type="text" name="phone" value="867-5309" id="phone" class = "forminput"  maxlength="100"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br>
		</div>
		
	<div class = "horizontal">
	<label class = "labels inline forty middle right-align small sanslight dark_gray_text" for="zipcode">Zipcode: </label>
	<input type="text" name="zipcode" value="10024" id="zipcode" class = "forminput"  maxlength="10"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br></div>
		
	<div class = "horizontal">
	<label class = "labels inline forty middle right-align small sanslight dark_gray_text" for="password">Pick a Password: </label>
	<input type="text" name="password" value="Password (min 6 chars.)" id="password" class = "forminput pwd" maxlength="50"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
	</div>
	</div>	
		
		<!-------------------------------------Add Design Fee----------------------------------------------------->

		<div class= "half inline border	 left-align infosection" >
		<div class = "horizontal aligned">
		<span id="designfeepart"></span>
		<label class = " inline forty middle right-align midsmall condensed dark_gray_text">D E S I G N &nbsp; F E E :</label>
		<span id="show_design_fee" class = "inline middle midsmall condensed pink_text"></span>
		<br>
		</div>
		
		<hr class = "style">
		<!-----------design fee hidden variables------->
		
		<input type="hidden" value="0" name="designfeeid" id="designfeeid"/>
		
		<!---<input type="hidden" value="inactive" name="feestatus" id="feestatus"/>---->
		
		<input type="hidden" value="active" name="feestatus" id="feestatus"/>
		
		<input type="hidden" value="null" name="hidpromotioncode" id="hidpromotioncode">
                
                <input type="hidden" value="incomplete" name="hidesigntype" id="hidesigntype" >
                <input type="hidden"  name="tokencode" id="tokencode"/>
		<!----------end design fee hidden variables------>
		
				<!--<div class="horizontal">
		<div class="labels" id="designtype">&nbsp;</div>
		</div>-->
		<br/>
		<div class="horizontal aligned" id="codepromotion">
		<label class = "labels inline forty middle right-align small sanslight dark_gray_text" for="promotioncode">Promotion Code:</label>
		<input type="text" name="promotioncode" value="Promotion Code:" id="promotioncode" class = "forminput middle"  maxlength="6"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
		<input type="button" class = "button3 pink white_text condensed small" name="Apply" value="Apply" id="designApply"/>
		</div>
		
		<div id="payment-form" class = "alert alert-error">
		   <span class="alert-error alert payment-errors"></span>
		<div class="horizontal">

		   <label class = "labels inline forty middle right-align small sanslight dark_gray_text" for="cardtype">Card Type: </label>
<!-------		 
 <select id="card-name" class = "forty forminput">
		      <option value="4242424242424242">
			 Visa
		      </option>
		     <option value="5555555555554444">
			Master
		     </option>
		     <option value="378282246310005">
		     American Express
		     </option>
		    ----->

		   <!----<label class = "labels inline forty middle right-align midlarge sanslight dark_gray_text" for="cardtype">Select card type: </label>--->
		  <div class="labels"> 
               
               <select id="card-name" style="width:100%" class = "forty forminput">
		        <option value="Visa">
			 Visa
		      </option>
		     <option value="Mastercard">
			Mastercard
		     </option>
		     <option value="AmericanExpress">
		     American Express
		     </option>
		    
		    </select>
</div>
		</div>
		<div class="horizontal">
		<label class = "labels inline forty middle right-align small sanslight dark_gray_text" for="cardnumber">Card Number:</label>
		<input type="text" data-stripe="cardnumber" value="Card Number" id="cardnumber" class = "forminput"  maxlength="16"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
		<input type="text" data-stripe="CVC" id="CVC" value="CVC" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" style="width:9%" maxlength="4"/>
		</div>
		<div class="horizontal">
		<div for="cardnumber"  class = "labels inline forty middle small sanslight dark_gray_text">Expiration Date </div>
	<select data-stripe="exp-month" class = "forminput" id="cart_month">
<?php

   for($i=1;$i<=12;$i++)
   {
       echo '<option value='.$i.'>'.$i.'</option>';	
   }
?>	
</select>
<select data-stripe="exp-year" class = "forminput" id="cart_year">
  <?php
   for($year=2013;$year<=2020;$year++)
   {
    echo '<option value='.$year.'>'.$year.'</option>';	
    }
?>	
</select> 
</div>
	<div">
	<!---<button type="button" id="SecurCode">SecurCode</button>--->
	</div>	
	</div>	</div><BR><BR>
	<div class = "seventy small condensed dark_gray_text">If you aren't satisfied after your first designer call, we will refund your design fee. Please call us at (888)978-3152 with any questions.</div> 
	</div>
<br/>
		<!-----------------------------@@@@@@@@@@@@@@@@@@@@@@@@@@----------------------------------->
<br><br>
	

<div class = "continue2 horizontal">
<input type="button"  id = "submit_but" class="button3 sanslight midsmall white_text pink" value="Submit"> </div>
	</div>
	</form>
	</div>
	</p>
	<div class = "push">
	</div>

	
	<script>

  $(document).ready(function(){	  
   $("#type").click(function()
   {
       var type="incomplete";


       if($("#type:checked").size()>0)
       type=$("#type:checked").val();
    $.post($("#basepath").val()+"index.php/Cart/site/get_design_fee", {designtype :type},function(data)
    {
       $("#show_design_fee").html(data);

    })


   })
    var $promotion_code=0;
       $("#designfeeid").val(0);
     $("#designApply").click(function()
     {

         var designtype="incomplete";
         if($('#type:checked').size()>0)
         designtype=$('#type:checked').val();

         $(".error").remove();
	 $("#promotionerror").remove();
	 $(".designtypeerror").remove();
	 
         var str="Enter 6 alphanumeric chars.";
	if($("#promotioncode").val()==str)	 
        {
               
                 if($("#designtypeerror").length==0)	 
	        $("#designtype").after('<span class = "error" id="designtypeerror">Enter Promotion Code</span>')
                 return false;
          }
          if($("#feestatus").val()!="active")
          {
	        if($("#designtypeerror").length==0)	 
	        $("#designtype").after('<span class = "error" id="designtypeerror">choose active design fee!</span>')
                 return false;	 
          }
          $("#designtype").after('<span id="imgspan"><img src="'+$("#basepath").val()+'/assets/Images/ajax-loader.gif" width="25px" height="25px" id="designtypeerrorimg"></span>')
          $.post($("#basepath").val()+"index.php/Cart/site/promotion_code", {promotioncode :$("#promotioncode").val(),type:designtype}, 
          function(data)
          {
		 $("#imgspan").remove();
		 $(".error").remove();
		 $("#designtypeerrorimg").remove();
		 
            if(data.length>0)
            { 
		   var data= data.split('-@-');
		   $promotion_code=data[0];
	   
                   
                   $("#hidpromotioncode").val($("#promotioncode").val());  
                   if($promotion_code==1)
                   {
                   $("#designtype").after('<span class = "error" id="designtypeerror">it\'s valid!</span>')
                   $("#show_design_fee").html(data[2]); 
                   $("#designfeeid").val(data[1]);                  
                   }                 
                   else
                   {
                   $("#designtype").after('<span class = "error" id="designtypeerror">'+data[1]+'</span>')
                   $("#designfeeid").val(0);                     
                   }                    
                   return false; 
           }
           else
           {
		   $promotion_code=0;
	            $("#designtype").after('<span class = "error" id="designtypeerror">it\'s not found!</span>')
            } 
          })
	
	
	});
	
	
	$("#intro").fadeIn("slow");

	var left = ($(window).width())/2;
	$("#loading-image").css("left",left);
	
$(" #file1, #file2, #file3, #file4, #room_video, #BR, #LR,  #loading, .continue, .login, .cbox, #later, #submit_but").hide();
  $("#social, #room_pics, #style_pics,#colors,#type,#sizes, #information").hide();

  $("#social .continue").show();
	$("#introbutton").click(function(){
	                 
	                 $("#intro").hide();
	                 $("#style_pics").fadeIn();});
					 
		        $('#uploader1').fineUploader({

		        request: {
					
				endpoint: 'site/upload_room_pic'
				},
				debug:true,
				multiple: false,
				validation: {
				allowedExtensions: ['JPG', 'jpeg', 'jpg', 'gif', 'png']
				
				},
				text: {
				uploadButton: '<a> <img src = "<?php echo base_url('assets/Images/uploadpng.png');?>" height="120"></a>'
				}
				}).on('complete', function(event, id, fileName, responseJSON) {
				
				if (responseJSON.success) {
					
					var data = responseJSON.filename;
					var newimage= '<BR><BR><img src="https://s3.amazonaws.com/easableimages/'+data+'" width=200>';
					$(this).html(newimage);
					
					$("#room_pics .continue").show();
					$("#uploader1 .qq-uploader").hide();
				}
				});
			
	
		$('#uploader2').fineUploader({
				request: {
				endpoint: 'site/upload_room_pic'
				},
				debug:true,
				multiple: false,
				validation: {
				allowedExtensions: ['jpeg', 'jpg', 'gif', 'JPG', 'png']
				
				},
				text: {
				uploadButton: '<a> <img src = "<?php echo base_url('assets/Images/uploadpng.png');?>" height="120"></a>'
				}
				}).on('complete', function(event, id, fileName, responseJSON) {
				if (responseJSON.success) {
					var data = responseJSON.filename;
					var newimage= '<BR><BR><img src="https://s3.amazonaws.com/easableimages/'+data+'" width=200>';
					$(this).html(newimage);
					$("#room_pics .continue").show();
					$("#uploader2 .qq-uploader").hide();				 
				}
				});
				
	
			$('#uploader3').fineUploader({
				request: {
				endpoint: 'site/upload_room_pic'
				},
				debug:true,
				multiple: false,
				validation: {
				allowedExtensions: ['jpeg', 'jpg', 'gif', 'JPG', 'png']
				
				},
				text: {
				uploadButton: '<a> <img src = "<?php echo base_url('assets/Images/uploadpng.png');?>" height="120"></a>'
				}
				}).on('complete', function(event, id, fileName, responseJSON) {
				if (responseJSON.success) {
					var data = responseJSON.filename;
					var newimage= '<BR><BR><img src="https://s3.amazonaws.com/easableimages/'+data+'" width=200>';
					$(this).html(newimage);
					$("#room_pics .continue").show();
					$("#uploader3 .qq-uploader").hide();				 
				}
				});
				
				
		$('#uploader4').fineUploader({
				request: {
				endpoint: 'site/upload_room_pic'
				},
				debug:true,
				multiple: false,
				validation: {
				allowedExtensions: ['jpeg', 'jpg', 'gif', 'JPG', 'png']
				
				},
				text: {
				uploadButton: '<a> <img src = "<?php echo base_url('assets/Images/uploadpng.png');?>" height="120"></a>'
				}
				}).on('complete', function(event, id, fileName, responseJSON) {
				if (responseJSON.success) {
					var data = responseJSON.filename;
					var newimage= '<BR><BR><img src="https://s3.amazonaws.com/easableimages/'+data+'" width=200>';
					$(this).html(newimage);
				   $("#room_pics .continue").show();
					$("#uploader4 .qq-uploader").hide();				 
				}
				});
				
	
	
	
	
	$("#room_photo1").change(function(){
	$("#loading").show();
	var filename=$("#room_photo1").val();
	$.ajaxFileUpload({
	dataType : 'JSON',
	url :'site/upload_room_pic_phone',
	secureuri :false,
	fileElementId :'room_photo1',
	data: {'id':'room_photo1'},
	success: function (data){
	var newimage = "<img src ='https://s3.amazonaws.com/easableimages/"+data+"' height=150em>";
	$("#image1").html(newimage);
	$("#image1").show();
	$("#loading").hide();
	$("#room_button1").hide();
	
}
});
$("#room_pics .continue").show();
});



$("#room_photo2").change(function(){
	$("#loading").show();
	var filename=$("#room_photo2").val();
	$.ajaxFileUpload({
	dataType : 'JSON',
	url :'site/upload_room_pic_phone',
	secureuri :false,
	fileElementId :'room_photo2',
	data: {'id':'room_photo2'},
	success: function (data){
	var newimage = "<img src ='https://s3.amazonaws.com/easableimages/"+data+"' height=150em>";
	$("#image2").html(newimage);
	$("#image2").show();
	$("#loading").hide();
	$("#room_button2").hide();
	// $(".login").show();
}


});
$("#room_pics .continue").show();
});


$("#room_photo3").change(function(){
	$("#loading").show();
	var filename=$("#room_photo3").val();
	$.ajaxFileUpload({
	dataType : 'JSON',
	url :'site/upload_room_pic_phone',
	secureuri :false,
	fileElementId :'room_photo3',
	data: {'id':'room_photo3'},
	success: function (data){
	var newimage = "<img src ='https://s3.amazonaws.com/easableimages/"+data+"' height=150em>";
	$("#image3").html(newimage);
	$("#image3").show();
	$("#loading").hide();
	$("#room_button3").hide();
	// $(".login").show();
}

});
$("#room_pics .continue").show();
});


$("#room_photo4").change(function(){
	$("#loading").show();
	var filename=$("#room_photo4").val();
	$.ajaxFileUpload({
	dataType : 'JSON',
	url :'site/upload_room_pic_phone',
	secureuri :false,
	fileElementId :'room_photo3',
	data: {'id':'room_photo3'},
	success: function (data){
	var newimage = "<img src ='https://s3.amazonaws.com/easableimages/"+data+"' height=150em>";
	$("#image4").html(newimage);
	$("#image4").show();
	$("#loading").hide();
	$("#room_button4").hide();
	// $(".login").show();
}

});
$("#room_pics .continue").show();

});
	
	
	
		$("#room_pics .continue").click(function(){
			var filename1 =$("#first_photo img").attr('src');
			$("#room_file1").val(filename1);
			var filename2 =$("#second_photo img").attr('src');
			$("#room_file2").val(filename2);
			var filename3 =$("#third_photo img").attr('src');
			$("#room_file3").val(filename3);
			var filename4 =$("#fourth_photo img").attr('src');
			$("#room_file4").val(filename4);
			
					});
 
		
	
	
	
		$(".inactive").click(function(){
		$(this).toggleClass('active');
		var checkbox = $(this).parent().find('.cbox');
		checkbox.prop('checked',!checkbox[0].checked);
			if ($("#style_pics :checkbox:checked").length > 0)
		{$("#style_pics .continue").fadeIn();}
		else {$("#style_pics .continue").fadeOut();}
		});
		
		$(".color").click(function(){
		$(this).toggleClass('active');
		var checkbox = $(this).parent().find('.cbox');
		checkbox.prop('checked',!checkbox[0].checked);		
		if ($("#colors :checkbox:checked").length > 0)
		{$("#colors .continue").fadeIn();}
		else {$("#colors .continue").fadeOut();}
		});
		
			 $('.pwd').click(function(){
			$(this).get(0).type='password';
				});

		
		$(".inactive_one").click(function(){ 
		 $(".inactive_one").removeClass('active');
		 $(this).toggleClass('active');
		 var checkbox = $(this).parent().find('.cbox');
			checkbox.prop('checked','checked');
		$(this).parent().parent().find(".continue").fadeIn();
		});
		
		
		$("#sizes input").keyup(function(){
		if ( $("#room_width").val()!=''){
	
			if($("#room_height").val()!='')
				{
				$("#sizes .continue").fadeIn();
				}
				else {$("#sizes .continue").hide();}
			} else {$("#sizes .continue").hide();}
			});
		
		
	
$("#room_type").change(function(){
if ($(this).val()=='BR'){
$("#BR").fadeIn();
$("#LR").hide();
}
else {
$("#LR").fadeIn();
$("#BR").hide();}
	});
		$(".continue").click(function(){
			$(this).closest(".resize").hide();
			$(this).closest(".resize").next().fadeIn();});
	
var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
if (isMobile)
{

	$(".title").css("font-size","3.5em");
	$(".resize").css("padding-top","3em");
	$(".button2").css("font-size","30px");
	$("a").removeClass(".right");
	$("div.half").css("width","90%");
	$("div.third").css("width","70%");
	$(".resize").css("padding-bottom","3em");
	$("img.inactive, img.inactive_one, #color .inline").css("height","400");
	$("#file1, #file2").show();
	$("#uploader1,#uploader2").hide();
	$("#room_type").css("width","80%");
	$("#room_type").css("font-size","2.5em");
	$("#room_width,#room_height,#about").css("font-size","3em");
	$(".midlarge").css("font-size","2em");
	$(".forminput").css("font-size","4em");
	$("#submit_but").css("font-size","3em")
	$(".labels").hide();
	$(".forminput").css("margin", "1em%");
	$(".forminput").css("width","80%");
	$(".inputs").css("width","80%");
	$(".inputs").css("text-align","center")
	$(".inputs").css("padding","0em");
	$(".inputs").css("margin","0em");
	$("#first_name").val('First Name');
	$("#last_name").val('Last Name');
		$("#email").val('Email');
		$("#phone").val('Phone');
		$("#zipcode").val('Zipcode');
		$("#zipcode").val('Zipcode');
	$(".forminput").on("click", function(){
		$(this).val("");
		});
}

 $("#sizes input:text").keyup(function()
 {
            $(this).css("color","gray");

 });

$("#information input:text, #information input:password").keyup(function(){

$(this).css("color","gray");
if ($("#first_name").val()=="Holly"||
$("#first_name").val()==''||
$("#first_name").val()=='First Name'||
$("#last_name").val()=="Golightly"||
$("#last_name").val()==''||
$("#last_name").val()=="Last Name"||
$("#email").val()==''||
$("#email").val()=="cat@gmail.com"||
$("#email").val()=="email"||
$("#phone").val()=="867-5309"||
$("#phone").val()=="phone"||
$("#phone").val()==''||
$("#CVC").val()==''||
$("#CVC").val()=="CVC"||
$("#CVC").val().length<3||
$("#cardnumber").val()==''||
$("#cardnumber").val()=="credit card number" ||
$("#password").val()=="Password"||
$("#password").val()=="Password (min 6 chars.)"
||$("#password").val().length < 6)
{
   $("#submit_but").hide();
}


else 
{
   $("#submit_but").fadeIn();
   //flag_sub=1;
}
});



$("#tweetsend").click(function()
{

var check = $(this).find('#later');

check.prop('checked',!check[0].checked);
if (check.prop('checked')==true)
	{$("#room_pics .continue").show();
	$(this).css("background-color","gray");
	$(this).css("color", "white");
	$(this).css("border", "10px solid white");
	}
	
	else {$("#room_pics .continue").hide();
	$(this).css("background-color","#F0F0F0")
	$(this).css("color", "darkgray");
	}

});
$("#promotioncode").keyup(function(){
  $promotion_code=0;
  $("#designfeeid").val(0);
})
$("#submit_but").click(function(){
	
          flag_sub=0;
	      var d = new Date();
          var curr_date = d.getDate();
          var curr_month = d.getMonth()+1 ; //Months are zero based
          var curr_year = d.getFullYear();
          var nowdate=curr_month+"/"+curr_date+"/"+curr_year;
	 
         if($('#type:checked').size()>0)
         $("#hidesigntype").val($('#type:checked').val());
	 
          if($("#feestatus").val()!="active")
          { 
             $(".error").remove();
	        $("#designfeepart").append('<label class = "error labels"  style="width:400px;text-align:center;">Please choose a design fee</label>');	 
	        return false;	 
          }
	
	 if(($("#promotioncode").val()=="ENTER CODE")||($("#promotioncode").val()==""))
         {
         $("#designfeeid").val(0);
         }  
	    $("#error").remove();

        
	    get_token();
	    
	// 
	    
	});

	});
	
	$(".clickstyle_pics").click(function(){
	$(".resize").hide();
	$("#style_pics").fadeIn();
	});
	
	$(".clickcolors").click(function(){
	$(".resize").hide();
	$("#colors").fadeIn();
	});
	
	$(".clickroom_pics").click(function(){
	$(".resize").hide();
	$("#room_pics").fadeIn();
	});
	
	$(".clicksizes").click(function(){
	$(".resize").hide();
	$("#sizes").fadeIn();
	});
	
	$(".clicktype").click(function(){
	$(".resize").hide();
	$("#type").fadeIn();
	});
	$(".clicksocial").click(function(){
	$(".resize").hide();
	$("#social").fadeIn();
	});
	
       $(function() 
       {
	   $('#expiration_date').datepicker({  
            inline: true,  
            showOtherMonths: true,  
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],  
            });  
      });
      
    $('#CVC,#cardnumber').keydown(
    function(event)
    {
	
	if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
		 
                event.preventDefault(); 
            }   
        }	
	
});

	
	</script>
