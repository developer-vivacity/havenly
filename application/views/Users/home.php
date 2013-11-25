<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<noscript>
<style type="text/css">
        .form_container {display:none;}
</style>

<div class = "well"><p class = "large serif">You Should Enable Javascript.  It is, after all, 2013!</p>
		
	<p class = "sanslight medium">Don't know how?<br>
			Click here for <a class = "black_text" href = "https://support.mozilla.org/en-US/home">Mozilla.</a><br>
			Click here for <a class = "black_text"  href= "https://support.microsoft.com/ph/807">Internet Explorer</a><br>
			Click here for <a class = "black_text"  href= "http://support.google.com/adsense/bin/answer.py?hl=en&answer=12654">Google Chrome</a>
	</p>
</div>
</noscript>
	
<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fineuploader-3.9.1.min.js")?>></script>
<script type="text/javascript" src="https://js.stripe.com/v2/stripe-debug.js">
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/">
</script>

<script type="text/javascript">

 // This identifies your website in the createToken call below
// var flag_sub=0; 

// This identifies your website in the createToken call below
//this plublish key of kbs.php@gmail.com test account. 
 //Stripe.setPublishableKey('pk_test_HRnP8vucwckyxOntuSL0MSC5');
//this plublish key of lee.m.mayer@gmail.com test account. 

//Stripe.setPublishableKey('pk_test_9yS0nvRQ3OHGX0SMmXZ2jDAG');

//this plublish key of lee.m.mayer@gmail.com live account. 

// Stripe.setPublishableKey('pk_test_9yS0nvRQ3OHGX0SMmXZ2jDAG');

// ...// ...
// var str_amount;
// function get_token()
// {
     // str_amount=$("#show_design_fee").html();
      // str_amount=str_amount.replace('$','');

     // //if(($("#CVC").val().length>=3)&&($("#cardnumber").val().length<=16))    
     // if(($("#CVC").val().length>=3))    
      // {
        // $('#submit_but').hide();
		// $('.continue2').append("<div class ='ajax_load button4'> <img src='"+$("#basepath").val()+"assets/Images/ajaxwhiteblack.gif' width='105px' height='105px'></div>");    
         // Stripe.card.createToken({
              
         // name: $('#card-name').val(),
         // number: $('#cardnumber').val(),
         // cvc: $('#CVC').val(),
         // exp_month: $('#cart_month').val(),
         // exp_year: $("#cart_year").val()
        // }, stripeResponseHandler);
       
       // }

// }

// var stripeResponseHandler = function(status, response) 
  // {
  
  // var $form = $('#payment-form');

  // if(response.error) 
  // {
    // $form.find('.payment-errors').text(response.error.message);
	// $('.payment-errors').show();
	// $('#submit_but').show();
	// $('.ajax_load').hide();
    // flag_sub=0;
  // } 
  // else if(status==200) 
  // {
   // // token contains id, last4, and card type
    // var token = response.id;
    // $("#tokencode").val(token);
    // flag_sub=1;
    // $.post($("#basepath").val()+"index.php/Cart/site/use_token", {stripeToken :token,amount:str_amount,description:$("#email").val()},function(data)
    // {
       
    // if(data==1)
    // {
        // $("#user_login_form").submit();
     // }
    // else
    // {

      // $form.find('.payment-errors').text(data);
	  // $('.payment_errors').show();
	  // $(".ajax_load").hide();
	 // $('#submit_but').show();
    // }    
// })   

   // }
// };

</script>
<div class = "white">
<div class = "white text-center form_container">
<div class = "logo">
<a href = "<?php echo base_url(); ?>"><img src = "<?php echo base_url('assets/Images/Blue_dalle.png');?>" height = "120px"></a>
</div>

<form id="user_login_form" name="user_room_form" method="post" action="<?php echo base_url('index.php/Contests/site/room_submit');?>" enctype="multipart/form-data">
<input type="hidden" name="basepath" id="basepath" value="<?php echo base_url();?>">	
	<div id = "intro" class = "resize">
	<div class ="formtext">
	<p class = "question_heading">
		It's Nice to Meet You.
	</p>
			
	<p class = "question_description">
	We're going to ask you just a few questions to get a sense of your style and your needs.  There are no wrong answers.  And don't worry, our designer will call you to talk a little further.
	</p>
	</div>		
			<a class = "button4 medium white_text" id = "introbutton" onClick="_gaq.push(['_trackEvent', 'Userform', 'Intro', 'Introf']);">
			Continue &rarr;</a>
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
<div class = "formtext">
		<p class = "question_heading">
		The Style Question</p>
		<p class = "question_description">
		Pick a few pictures you love. This helps us match you up with the <span>perfect designer.</span></p>
		
		<label class = "serif" for="room_type">Which room are we decorating?</label>
		<select name="room_type" id="room_type">
			<option value = "none"></option>
			<option value="BR" >Bedroom</option>
			<option value="LR">Living/Dining</option>
		</select>
	<BR><BR>
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
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR13.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 14 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR14.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 15 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR15.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 16 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR16.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 17 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR17.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 18 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR18.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 19 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR19.jpg');?> height=270em></div>
		<div><input type="checkbox" name="style[]" value = 20 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR20.jpg');?> height=270em></div>
		</div>
		
		
</div>
<div class = "continue horizontal"><br>
	<!--<a class = "button2 login gray">Login, if this is old</a>-->
	<a class = "button4 midsmall" onClick="_gaq.push(['_trackEvent', 'Userform', 'Style', 'Style Question']);">
	Keep Going &rarr;</a><BR><BR>
</div>
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
	<div class = "formtext">
	<p class = "question_heading">The Color Question</p><br>
		<p class = "question_description"> Which <span>appeal to you</span> most for your room?</p><br><br>
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
</div>
	
	<div class = "continue horizontal"><br>
	
	<a class = "button4 midsmall"  onClick="_gaq.push(['_trackEvent', 'Userform', 'Colors', 'Color Question']);">
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
<div class = "formtext">
<p class = "question_heading">The Picture Section</p><br>
<p class = "question_description"> Only your designer sees this, so you don't have to be too embarrassed about your spaceship sheets. </span></p>
<br>
<input type = "hidden" id = "siteurl" value = <?php echo base_url();?>/>
<div class = "row">
<div class = "span5"><BR><BR><BR>
<div id = "tweetsend" >
	<input type="checkbox" class = "inline top" name="later" id="later" value="later"/>
	<p class = "medium inline"> 
	Click here to email (hello@havenly.com) your pictures to us later.</p>
</div></a></div>
<div class = "span5">
<p class = "sanslight midsmall">Or upload pictures of all four walls of your room, if you can.</p><BR><BR>
<div id = "phoneerror" class = "small dark_gray_text sanslight">Use your phone to take pictures of the room(IOS 6+)</div>


<div id = "first_photo" class= "photo_upload inline"> 
	<div>
		<div id="uploader1">.</div>
		<div id = "image1"></div>
		<input type = "hidden" id = "room_file1", name = "room_file1"/>
	</div>	
	</div>

<div id = "second_photo" class= "photo_upload inline">
	<div>
		<div id="uploader2">.</div>
		<div id = "image2"></div>
		<input type = "hidden" id = "room_file2", name = "room_file2"/>
		</div>	
	</div>

<div id = "third_photo" class= "photo_upload inline">

		<div id="uploader3">.</div>
		<div id = "image3"></div>
		<input type = "hidden" id = "room_file3", name = "room_file3"/>
		</div>	

<div id = "fourth_photo" class= "photo_upload inline">

		<div id="uploader4">.</div>
		<div id = "image4"></div>
		<input type = "hidden" id = "room_file4", name = "room_file4"/>
		</div>	
		
		
	</div>
	
	
	</div></div>

	
	

<div class = "continue horizontal"><br>
	<!--<a class = "button2 login gray">Login, if this is old</a>-->
	<a class = "button4 midsmall" onClick="_gaq.push(['_trackEvent', 'Userform', 'Picture', 'Picture Question']);">Keep Going &rarr;</a><br><br>
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
<div class = "formtext">
	<p class = "question_heading">The Details Question</p><br>
	<p class = "question_description">Tell us a little about your room. <span>And what you're looking for.</span></p><br><br>
		<div class = "row">
		
		<div class = "span5">
		<p class = "midsmall sanslight center dark_gray_text">Rough room dimensions:<p class = "small condensed dark_gray_text"> (in feet)</span></p></p><br>
		<input type="text" name="room_width" value="width" id = "room_width" maxlength="6" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};"/> 
			<br>
		x  <br>
		<input type="text" name="room_height" value="length" id = "room_height" maxlength="6" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};"/>
		</div>
		<div class = "span5">
			<p class = "midsmall sanslight center dark_gray_text ">A bit about what you want, want to keep, want to buy:</p><br>
			<BR><textarea name="about" id="about" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};">I like the couch, but need your help with everything else, including a new coffee table</textarea>
	  </div></div></div>
	  <div class = "continue horizontal"><br>
		<a class = "button4" onClick="_gaq.push(['_trackEvent', 'Userform', 'Roominfo', 'Room Information']);">Keep Going &rarr;</a><br><br>
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
	 <div class = "formtext">
	  <p class ="question_heading">The Budget Question</p><br>
	  <p class = "question_description">Some people spend a few hundred, others spend thousands. We just need a ballpark amount.</p><br>
	<div class = "row">
	<p class = "sanslight midsmall">  How much money do you think you want to spend on your room?</p>
	<input type = "text" id = "budget" name = "budget" value = "Budget" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};">
	</div>
	</div>
		
		
		<div class = "continue horizontal"><br>
	
			<a class = "button4 midsmall" onClick="_gaq.push(['_trackEvent', 'Userform', 'Budget', 'Budget']);">Keep Going &rarr;</a><br><br>		
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
	<div class = "formtext">
	<p class ="question_heading">Getting to Know You.</p><br>
	<p class = "question_description">
		OPTIONAL:  If you feel comfortable, let us see some of your social media profiles.</p>  <br><BR>
		<P class = "small sanslight">We won't use this for anything other than to decorate.  <br>
		(Please note, we can only view them if they are public)</p>
		<br><br><br><br>
		<div class = "row">
		<div class = "span4 text-right middle">
		
		<img src = <?php echo base_url('assets/Images/fblarge.png');?> height = 120>
		</div>
		<div class = "span5">
		<input type = "text" name = "facebook" value = "Link to Your Facebook Page" id = "facebook"
		onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" 
		/>
		</div></div><BR><BR>
		<div class = "row">
		<div class = "span4 text-right">
		<img src = <?php echo base_url('assets/Images/pinlarge.png');?> height = 120>
		</div>
		<div class = "span5">
		<input type = "text" name = "pinterest" value = "Link to a Pinterest Board" id = "pinterest"
		onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" 
		/>
		</div></div><BR><BR>
		<div class = "row">
		<div class = "span4 text-right">
		<img src = <?php echo base_url('assets/Images/instaicon.png');?> height = 120>
		</div>
		
		<div class = "span5">
		<input type = "text" name = "instagram" value = "Your Instagram Handle" id = "instagram"
		onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" 
		/>
		</div></div></div>
	
	
	<div class = "continue horizontal"><br>
	
			<a class = "button4" onClick="_gaq.push(['_trackEvent', 'Userform', 'Social', 'Social Media']);">Keep Going &rarr;</a><br><br>		
	</div>
	</div>
	<!-------------------------@@@@@@@@@@@@@@@@@@@@@----------------------------------->
	<div id = "information" class = "resize">
	<div class = "formtext">
		<p class = "question_heading">Create Your Account</p><br>
		<p class = "question_description">Your designer will be in <span>touch in three business days.</span></p>
	<div class = "row">
	<div class = "span5 offset2 text-left">
	<br><br><br>
	<div class = "row">
	<label class = "span2 formlabel" for="first_name">First Name:</label>
	<input type="text" name="first_name" value="Holly" id="first_name" class = "forminput inline" maxlength="30" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br></div>
			
	<div class = "row">
	<label class = "span2 formlabel" for="last_name">Last Name:</label> 
	<input type="text" name="last_name" value="Golightly" id="last_name" class = "forminput"  maxlength="30"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br>
			</div>
			
	<div class = "row">
	<label class = "span2 formlabel" for="email">Email:</label>
	<input type="text" name="email" value="cat@gmail.com" id="email" class = "forminput"  maxlength="50"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br></div>
		
	<div class = "row">
	<label class = "span2 formlabel" for="phone">Phone Number:</label>
	<input type="text" name="phone" value="867-5309" id="phone" class = "forminput"  maxlength="100"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br>
		</div>
		
	<div class = "row">
	<label class = "span2 formlabel" for="zipcode">Zipcode: </label>
	<input type="text" name="zipcode" value="10024" id="Zipcode" class = "forminput"  maxlength="5"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br></div>
		
	<div class = "row">
	<label class = "span2 formlabel" for="password">Pick a Password: </label>
	<input type="text" name="password" value="Password (min 6 chars.)" id="password" class = "forminput pwd" maxlength="50"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
	</div>
	</div>	
	</div>	
		<!-------------------------------------Add Design Fee----------------------------------------------------

		<div class= "span5 inline border text-left infosection" >

		<span id="designfeepart"></span>
		<label id = "designlabel" class = "span2 serif medium padding">Design Fee: </label>
		<span id="show_design_fee" class = "span2 inline middle medium condensed pink_text"></span>
			<BR>
		<div class = "span4 sanslight small dark_gray_text">Try us risk free! If you aren't satisfied after your first designer call, we will refund your design fee. Please get in touch at (888)978-3152 or hello@havenly.com with any questions.</div>
		<hr class = "style span4"><br>
	
		
		<input type="hidden" value="0" name="designfeeid" id="designfeeid"/>
		

		<input type="hidden" value="active" name="feestatus" id="feestatus"/>
		
		<input type="hidden" value="null" name="hidpromotioncode" id="hidpromotioncode">
                
                <input type="hidden" value="incomplete" name="hidesigntype" id="hidesigntype" >
                <input type="hidden"  name="tokencode" id="tokencode"/>
		<!----------end design fee hidden variables------>
		
				<!--<div class="horizontal">
		<div class="labels" id="designtype">&nbsp;</div>
		</div>
		<br/>
		<div id="codepromotion" class = "row">
		<label class = "span2 formlabel" for="promotioncode">Promotion Code:</label>
		<input type="text" name="promotioncode" value="Promotion Code:" id="promotioncode" class = "forminput middle"  maxlength="6"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
		<input type="button" class = "button4 white_text condensed small" name="Apply" value="Apply" id="designApply"/>
		<div id = "promoerror" class="span4 sanslight small"></div>
		</div>
		
		<div id="payment-form">
		   
		<div class="row">
		
		  <label class = "span2 formlabel" for="cardtype">Card Type: </label>
		<span class="alert-error span4 alert payment-errors"><BR><BR></span>
		  <div class = "inline"> 
               
               <select id="card-name" style= "width:80%" class = "forminput">
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
		<div class="row">
		<div class = "payment-error alert alert-error"></div>
		<label class = "span2 formlabel" for="cardnumber">Card Number:</label>
		<input type="text" data-stripe="cardnumber" value="Card Number" id="cardnumber" class = "forminput"  maxlength="16"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
		<input type="text" data-stripe="CVC" id="CVC" value="CVC" class = "forminput" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" style="width:9%" maxlength="4"/>
		</div>
		<div class="row">
		<div for="cardnumber"  class = "span2 formlabel">Expiration Date </div>
	<select data-stripe="exp-month" class = "span1 forminput" id="cart_month">
 <?php

   // for($i=1;$i<=12;$i++)
   // {
       // echo '<option value='.$i.'>'.$i.'</option>';	
   // }
 ?>	
</select>
<select data-stripe="exp-year" class = "forminput span1" id="cart_year">
  <?php
   // for($year=2013;$year<=2020;$year++)
   // {
    // echo '<option value='.$year.'>'.$year.'</option>';	
    // }
?>	
</select> 
</div>
	<div>

	</div>	
	</div>	</div></div><BR><BR>
	
	</div>
--->
	
</div>
<div class = "continue2 horizontal">
<input type="button"  id = "submit_but" class="button4 sanslight midsmall white_text" value="Submit"  onClick="_gaq.push(['_trackEvent', 'Userform', 'Payment', 'Payment']);"> </div>
	</div>
	</form>
	</div>

	<div class = "push">
	</div>

	
	<script>

$(document).ready(function(){	 
	var siteurl=$("#siteurl").val();
	$(".alert,#imgspan").hide();  

	
	$("#intro").fadeIn("slow");
	$("#phoneerror").hide();
	
$("#room_video, #BR, #LR,  #loading, .continue, .login, .cbox, #later, #submit_but").hide();
$("#social, #room_pics, #style_pics,#colors,#type,#sizes, #information").hide();

	$("#social .continue").show();
	$("#introbutton").click(function(){
	                 
		$("#intro").hide();
		$("#style_pics").fadeIn();

		});





$("#tweetsend").click(function()
{

	var check = $(this).find('#later');

	check.prop('checked',!check[0].checked);
if (check.prop('checked')==true)
	{$("#room_pics .continue").show();
	$(this).css("background-color","#00CDBF");
	$(this).css("color", "white");
	$(this).css("border", "10px solid white");
	}
	
	else {$("#room_pics .continue").hide();
	$(this).css("background-color","white")
	$(this).css("color", "black");
		$(this).css("border", "10px solid black");
	}

});
					 

$("#uploader1").fineUploader({
		 text: {
            uploadButton: "<div class = 'uploadbut button4 white_text square'>Click to Add</div>"
        },
	 debug: true,
	 multiple: false,
     request: {
                endpoint: siteurl+'/index.php/Users/site/upload_room_pic'
            },
	validation: {
				allowedExtensions: ['jpeg', 'jpg', 'gif', 'JPG', 'png']
				},
	camera:{
			ios:true
			}
        }).on('submit', function (event, id, filename) {
    		$("#uploader1 .qq-upload-button").html("<div class = 'button4'><img src ='"+siteurl+"/assets/Images/ajaxwhiteblack.gif' height='150px'></div>");
			$("#uploader1 .qq-upload-list").hide();
		}).on('complete', function(event, id, fileName, responseJSON) {
				if (responseJSON.success) {
					var data = responseJSON.filename;
					var newimage= '<BR><BR><img src="https://s3.amazonaws.com/easableimages/'+data+'" width=200>';
					$("#image1").html(newimage);
					 $("#uploader1 .qq-uploader").hide();
					 $("#room_pics .continue").show();
					 
				} });
					
	
$("#uploader2").fineUploader({
		 text: {
            uploadButton: "<div class = 'uploadbut button4 white_text square'>Click to Add</div>"
        },
	 debug: true,
	 multiple: false,
     request: {
                endpoint: siteurl+'/index.php/Users/site/upload_room_pic'
            },
	validation: {
				allowedExtensions: ['jpeg', 'jpg', 'gif', 'JPG', 'png']
				},
	camera:{
			ios:true
			}
        }).on('submit', function (event, id, filename) {
    		$("#uploader2 .qq-upload-button").html("<div class = 'button4'><img src ='"+siteurl+"/assets/Images/ajaxwhiteblack.gif' height='150px'></div>");
			$("#uploader2 .qq-upload-list").hide();
		}).on('complete', function(event, id, fileName, responseJSON) {
				if (responseJSON.success) {
					var data = responseJSON.filename;
					var newimage= '<BR><BR><img src="https://s3.amazonaws.com/easableimages/'+data+'" width=200>';
					$("#image2").html(newimage);
					 $("#uploader2 .qq-uploader").hide();
					 $("#room_pics .continue").show();
					 
				} });				
	

$("#uploader3").fineUploader({
		 text: {
            uploadButton: "<div class = 'uploadbut button4 white_text square'>Click to Add</div>"
        },
	 debug: true,
	 multiple: false,
     request: {
                endpoint: siteurl+'/index.php/Users/site/upload_room_pic'
            },
	validation: {
				allowedExtensions: ['jpeg', 'jpg', 'gif', 'JPG', 'png']
				},
	camera:{
			ios:true
			}
        }).on('submit', function (event, id, filename) {
    		$("#uploader3 .qq-upload-button").html("<div class = 'button4'><img src ='"+siteurl+"/assets/Images/ajaxwhiteblack.gif' height='150px'></div>");
			$("#uploader3 .qq-upload-list").hide();
		}).on('complete', function(event, id, fileName, responseJSON) {
				if (responseJSON.success) {
					var data = responseJSON.filename;
					var newimage= '<BR><BR><img src="https://s3.amazonaws.com/easableimages/'+data+'" width=200>';
					$("#image3").html(newimage);
					 $("#uploader3 .qq-uploader").hide();
					 $("#room_pics .continue").show();
					 
				} });		

		$("#uploader4").fineUploader({
		 text: {
            uploadButton: "<div class = 'uploadbut button4 white_text square'>Click to Add</div>"
        },
	 debug: true,
	 multiple: false,
   
     request: {
                endpoint: siteurl+'/index.php/Users/site/upload_room_pic'
            },
	validation: {
				allowedExtensions: ['jpeg', 'jpg', 'gif', 'JPG', 'png']
				},
	camera:{
			ios:true
			}
        }).on('submit', function (event, id, filename) {
    		$("#uploader4 .qq-upload-button").html("<div class = 'button4'><img src ='"+siteurl+"/assets/Images/ajaxwhiteblack.gif' height='150px'></div>");
			$("#uploader4 .qq-upload-list").hide();
		}).on('complete', function(event, id, fileName, responseJSON) {
				if (responseJSON.success) {
					var data = responseJSON.filename;
					var newimage= '<BR><BR><img src="https://s3.amazonaws.com/easableimages/'+data+'" width=200>';
					$("#image4").html(newimage);
					 $("#uploader4 .qq-uploader").hide();
					 $("#room_pics .continue").show();
					 
				} });	
	
	
		$("#room_pics .continue").click(function(){
			var filename1 =$("#image1 img").attr('src');
			$("#room_file1").val(filename1);
			var filename2 =$("#image2 img").attr('src');
			$("#room_file2").val(filename2);
			var filename3 =$("#image3 img").attr('src');
			$("#room_file3").val(filename3);
			var filename4 =$("#image4 img").attr('src');
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
		
			

		
$("#type input").keyup(function(){
		if ( $("#budget").val()!='' && $("#budget").val()!="budget"){
	
					$("#type .continue").fadeIn();
				}
				else {$("#type.continue").hide();}
			
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
		

 $("#sizes input:text, #sizes textarea, #type input:text").keyup(function()
 {
            $(this).css("color","gray");

 });
 
 $("#information select").change(function()
 {
   $(this).css("color","gray");

 });
 
 
  $('.pwd').click(function(){
				$(this).get(0).type='password';
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

	$(".formlabel").hide();
	$("#first_name").val('First Name');
	$("#last_name").val('Last Name');
	$(".infosection").removeClass('border');
	$("#information a").css("color","gray");
	$("#email").val('Email');
	$("#phone").val('Phone');
	$("#zipcode").val('Zipcode');
	$("#information .border").removeClass("border");
	$("#phone_error").show();
	$(".forminput").on("click", function(){
		$(this).val("");
		});
}

 
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
// $("#CVC").val()==''||
// $("#CVC").val()=="CVC"||
// $("#CVC").val().length<3||
// $("#cardnumber").val()==''||
// $("#cardnumber").val()=="credit card number" ||
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



$("#type .continue").click(function()
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

        
	 
	 
      var str="Enter Promotion Code";
	if($("#promotioncode").val()==str)	 
        {
               
                 if($("#codepromotionerror").length==0)	 
	        $("#promoerror").html('<div class = "alert alert-error" id="designtypeerror">Enter Promotion Code</div>')
                 return false;
          }
          if($("#feestatus").val()!="active")
          {
	        if($("#codepromotionerror").length==0)	 
	        $("#promoerror").html('<div class = "alert alert-error" id="designtypeerror">Invalid Code</div>')
                 return false;	 
          }
          $("#promoerror").html('<div id="imgspan"><img src="'+$("#basepath").val()+'assets/Images/ajax-loader.gif" width="25px" height="25px" id="designtypeerrorimg"></div>')
          $.post($("#basepath").val()+"index.php/Cart/site/promotion_code", {promotioncode :$("#promotioncode").val(),type:designtype}, 
          function(data)
          {
		    if(data.length>0)
            { 
		   var data= data.split('-@-');
		   $promotion_code=data[0];
	   
                   
                   $("#hidpromotioncode").val($("#promotioncode").val());  
                   if($promotion_code==1)
                   {
                  
                   $("#show_design_fee").html(data[2]); 
                   $("#designfeeid").val(data[1]); 
				   $(".alert,#imgspan").hide();
                   }                 
                   else
                   {
				 
                   $("#promoerror").html('<div class = "alert alert-error" id="designtypeerror">Invalid Code</div>')
                   $("#designfeeid").val(0);                     
                   }                    
                   return false; 
           }
           else
           {
		   $promotion_code=0;
	            $("#promoerror").html('<div class = "alert alert-error" id="designtypeerror">Invalid Code</div>')
            } 
          })
	
	
	});
	

	
	
	$("#submit_but").click(function(){
	 $('#submit_but').hide();
	 $('.continue2').append("<div class ='button4'> <img src='"+siteurl+"assets/Images/ajaxwhiteblack.gif' width='105px' height='105px'></div>");    
	
	$("#user_login_form").submit();
          // flag_sub=0;
	      // var d = new Date();
          // var curr_date = d.getDate();
          // var curr_month = d.getMonth()+1 ; //Months are zero based
          // var curr_year = d.getFullYear();
          // var nowdate=curr_month+"/"+curr_date+"/"+curr_year;
	 
         // if($('#type:checked').size()>0)
         // $("#hidesigntype").val($('#type:checked').val());
	 
          // if($("#feestatus").val()!="active")
          // { 
            // $(".error").remove();
	        // $("#designfeepart").append('<label class = "error labels"  style="width:400px;text-align:center;">Please choose a design fee</label>');	 
	        // return false;	 
          // }
	
	 // if(($("#promotioncode").val()=="ENTER CODE")||($("#promotioncode").val()==""))
         // {
         // $("#designfeeid").val(0);
         // }  
	    // $("#error").remove();

        
	    // get_token();
	    
	// 
	    
	});

	});
	

	
	</script>
