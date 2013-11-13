<?php 
	include(APPPATH.'/views/templates/header.php');
?>

   <div class="top-nav">
    <div class="nav-left">
      <div class="logo"><a href = "<?php echo base_url();?>">Havenly<a></div>
      <ul>
        <li class="services-nav"><a href = "<?php echo base_url('/#services');?>"> Services</a></li>
        <li class="cg-nav"><a href = "<?php echo base_url('/#goods');?>">Cost &amp; Goods</a></li>
        <li class="about-nav"><a href = "<?php echo base_url('/#about');?>">About</a></li>
         <li class="contact-nav"><a href = "#">How We Work</a></li>
		  <li><a href = "http://www.havenly.com/blog">Blog</a></li>
      </ul>
    </div><!-- nav left -->
    <div class="nav-right">
      <ul>
        <li><a id="startbutton" href="<?php echo base_url('index.php/Users/site');?>">&nbsp;GET STARTED</a><li>
        <li><a class="login" href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
      </ul>
    </div><!-- nav right -->
    <div class="nav-mobile">
      <ul id="list-pages-accordion">
        <li>
          <a href=""><img src=<?php echo base_url('theme/img/menu.png');?> height = "25px"></a>
          <ul id="dropdownList" class = "text-center">
            <li><a class="login"href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
            <li><a id="startbutton" class="button3" href="<?php echo base_url('index.php/Users/site');?>">GET STARTED</a><li>
            <li class="services-nav"><a href = "<?php echo base_url('/#services');?>">Services</a></li>
            <li class="cg-nav"><a href = "<?php echo base_url('/#goods');?>">Cost &amp; Goods</a></li>
            <li class="about-nav"><a href = "<?php echo base_url('/#about');?>">About</a></li>
               <li class="contact-nav"><a href = "#">How We Work</a></li>
			  <li><a href = "http://www.havenly.com/blog">Blog</a></li>
			</ul>
        </li>
      </ul>
    </div>
</div>  

<div class = "white">
<div class = "container">
<div class = "text-center">
<BR><BR>
<p class = "midlarge sanslight">WE MAKE THINGS ALMOST TOO EASY WITH A FUN AND SIMPLE DESIGN PROCESS</p><BR>
<hr class = "style">
<div class = "row">
<div class = "span3"><BR>
<img src = "<?php echo base_url('assets/Images/step1.png');?>" height = "150px"><BR><BR>
<p class = "serif midlarge">Take Our Survey.</p>
<p class = "sanslight midsmall">After signing up for our service, you will fill out a brief style survey and upload pictures of your room.</p>

</div>
<div class = "span6">
<img src = "<?php echo base_url('assets/Images/step1img.jpg');?>" width = "100%">
</div></div>
<hr class = "style">
<div class = "row">
<div class = "span3"><BR>
<img src = "<?php echo base_url('assets/Images/step2.png');?>" height = "150px"><BR><BR>
<p class = "serif  midlarge">Chat With Us.</p>
<p class = "sanslight midsmall">Your designer will contact you to discuss your needs.</p>

</div>
<div class = "span6">
<img src = "<?php echo base_url('assets/Images/step2img.jpg');?>" width = "100%">
</div></div><hr class = "style">
<div class = "row">
<div class = "span3"><BR>
<img src = "<?php echo base_url('assets/Images/step3.png');?>" height = "150px"><BR><BR>
<p class = "serif  midlarge">See Concepts.</p>
<p class = "sanslight midsmall">You get two concepts for your space.  Provide feedback to your designer and we find alternatives.</p>

</div>
<div class = "span6">
<img src = "<?php echo base_url('assets/Images/step3img.jpg');?>" width = "100%">
</div></div><hr class = "style">
<div class = "row">
<div class = "span3"><BR>
<img src = "<?php echo base_url('assets/Images/step4.png');?>" height = "150px"><BR><BR>
<p class = "serif  midlarge">Receive Revisions. </p>
<p class = "sanslight midsmall">After choosing your favorite concept ideas, your designer will provide 3 further options for pieces you just weren't sure about.</p>

</div>
<div class = "span6">
<img src = "<?php echo base_url('assets/Images/step4img.jpg');?>" width = "100%">
</div></div><hr class = "style">
<div class = "row">
<div class = "span3"><BR>
<img src = "<?php echo base_url('assets/Images/step5.png');?>" height = "150px"><BR><BR>
<p class = "serif midlarge">Get Decorated.</p>
<p class = "sanslight midsmall">You get a final room rendering and a list of products and prices.  One click buying and coordination from our accounts team makes getting decorated just so easy.</p>

</div>
<div class = "span6">
<img src = "<?php echo base_url('assets/Images/step5img.jpg');?>" width = "100%">
</div></div>



<BR><BR>

</div>
</div>

  <div id="overlay">
    <div class="boxoverlay"><div class="dark_gray_text">
	<p class = "medium">W E L C O M E</p>
	<hr class = "style">
    <p class="midsmall request-note">Havenly is currently open to people with an invitation in selected cities.  To request an invite, submit your email address and zip code, and we'll get you in as soon as possible.</p>
    <form name="signup" method="post" action=<?php echo base_url('index.php/Users/site/requestinvite');?>>
      <table class = "table-center">
        <tr><td width = "50%"><label class="half sanslight small middle inline email-label" for="Email">Email Address:</label></td>
        <td><input class = "half middle inline" type="text" name="email" value="" id="email" maxlength="30"/></td>
      </tr><BR>
      <tr>
       <td width = "50%"> <label class = "half sanslight small middle inline zipcode-label" for="Zipcode">Zipcode:</label></td>
        <td><input class = "half middle inline" type="text" name="zipcode" value="" id="zipcode" maxlength="30"/></td>
      </tr></table>
      <div class = "horizontal seventy">
        <a class = "button3 pink white_text sanslight" id="requestinvite">REQUEST</a>
      </div>
    </form>
  </div></div></div>


<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

// <script>
// $("#startbutton, #startbutton2").click(function(){
      // $("#overlay").show();
    // });

    // $("#overlay .close").on("click", function(){
      // $("#overlay").fadeOut(1000);
    // });
    // $('#overlay').click(function(e) {
      // if (e.target.id === "overlay"){
        // $('#overlay').fadeOut();
      // }
  // });

  // $("#requestinvite").click(function(){
  // var email = $("#email").val();
  // var zipcode = $("#zipcode").val();
  // $.ajax({
      // type: "POST",
      // url: "requestinvite",
      // data: {email: email, zipcode: zipcode},
      // success: function(data) {
      // if(data=='nope')
        // {$(".boxoverlay").prepend('<p class = "medium error">Oops, we need more information</p>');}
      // else{
          // $(".boxoverlay").html(data);
      // $("#overlay .close").on("click", function(){
        // $("#overlay").fadeOut(1000);
        // });}
      // }
    // });
  // });
  
 </script>