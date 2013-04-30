<?php 
	include(APPPATH.'/views/templates/header4.php');
?>
<a id = "hidden_link" href = "#details"></a>
<div class = "center"><br><br><br>
</div>
<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fineuploader-3.4.1.min.js")?>></script>

<script type="text/javascript" src=<?php echo base_url("assets/Scripts/ajaxfileupload.js")?>></script>
<br>



<noscript>
<style type="text/css">
        .form_container {display:none;}
  </style>
<br><br>
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

<form name="user_room_form" method="post" action="<?php echo base_url('index.php/Contests/site/room_submit');?>" enctype="multipart/form-data">

<div id = "room_pics" class = "resize" ><br><br>
	<p class = "title dark_gray_text">Let's Get Started. </p><br>
	<p class = "text1 dark_gray_text"> A couple questions to help us better serve you.  <br>We'll be quick.  <span>We promise.</span></p>
	<br><br><br><br>
<div id = "first_photo"> 
	<p class = "text1 midlarge dark_gray_text">Start by uploading a pic of the room:</p><br>
	<div>
		<div id="uploader1">.</div>
		<input type="hidden" name="room_file1" id="room_file1" />
		<div id = "file1">
			<a class = "button2 teal" id = "room_button1" onclick = '$("#room_photo1").click();'>Browse</a>
			<input type = "file" name = "room_photo1" id = "room_photo1"/>
			<div id = "image1">.</div>
		</div>	
	</div>
</div>
<div id = "second_photo">
	<p class = "text1 dark_gray_text"><span>Share Another.</span> Go right ahead</p><br>
	<div>
		<div id="uploader2">.</div>
		<input type="hidden" name="room_file2" id="room_file2" />
		<div id = "file2">
			<a class = "button2 teal" id = "room_button2" onclick = '$("#room_photo2").click();'>Browse</a>
			<input type = "file" name = "room_photo2" id = "room_photo2"/>
			<div id = "image2">.</div>
		</div>	
	</div>
</div>
<div class = "horizontal"><a>
<div id = "tweetsend" class = "padding_small half border auto light_gray">
	<input type="checkbox" class = "inline top" name="later" id="later" value="later"/><p class = "medium teal_text text1 inline"> Click here to tweet it to us (@thehavenly)<br> or email it to us.(hello@havenly.com)</p>
</div></a></div>
<br><br><hr class = "style half"><br><br><br><br><br>
<div class = "continue horizontal"><br>
	<!--<a class = "button2 login gray">Login, if this is old</a>-->
	<a class = "button2 pink" onClick="_gaq.push(['_trackEvent', 'room_photo', 'click', 'userform', '5']);">Keep Going &rarr;</a><br><br>
</div>
</div>
	<div id = "style_pics" class = "resize">
		<p class = "title dark_gray_text">Select the Styles You Like </p><br>
		<p class = "text1 dark_gray_text"> This helps us match you up with the <span>perfect designer</span></p>
		<br><br>
		<label for="room_type">Which Room Type?</label>
		<select name="room_type" id="room_type">
			<option value = "none"></option>
			<option value="BR" >Bedroom</option>
			<option value="LR">Living Room</option>
	</select><br><br>
		
	<div id = "BR" class = "padding_small">
	<div>
		<input type="checkbox" name="style[]" value = 1 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR1.jpg');?> height=230em></div>
		<div><input type="checkbox" name="style[]" value = 2 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR2.jpg');?> height=230em></div>
		<div><input type="checkbox" name="style[]" value = 3 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR3.jpg');?> height=230em></div>
		<div><input type="checkbox" name="style[]" value = 4 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR4.jpg');?> height=230em> 
		</div><div><input type="checkbox" name="style[]" value = 5 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR5.jpg');?> height=230em>
		</div><div><input type="checkbox" name="style[]" value = 6 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR6.jpg');?> height=230em>
		</div><div><input type="checkbox" name="style[]" value = 7 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR7.jpg');?> height=230em>
		</div><div><input type="checkbox" name="style[]" value = 8 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR8.jpg');?> height=230em>
		</div><div><input type="checkbox" name="style[]" value = 9 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR9.jpg');?> height=230em>
		</div><div><input type="checkbox" name="style[]" value = 10 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/Bedroom/BR10.jpg');?> height=230em></div>
		</div>
		
		<div id = "LR" class = "padding_small">
	<div>
		<input type="checkbox" name="style[]" value = 1 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR1.jpg');?> height=230em></div>
		<div><input type="checkbox" name="style[]" value = 2 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR2.jpg');?> height=230em></div>
		<div><input type="checkbox" name="style[]" value = 3 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR3.jpg');?> height=230em></div>
		<div><input type="checkbox" name="style[]" value = 4 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR4.jpg');?> height=230em> 
		</div><div><input type="checkbox" name="style[]" value = 5 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR5.jpg');?> height=230em>
		</div><div><input type="checkbox" name="style[]" value = 6 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR6.jpg');?> height=230em>
		</div><div><input type="checkbox" name="style[]" value = 7 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR7.jpg');?> height=230em>
		</div><div><input type="checkbox" name="style[]" value = 8 class='cbox' />
		<img class = "inactive" src = <?php echo base_url('assets/Images/LivingRoom/LR8.jpg');?> height=230em>
		</div>
		</div>
		
		<br>
<hr class = "style half"/><br><br><br><br><br><div class = "continue horizontal"><br>
	<!--<a class = "button2 login gray">Login, if this is old</a>-->
	<a class = "button2 pink" onClick="_gaq.push(['_trackEvent', 'style_photo', 'click', 'userform', '5']);">Keep Going &rarr;</a><br><br>
</div><br><br>
</div>
	<div id = "colors" class = "resize">
	<p class = "title dark_gray_text">Select Some Colors You'd Like </p><br>
		<p class = "text1 dark_gray_text"> Which <span>appeal to you</span> most for your room?</p><br><br>
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
	
	<a class = "button2 pink"  onClick="_gaq.push(['_trackEvent', 'color_photo', 'click', 'userform', '5']);">Keep Going &rarr;</a><br><br>
</div>
</div>	

	

	<div id = "sizes" class = "resize" >
	<p class = "title dark_gray_text">Just a Teeny Bit About the Room </p><br>
		<p class = "text1 dark_gray_text"> That way we know what <span>we're looking at.</span></p><br><br>
		<div class = "center half">
		<p class = "midlarge text1 center dark_gray_text">Rough room dimensions:<p class = "small text1 dark_gray_text"> (in feet)</span></p><br>
		<input type="text" name="room_width" value="width" id = "room_width" maxlength="6" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};"/> 
			<br>
		x  <br>
		<input type="text" name="room_height" value="height" id = "room_height" maxlength="6" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};"/>
		</div>
		<div class = "center half">
			<p class = "midlarge text1 center dark_gray_text ">Quick note to us:</p><br>
			<textarea name="about" id="about" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};">I like the couch, but need your help with everything else, including a new coffee table</textarea>
	  </div><br><br><br><br>
	  <div class = "continue horizontal"><br>
		<a class = "button2 pink" onClick="_gaq.push(['_trackEvent', 'room_desc', 'click', 'userform', '5']);">Keep Going &rarr;</a><br><br>
</div>	</div>


	  <div id = "type" class = "resize">
	  <p class ="title dark_gray_text">How Much Help Do You Need?</p><br>
	  <p class = "text1 dark_gray_text">Are you a <span>total beginner</span>, or do you <span>just need help </span>putting it all together?</p><br>
	  
	  <div class = "third padding_small inline top">
		<img class = "inactive_one" src = <?php echo base_url('assets/Images/Notempty.jpg');?> height=200em><br>
		<input type="radio" name="type" value = "incomplete" class='cbox' />
		<p class = "midlarge quicksand gray_text">Just a Little Help</p><br>
		<p class = "text1 seventy gray_text small">We'll work around your 'big' pieces and suggest items to make your place the coolest one in school.</p>
		</div>	 
<div class = "third inline padding_small top">
	  <img class = "inactive_one" src = <?php echo base_url('assets/Images/Empty.jpg');?> height=200em><br>
	  <input type="radio" name="type" value = "complete" class='cbox' />
	  <p class = "midlarge quicksand gray_text">Complete Makeover</p><br>
	  <p class = "text1 seventy small gray_text">Just moving in?  Hate all your furniture?  This option comes with all the pieces to make your room beautiful</p>
	  </div>		
		<br><br><br><br><hr class = "style half"/><br>
		<div class = "continue horizontal"><br>
	
			<a class = "button2 pink" onClick="_gaq.push(['_trackEvent', 'type', 'click', 'userform', '5']);">Keep Going &rarr;</a><br><br>		
		</div>
		
	</div>
	<div id = "information" class = "resize">
		<p class = "title dark_gray_text">Now Let Us Get to Know You</p><br>
		<p class = "text1 dark_gray_text">We'll be in <span>touch.</span></p><br><br>
		<div class = "labels">
		
			<label class = "formlabel" for="first_name">First Name:</label><br><br>
			<label class = "formlabel" for="last_name">Last Name:</label> <br><br>
			<label class = "formlabel" for="email">Email:</label><br><br>
			<label class = "formlabel" for="phone">Phone Number:</label><br><br>
			<label class = "formlabel" for="address">Address:</label><br><br>
			<label class = "formlabel" for="zipcode">Zipcode: </label><br><br>
			<label class = "formlabel" for="password">Pick a Password: </label><br>
			</div>
		<div class = "inputs">
		<input type="text" name="first_name" value="Holly" id="first_name" class = "forminput" maxlength="30" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br>
		<input type="text" name="last_name" value="Golightly" id="last_name" class = "forminput"  maxlength="30"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br>
		<input type="text" name="email" value="cat@gmail.com" id="email" class = "forminput"  maxlength="50"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br>
		<input type="text" name="phone" value="867-5309" id="phone" class = "forminput"  maxlength="100"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br>
		<input type="text" name="address" value="1 Fifth Avenue" class = "forminput"  id="address" maxlength="50"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br>
		<input type="text" name="zipcode" value="10024" id="zipcode" class = "forminput"  maxlength="10"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" /><br>
		<input type="password" name="password" value="Password" id="password" class = "forminput" maxlength="50"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
		</div>
		<br><br><hr class = "style half"/><br><input type="submit"  id = "submit" class="button2 teal pink" value="Submit"  onClick="_gaq.push(['_trackEvent', 'pers_info', 'click', 'userform', '5']);" /> 
	</div>
	</form>
	</div>
	
	

	
	
	<script>

	
	
	$(document).ready(function(){	  
	
	$("#room_pics").fadeIn("slow");

		var left = ($(window).width())/2;
	$("#loading-image").css("left",left);
	
	 $(" #file1, #file2, #BR, #LR, #second_photo, #loading, .continue, .login, .cbox, #later, #submit").hide();
   $("#style_pics,#colors,#type,#sizes, #information").hide();
	
	
		 $('#uploader1').fineUploader({
				request: {
				endpoint: '/test/Design3/index.php/Users/site/upload_room_pic'
				},
				debug:true,
				multiple: false,
				validation: {
				allowedExtensions: ['JPG', 'jpeg', 'jpg', 'gif', 'png']
				
				},
				text: {
				uploadButton: '<a class="button2 teal"> Browse</a>'
				}
				}).on('complete', function(event, id, fileName, responseJSON) {
				if (responseJSON.success) {
					var data = responseJSON.filename;
					var newimage= '<img src="https://s3.amazonaws.com/easableimages/'+data+'" height=250>';
					$(this).append(newimage);
					$("#second_photo").show();
					$("#room_pics .continue").show();
					$("#uploader1 .qq-uploader").hide();
				}
				});
			
	
		$('#uploader2').fineUploader({
				request: {
				endpoint: '/test/Design3/index.php/Users/site/upload_room_pic'
				},
				debug:true,
				multiple: false,
				validation: {
				allowedExtensions: ['jpeg', 'jpg', 'gif', 'JPG', 'png']
				
				},
				text: {
				uploadButton: '<a class="button2 teal"> Browse</a>'
				}
				}).on('complete', function(event, id, fileName, responseJSON) {
				if (responseJSON.success) {
					var data = responseJSON.filename;
					var newimage= '<img src="https://s3.amazonaws.com/easableimages/'+data+'" height=250>';
					$(this).append(newimage);
					$("#uploader2 .qq-uploader").hide();				 
				}
				});
	
	
	
	
	$("#room_photo1").change(function(){
	$("#loading").show();
	var filename=$("#room_photo1").val();
	$.ajaxFileUpload({
	dataType : 'JSON',
	url :'/test/Design3/index.php/Users/site/upload_room_pic_phone',
	secureuri :false,
	fileElementId :'room_photo1',
	data: {'id':'room_photo1'},
	success: function (data){
	var newimage = "<img src ='https://s3.amazonaws.com/easableimages/"+data+"' height=200em>";
	$("#image1").html(newimage);
	$("#image1").show();
	$("#loading").hide();
	$("#second_photo").show();
	$("#room_button1").hide();
	// $(".login").show();
}
});
$("#room_pics .continue").show();
});


// $("#later").click(function(){
	// if($("#later").prop('checked')==true)
	// {$("#room_pics .continue").show();}
	
	// else {$("#room_pics .continue").hide();}
	// });


$("#room_photo2").change(function(){
	$("#loading").show();
	var filename=$("#room_photo2").val();
	$.ajaxFileUpload({
	dataType : 'JSON',
	url :'/test/Design3/index.php/Users/site/upload_room_pic_phone',
	secureuri :false,
	fileElementId :'room_photo2',
	data: {'id':'room_photo2'},
	success: function (data){
	var newimage = "<img src ='https://s3.amazonaws.com/easableimages/"+data+"' height=200em>";
	$("#image2").html(newimage);
	$("#image2").show();
	$("#loading").hide();
	$("#room_button2").hide();
	// $(".login").show();
}


});

});
	
	
	
		$("#room_pics .continue").click(function(){
			var filename1 =$("#first_photo img").attr('src');
			$("#room_file1").val(filename1);
			var filename2 =$("#second_photo img").attr('src');
			$("#room_file2").val(filename2);
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
		
				
		$(".inactive_one").click(function(){ 
		 $(".inactive_one").removeClass('active');
		 $(this).toggleClass('active');
		 var checkbox = $(this).parent().find('.cbox');
			checkbox.prop('checked','checked');
		$(this).parent().parent().find(".continue").fadeIn();
		});
		
		
		$("#sizes input").keyup(function(){
		var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
		var str = $("#room_width").val();
		if(numberRegex.test(str)){
			var str = $("#room_height").val();
				if(numberRegex.test(str)){
				$(this).parent().parent().find('.continue').fadeIn();
				
				}
				else {$(this).parent().parent().find('.continue').hide();}
			} else {$(this).parent().parent().find('.continue').hide();}
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
	$("#submit").css("font-size","3em")
	$(".forminput").css("width","100%");
	$(".labels").hide();
	$(".inputs").css("width","90%");
	$(".inputs").css("text-align","center")
	$(".inputs").css("padding","0em");
	$(".inputs").css("margin","0em");
	$("#first_name").val('First Name');
	$("#last_name").val('Last Name');
		$("#email").val('Email');
		$("#phone").val('Phone');
		$("#address").val('Address');
		$("#zipcode").val('Zipcode');
		$("#zipcode").val('Zipcode');
	$(".forminput").on("click", function(){
		$(this).val("");
		});
		

	
}



 $("#information input:text, #information input:password").keyup(function(){
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
$$("#password").val()=="Password"||
$("#password").val()=='')
{
$("#submit").hide();
}
else {
$("#submit").fadeIn();
}

});

$("#tweetsend").click(function(){
var check = $(this).find('#later');

check.prop('checked',!check[0].checked);
if (check.prop('checked')==true)
	{$("#room_pics .continue").show();
	$(this).css("background-color","#CC0033");
	}
	
	else {$("#room_pics .continue").hide();
	$(this).css("background-color","#F0F0F0")
	}

});
	});

	
	</script>