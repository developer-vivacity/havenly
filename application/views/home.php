<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<section class="home">
  <div class="top-nav">
    <div class="nav-left">
      <div class="logo">Havenly</div>
      <ul>
        <li class="services-nav">Services</li>
        <li class="cg-nav">Cost &amp; Goods</li>
        <li class="about-nav">About</li>
        <li class="contact-nav"><a href = "<?php echo base_url('index.php/Users/site/howwework'); ?>">How We Work</a></li>
      </ul>
    </div><!-- nav left -->
    <div class="nav-right">
      <ul>
        <li><a id="startbutton" class="button3" href="#overlay">GET STARTED</a><li>
        <li><a class="login"href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
      </ul>
    </div><!-- nav right -->
    <div class="nav-mobile">
      <ul id="list-pages-accordion">
        <li>
          <a href=""><img src=<?php echo base_url('theme/img/menu.png');?>></a>
          <ul id="dropdownList">
            <li><a class="login"href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
            <li><a id="startbutton" class="button3" href="#overlay">GET STARTED</a><li>
            <li class="services-nav">Services</li>
            <li class="cg-nav">Cost &amp; Goods</li>
            <li class="about-nav">About</li>
            <li class="contact-nav"><a class = "white_text" href = "<?php echo base_url('index.php/Users/site/howwework'); ?>">How We Work</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- top nav -->
  <div class="home-content">
  <div class = "row">
    <img class = "inline" src=<?php echo base_url('assets/Images/Blue_dalle.png');?> height="190">
    <h2 class = "inline">&nbsp; Your place just got better.</h2><BR>
    <button id="startbutton2"class="button3 get-started" href="#overlay">Get started</button>
  </div><!-- home content -->
</section><!-- home -->
<section class="services white">
<div id = "#services">
  <h1>Your room should be as pretty as you are.</h1>
  <h2>Let our decorators help you decorate your place.  One very low flat fee. No minimums or commitments. </h2>
  <div class="cards"><a class = "black_text" href = "<?php echo base_url('index.php/Users/site/howwework');?>">
    <div class="anibox card1">
      <div class="card">
        <div class="face front">  
          <img src= <?php echo base_url('assets/Images/empty-house-icon.png');?> height="200">
        </div><!-- face front -->
        <div class="face back">
          <img src= <?php echo base_url('assets/Images/survey-icon.png');?> height="200">
        </div><!-- face back -->
      </div><!-- card -->
      <div class="card-descrip">
        <h3>Tell us about you.</h3>
        <p>Get started by telling us exactly how bad it is, and how awesome you want it to be.</p>
      </div><!-- card-descrip -->
    </div><!-- anix box card 1-->
    <div class="anibox card2">
      <div class="card">
        <div class="face front">  
          <img src= <?php echo base_url('assets/Images/proposal-one-icon.png');?> height="200">
        </div><!-- face front -->
        <div class="face back">
          <img src= <?php echo base_url('assets/Images/proposal-two-icon.png');?> height="200">
        </div><!-- face back -->
      </div><!-- card -->
      <div class="card-descrip">
        <h3>Get decorated.</h3>
        <p>Our decorators put together proposals for your place, you choose the sweetest one.  Then we'll get to work on a full design.</p>
      </div><!-- card-descrip -->
    </div><!-- anix box card 2-->
    <div class="anibox card3">
      <div class="card">
        <div class="face front">  
          <img src=<?php echo base_url('assets/Images/Desc_3.png');?> height="200">
        </div><!-- face front -->
        <div class="face back">
          <img src= <?php echo base_url('assets/Images/send-icon.png');?> height="200">
        </div><!-- face back -->
      </div><!-- card -->
      <div class="card-descrip">
        <h3>Buy what you love.</h3>
        <p>You tell us about the items you love, and we send it all to you.  Invite people over, shame free.</p>
      </div><!-- card-descrip -->
    </div><!-- anix box card 3-->
  </div><!-- cards --></a>
</section><!-- services -->
<section class="services-video blue">
  <div class="video-descrip">
    <h3>How Havenly Works</h3>
    <p>It's pretty easy, you tell us about you, and we do the rest.</p>
  </div><!-- video descrip -->
  <iframe id="video" src="http://player.vimeo.com/video/68198071" width="100%" height="315px" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
</section>
<div id="example" class = "white"><BR><BR><BR><BR>
			<div class="container">
				<div class="row">
					<!--<div class="span4"> </div>-->
					<div class="span8 offset1">
						<br><BR><br>
						<h2 class = "large">Some <img src = "<?php echo base_url('assets/Images/heart.png');?>" class = "inline top" height = "100px"> from our customers</h2>
						<div id="myCarousel2" class="carousel slide">
					        <div class="carousel-inner"><br>
		          				<div class="item active">
							      <p class = "medium sanslight">"Havenly helped my bedroom look like less of a crack den.  Girls no longer think I'm totally sketchy." <BR><BR><br>-Matt R.</p>
		          			</div>
							<div class="item">
		            			<p class = "medium sanslight">"I couldn't figure out how to make my living room work out for me.  The space was too big, and mostly, too empty.  Havenly delivered everything I needed to me, and they were really friendly too!" <BR> <BR><BR>-Kevin P.</p>
		          				</div>
		          				<div class="item">
		            			<p class = "medium sanslight">"Havenly is the best.  Just use it." <BR><BR>-Jess R.</p>
		          				</div>
		        			</div>
		        			<a class="left carousel-control" href="#myCarousel2" data-slide="prev">&lsaquo;</a>
		        			<a class="right carousel-control" href="#myCarousel2" data-slide="next">&rsaquo;</a>
						</div><!-- myCarousel2 -->
					</div><!-- span8 -->
					<div class="span2"></div>
				</div><!-- row -->
			</div><!-- container -->
		
		<BR><BR><BR><BR><BR>
		</div>
</div>

<section class="costs-goods">
<div id = "goods">
  <div class="cost-options chevron"><BR>
    <h1>We're Easy and Cheap</h1>
    <h2>One per room flat fee gets you your very own decorator.</h2>
    <div class="pricing-table-wrapper">
      <div class="pricing-table pt-one">
 
      <ul class="pricing-column">
    <!--    <li class="pricing-title">
          <h3>One Flat Fee</h3>
                  <p>Our comprehensive design plan.</p>
        </li>-->
        <li><img src="<?php echo base_url().'assets/Images/cashmere-pink.png';?>" height="150px"> </span>
        </li>
        <li>Whole room decorating plan.</li>
        <li>Choice of designer concepts.</li>
		<li>Custom rendering &amp; 1 full revision</li>
        <li>Unlimited stylish support.</li>
        
      </ul>
      </div><!-- Pricing-Table Row Fluid -->
    </div><!-- Pricing-Table-Wraper -->
  </div><!-- costs -->
  <div class="goods">
    <div class="goods-picture">
      <h1>The Goods</h1>
    </div>
    <h2>We work with well known retailers and our own suppliers to find what you're looking for.</h2>
    <h3>Below is a general price range, but it all depends on your taste, budget and how much you need.</h3>

    <table class="price-column left-price half center inline top">
      <tr height="70px"><td width = "25%">
      <img src=<?php echo base_url('assets/Images/sofa-white.png');?> height="40px"></td>
        <td><p class="price-range sanslight medium">$1,200-$5,000</p></td></tr>
      <tr height="70px"><td><img src = <?php echo base_url('assets/Images/chair-white.png');?> height="50px"></td>
        <td><p class="price-range sanslight medium">$250-$1,000</p></td></tr>
      <tr height="70px"><td><img src = <?php echo base_url('assets/Images/table-white.png');?> height="50px"></td>
        <td><p class="price-range sanslight medium">$250-$3,000</p></td></tr>
      <tr height="70px"><td><img src = <?php echo base_url('assets/Images/rug-white.png');?> height="50px"></td>
        <td><p class="price-range sanslight medium">$150-$1,000</p></td></tr>
    </table>
    <table class="price-column half center inline top">
      <tr height="70px"><td width = "25%">
      <img src=<?php echo base_url('assets/Images/bed-white.png');?> height="40px"></td>
        <td><p class="price-range sanslight medium">$350-$2,000</p></td></tr>
      <tr height="70px"><td><img src = <?php echo base_url('assets/Images/lamp-white.png');?> height="50px"></td>
        <td><p class="price-range sanslight medium">$30-$400</p></td></tr>
      <tr height="70px"><td><img src = <?php echo base_url('assets/Images/pillow-white.png');?> height="50px"></td>
        <td><p class="price-range sanslight medium">$30-$100</p></td></tr>
      <tr height="70px"><td><img src = <?php echo base_url('assets/Images/art-white.png');?> height="50px"></td>
        <td><p class="price-range sanslight medium">$100-$3000</p></td></tr>
    </table>
  </div><!-- goods--></div>
</section>

<section class="about">
<div id = "about">
  <div class="about-image"><h2>We built Havenly to help.</h2></div>

  <h1>Whether you stare longingly at your ever-growing pinterest page, or you just want someone to take care of decorating for you - we get it.</h1>
  <h3 class="meet-team">Meet the team.</h3>

  <div class="lee-descrip bio">
    <img class="img-circle bioimage" src=<?php echo base_url('assets/Images/lee.png');?> height="300">
	<span class = "caption full-caption">
   <h3 class="name">Lee Mayer</h3>
    <p class="bio-p">Lee is a Denver resident who misses the East Coast. She was formerly a VP at Bankrate, a consultant at Bain, and worked in strategy and corporate development at Canon. <BR><BR>Lee has an MBA from Harvard Business School and a B.S. from Columbia University. She loves cows and has most recently learned to ski. Ask her about her collection of speeding tickets.</p>
  </span>
  </div>

  <div class="emily-descrip bio">
    <img class="img-circle bioimage " src=<?php echo base_url('assets/Images/emily.png');?> height = "300" >
    <span class = "caption full-caption">
	<h3 class="name">Emily Motayed</h3>
    <p class="bio-p">Emily is a DC gal at heart, but is currenly a nomad traveling between Denver, Chicago and NYC. She was formerly at American Express, and Huron Consulting. Emily has a B.A. from Vanderbilt University. <BR><BR>She hates working out, and has strayed quite far from her childhood ambition to be a grocery store baker.</p>
	</span>
	</div></div>
</section>

  <section class="contact">
    <div id="footerwrap">
      <div class="contain">
     
        <div class="social-media">
          <ul class="inline">
            <li><a href="http://www.facebook.com/thehavenly" target="_blank"><img src=<?php echo base_url("assets/Images/fbicon.png")?> align="middle" height="40"></a></li>
            <li><a href="http://www.twitter.com/thehavenly" target="_blank"><img src=<?php echo base_url("assets/Images/twicon.png")?> align="middle" height="40"></a></li>
            <li><a href="http://www.pinterest.com/thehavenly" target="_blank"><img src=<?php echo base_url("assets/Images/pinicon.png")?> align="middle" height="40"></a></li>
<li><a href = "http://www.instagram.com/thehavenly" target = "_blank"><img src = <?php echo base_url("assets/Images/instaround.png")?> align="middle" height="40"> </a></li>         
		 </ul>
        </div><!-- social-media -->
        <div class="footer-links">
          <ul class="inline">
            <li class="about-nav"><a href = "<?php echo base_url('index.php/Users/site/faq');?>" class="midsmall sanslight white_text">faqs</li>
            <li><a class="midsmall sanslight white_text" href=<?php echo base_url('index.php/Users/site/terms');?>>terms</li>
            <li><a class="midsmall sanslight white_text" href="http://blog.havenly.com" target="_blank">blog</a></li>
          </ul>
        </div><!-- footer-links -->
		
		  <div id="addressEmail">
        
          <a class = "small sanslight blue_text" href="mailto:hello@havenly.com">hello@havenly.com</a>
       		<div id = "footer-bottom" > Designed with love in beautiful colorado. <BR> &copy; Havenly, Inc  2013</p>
		
		</div><!-- addressEmail -->
      </div><!-- contain -->
    </div><!-- footerwrap -->
  </section>

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

<script>
  $(document).ready(function(){
    $("#startbutton, #startbutton2").click(function(){
      $("#overlay").show();
    });

    $("#overlay .close").on("click", function(){
      $("#overlay").fadeOut(1000);
    });
    $('#overlay').click(function(e) {
      if (e.target.id === "overlay"){
        $('#overlay').fadeOut();
      }
  });

  $("#requestinvite").click(function(){
  var email = $("#email").val();
  var zipcode = $("#zipcode").val();
  $.ajax({
      type: "POST",
      url: "index.php/Users/site/requestinvite",
      data: {email: email, zipcode: zipcode},
      success: function(data) {
      if(data=='nope')
        {$(".boxoverlay").prepend('<p class = "medium error">Oops, we need more information</p>');}
      else{
          $(".boxoverlay").html(data);
      $("#overlay .close").on("click", function(){
        $("#overlay").fadeOut(1000);
        });}
      }
    });
  });

    $(".logo").on("click",function(e){
      $(window).scrollTo($(".home-detail"),900, {'axis':'y'});
    })
    $(".services-nav").on("click",function(e){
      $(window).scrollTo($(".services"),900, {'axis':'y'});
    })
    $(".cg-nav").on("click",function(e){
      $(window).scrollTo($(".costs-goods"),900, {'axis':'y'});
    })
    $(".about-nav").on("click",function(e){
      $(window).scrollTo($(".about"),900, {'axis':'y'});
    })
    $(".contact-nav").on("click",function(e){
      $(window).scrollTo($(".contact"),900, {'axis':'y'});
    })
  });
</script>  
