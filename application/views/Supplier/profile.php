<?php 
	include(APPPATH.'/views/templates/header2.php');
?>

<script type="text/javascript" src=<?php echo base_url("assets/Scripts/ajaxfileupload.js")?>></script>
<br>
<div id='cssmenu'>
<ul>
   <li class='active'><a href=<?php echo base_url('index.php/Supplier/site');?>><span>Home</span></a></li>
   <li class='has-sub'><a href='<?php echo base_url('index.php/Supplier/site/profile');?>'><span>Profile</span></a></li>
   <li class='has-sub'><a href='<?php echo base_url('index.php/Supplier/site/contests');?>'><span>Contests</span></a></li>
   <li><a href='#'><span>Responses</span></a></li>
   <li class='last'><a href='#'><span>Messages</span></a></li>
</ul>
</div>

<div id = 'display_area'>

<div class = 'desc_header'>Your Profile</div><hr class = "style">
<div class = "form_container">
<form name="profile" method="post" action="<?php echo base_url('index.php/Supplier/site/submit_profile');?>" 
enctype="application/x-www-form-urlencoded">
<div id = "basic">
<p class = "form_header">Basic Information </p><div class = "minus"><a>[-]</a></div><div class = "plus"><a>[+]</a></div>
<hr class = "style"><div class = 'tohide'>

<div class = "labels">
<label for="ProName">Professional/Business Name:</label><br>
<label for="First_Name">First Name:</label><br>
<label for="Last_Name">Last Name:</label><br>
</div>
<div class = "inputs">
<input type="text" name="ProName" value="<?php if(isset($profile[0]['business_name'])){echo $profile[0]['business_name'];}?>" id="ProName" maxlength="30" />
<input type="text" name="First_Name" value="<?php if(isset($profile[0]['first_name'])){echo $profile[0]['first_name'];}?>" id="First_Name" maxlength="50" /><br>
<input type="text" name="Last_Name" value="<?php if(isset($profile[0]['last_name'])){echo $profile[0]['last_name'];}?>" id="Last_Name" maxlength="50" /><br>
</div></div>
</div><br>
<div class = "profile_pic">
<p class = "form_header">Profile Picture </p><div class = "minus"><a>[-]</a></div><div class = "plus"><a>[+]</a></div>
<hr class= "style">
<div class = "tohide">
<div id = "image"><img height=150px id="profile_pic_src" src = <?php if(isset($profile[0]['pic_filename'])){ echo "https://s3.amazonaws.com/easableimages/{$profile[0]['pic_filename']}";}
else{echo base_url('assets/Images/user_1.jpg');}?>></div><br><br>
<input type = "file" name = "profile_pic" id = "profile_pic"/><input type="hidden" name="profile_pic_file" id="profile_pic_file" value = "<?php if(isset($profile[0]['pic_filename']))
{echo $profile[0]['pic_filename'];}?>"/>
<a id ="pic_submit">Upload</a>
</div></div><br>

<div id = "personal">
<p class = "form_header">Your Style </p><div class = "minus"><a>[-]</a></div><div class = "plus"><a>[+]</a></div>
<hr class = "style"><div class = "tohide">
<div class = "labels">
<label for="About">About you and your style:</label><br>
</div>
<div class = "inputs">
<textarea rows="3" cols="40" name="About" id="About"><?php if(isset($profile[0]['About'])){echo $profile[0]['About'];}?></textarea>
</div>
</div></div><br>
<div id = "professional">
<p class = "form_header">Your Qualifications </p><div class = "minus"><a>[-]</a></div><div class = "plus"><a>[+]</a></div>
<hr class = "style"><div class = "tohide">
<div class = "labels">
<label for="Associations">Societies/Associations</label><br>
<label for="Education">Degrees/Schools</label><br>
</div>
<div class = "inputs">
<input type="text" name="Associations" value="<?php if(isset($profile[0]['certification'])){echo $profile[0]['certification'];}?>" id="Associations" maxlength="30" />
<input type="text" name="Education" value="?" id="Education" maxlength="30" />
</div>
</div></div><br><br><input type="submit" value="Save Profile" />
</form>
</div>

</div>

<script>
$(document).ready(function(){
$("#professional .tohide").hide();
$("#personal .tohide").hide();
$(".profile_pic .tohide").hide();
$("#professional .minus").hide();
$("#personal .minus").hide();
$("#basic .plus").hide();
$(".profile_pic .minus").hide();

$(".minus").click(function(){
$(this).parent().find('div.tohide').hide();
$(this).hide();
$(this).parent().find('.plus').show();
});

$(".plus").click(function(){
$(this).parent().find('div.tohide').show();
$(this).hide();
$(this).parent().find('.minus').show();
});

$("#pic_submit").click(function(){
$.ajaxFileUpload({
         dataType : 'JSON',
		 url         :'/test/design2/index.php/Supplier/site/upload_profile_pic',
         secureuri      :false,
         fileElementId  :'profile_pic',
		 success: function (data){
		alert(data);
		var newimage = "<img src ='https://s3.amazonaws.com/easableimages/"+data+"' height=100>";
		$("#image").html(newimage);
		$("#profile_pic_file").val(data);
		}
});

});
});
</script>
