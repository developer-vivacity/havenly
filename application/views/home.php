<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<section class="home">
  <div class="top-nav">
    <div class="nav-left">
      <div class="logo"> HAVENLY</div>
      <ul>
        <li class="services-nav">Services</li>
        <li class="cg-nav">Costs</li>
        <li class="contact-nav"><a href = "<?php echo base_url('index.php/Users/site/howwework'); ?>">How</a></li>
		 <li class="about-nav">About</li>
		 <li><a href = "http://www.havenly.com/blog">Blog</a></li>
		 <li id="gift"><a href = "<?php echo base_url('index.php/Users/site/gifts'); ?>">Give the gift of Havenly</a></li>
      </ul>
    </div><!-- nav left -->
    <div class="nav-right">
      <ul>
        <li><a id="startbutton"  href="<?php echo base_url('index.php/Users/site');?>">GET STARTED</a><li>
        <li><a class="login"href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
      </ul>
    </div><!-- nav right -->
    <div class="nav-mobile">
      <ul id="list-pages-accordion">
        <li>
          <a href=""><img src=<?php echo base_url('theme/img/menu.png');?> height="25px"></a>
          <ul id="dropdownList" class = "text-center">
            <li><a class="login" href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
            <li><a id="startbutton" href="<?php echo base_url('index.php/Users/site');?>">GET STARTED</a><li>
            <li class="services-nav">SERVICES</li>
            <li class="cg-nav">COSTS</li>
            <li class="about-nav">ABOUT</li>
            <li class="contact-nav"><a class = "white_text" href = "<?php echo base_url('index.php/Users/site/howwework'); ?>">HOW</a></li>
          <li><a href = "<?php echo base_url('blog'); ?>">BLOG</a></li>
		  </ul>
        </li>
      </ul>
    </div>
  </div><!-- top nav -->
  <div class="home-content">
 
  <div class = "offset8 text-center">
 <img class = "inline" src=<?php echo base_url('assets/Images/Blue_dalle.png');?> height="180"><BR>
    <h2 class = "inline">Your place just got better.</h2><BR><BR> 
	<!-- <p class = "inline midsmall">Your room, professionally decorated and delivered. </p><BR>-->
    <a class="button4 condensed get-started" href="<?php echo base_url('index.php/Users/site');?>">Get started</a>
	</div></div><!-- home content -->
</section><!-- home -->
<section class="services white">
<div id = "#services">
  <h1>Your room should be as attractive as you are.</h1>
  <h2>Let us help you decorate your place.  One very low flat fee. No minimums or commitments. </h2>
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
  <hr class = "thirdline"/>

</section><!-- services -->
<section class="services-video white">
<div class = "container text-center">
<BR>
    <h3>How Havenly Works</h3>
    <p>It's pretty easy. You tell us about you, and we do the rest.</p>
<!-- video descrip -->
  <iframe id="video" src="https://player.vimeo.com/video/68198071" width="50%" height="315px" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
</div></section>
<div id="example" class = "blue"><BR><BR>
			<div class="container">
				<div class="row">
					<!--<div class="span4"> </div>-->
					<div class="span8 offset1">
						<br><BR><br>
						<h2>Some <img src = "<?php echo base_url('assets/Images/heart.png');?>" class = "inline top" height = "50px"> from our customers</h2>
						<div id="myCarousel2" class="carousel slide">
					        <div class="carousel-inner"><br>
		          				<div class="item active">
							      <p class = "medium white_text sanslight">"Havenly helped my bedroom look like less of a crack den.  Girls no longer think I'm totally sketchy. " <BR><BR><br>-Matt R.</p>
		          			</div>
							<div class="item">
		            			<p class = "medium white_text sanslight">"I couldn't figure out how to make my living room work out for me.  The space was too big, and mostly, too empty.  Havenly delivered everything I needed to me, and they were really friendly too!" <BR> <BR><BR>-Kevin P.</p>
		          				</div>
		          				<div class="item">
		            			<p class = "medium white_text sanslight">"Havenly is the best.  Just use it." <BR><BR>-Jess R.</p>
		          				</div>
		        			</div>
		        			<!--<a class="left carousel-control" href="#myCarousel2" data-slide="prev">&lsaquo;</a>
		        			<a class="right carousel-control" href="#myCarousel2" data-slide="next">&rsaquo;</a>-->
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
  <div class="cost-options canvas"><BR>
    <h1>We're Cheap and Easy</h1>
    <h2>One flat fee gets you your very own decorator for your room.</h2>
    <div class="pricing-table-wrapper">
      <div class="pricing-table pt-one">
 
      <ul class="pricing-column">
    <!--    <li class="pricing-title">
          <h3>One Flat Fee</h3>
                  <p>Our comprehensive design plan.</p>
        </li>-->
        <li><img src="<?php echo base_url().'assets/Images/cashmere-pink.png';?>" height="150px"> </span>
        </li>
        <li>Hand picked decorating suggestions.</li>
        <li>Choice of designer concepts.</li>
		<li>Custom rendering</li>
        <li>Unlimited stylish support.</li>
        
      </ul>
      </div><!-- Pricing-Table Row Fluid -->
    </div><!-- Pricing-Table-Wraper -->
  </div><!-- costs -->
  <div class="goods">
    <div class="goods-picture">
     <h1>Sourcing Products</h1>
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
    <img class="bioimage" src=<?php echo base_url('assets/Images/lee.png');?> height="400px" alt="Lee Mayer">
	<span class = "caption full-caption">
   <h3 class="name">Lee Mayer</h3>
   <p class = "title">Co-Founder/Doer of Stuff</p>
    <p class="bio-p">
	Lee is a Denver resident who misses the East Coast (more specifically, NYC). She was formerly a VP at Bankrate, a consultant at Bain, and worked in strategy and corporate dev. at Canon. She has an MBA from Harvard Business School and graduated from Columbia University. <BR><BR>
Lee is the shortest member of the Havenly team (clocking in at an impressive five feet-and-three-quarters-inches) but has more parking tickets than the rest of the team combined. 
She loves wine, fatty meats, and karaoke (not always together), finds inordinate joy in setting people up, and is most often found wearing tween friendly clothing.

	</p>
  </span>
  </div>

  <div class="emily-descrip bio">
    <img class=" bioimage " src=<?php echo base_url('assets/Images/emily.png');?>  height="400px" alt="Emily Motayed" >
    <span class = "caption full-caption">
	<h3 class="name">Emily Motayed</h3>
	<p class = "title">Co-Founder/Hustler</p>
    <p class="bio-p">
Emily grew up in the suburbs of DC (with Lee!), but is currently a nomad hauling her large collection of 4.5" heels between Denver and NYC. She was formerly at American Express and Huron Consulting Group. Emily has a B.A. from Vanderbilt University. 
<BR><BR>
She seems very smiley but hates lots of things including: camping, ketchup, Toyota Priuses, those green kale juices, eggs, and everything else. Things she likes include: mini bottles of flavored vodka, the Domino's pizza tracker app, and free soft t-shirts.
	</p>
	</span>
	</div>
<BR>
	
	
	 <div class="shelby-descrip bio">
    <img class="bioimage" src=<?php echo base_url('assets/Images/shelby.png');?> height="400px" alt="Shelby Girard">
    <span class = "caption full-caption">
	<h3 class="name">Shelby Girard</h3>
	<p class = "title">Director of Design Operations/Finder of Pretty Things</p>
    <p class="bio-p">Shelby lives in Chicago by way of St. Louis and NYC. She worked in residential interior design before joining Havenly. She has a BA from NYU and her Masters in Interior Design from Harrington College of Design. 
<BR><BR>
She enjoys antique shopping and fancy cocktails with equally fancy names. Shelby has redecorated her apartment approximately 23.35 times in the past year- her boyfriend got in the way of #24, but she continues to plan out her next two revisions. </p>
	</span>
	</div>	
	
	 <div class="alana-descrip bio">
    <img class=" bioimage " src=<?php echo base_url('assets/Images/alana.png');?> height="400px" alt="Alana Highberger">
    <span class = "caption full-caption">
	<h3 class="name">Alana Highberger</h3>
	<p class = "title">Creative Director/Blogger Extraordinaire</p>
    <p class="bio-p">A graduate of the University of North Carolina at Chapel Hill, Alana currently resides in her hometown of Houston, Texas.  She served as the Founding Director of education nonprofit, Saylor.org, for the past five years and maintains a position on their Board of Advisors. 
<BR><BR>
Alana has an unhealthy yet happy addiction to design blogs, Pinterest, Kirby (her Norwich Terrier), and Mindy Kaling.  
Her humidity defying hair is also the most valued member of the Havenly team - it has had many sonnets written about its luxuriance. Get to know her on Twitter (@thehavenly), Facebook (facebook.com/thehavenly), and the Havenly Blog (havenly.com/blog). 
</p>
	</span>
	</div>	
	
	</div>
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
            <li><a href = "<?php echo base_url('index.php/Users/site/faq');?>" class="midsmall sanslight white_text">faqs</li>
			 <li><a href = "<?php echo base_url('index.php/Users/site/careers');?>" class="midsmall sanslight white_text">careers</li>
            <li><a class="midsmall sanslight white_text" href=<?php echo base_url('index.php/Users/site/terms');?>>terms</li>
            <li><a class="midsmall sanslight white_text" href="http://www.havenly.com/blog" target="_blank">blog</a></li>
          </ul>
        </div><!-- footer-links -->
		
		  <div id="addressEmail">
        
          <a class = "small sanslight blue_text" href="mailto:hello@havenly.com">hello@havenly.com</a><BR>
		  <span class = "footer_phone"> (888)978-3152.  M-F 8a-5p EST.</span>
       		<div id = "footer-bottom" > Designed with love in beautiful colorado. <BR> &copy; Havenly, Inc  2013</p>
		
		</div><!-- addressEmail -->
      </div><!-- contain -->
    </div><!-- footerwrap -->
  </section>

  <div id="overlay">
    <div class="boxoverlay"><div class = "close"><img src = "<?php echo base_url('assets/Images/closebutton1.png');?>" height = "25"></div><div class="black_text">
	<p class = "large serif ">Keep up to date.</p><BR>
	
    <p class="midsmall request-note">Be the first to know about new designs, exclusive discounts and easy ways to make your space way more awesome than you could have imagined.<BR><BR>  Get $25 off of your design fee when you sign up today.</p>
    <BR><form name="signup" method="post" action=<?php echo base_url('index.php/Users/site/emailsignup');?>>
      <table class = "table-center">
        <tr>
        <td valign="middle"><input class = "half inline" type="text" name="email" value="Email Address" id="email" maxlength="30" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};"/></td>
      <td valign="bottom">
        <a class = "button4 white_text sanslight" id="requestinvite">SIGN UP</a></td></tr></table>
      </div>
	  <input type = "hidden" value = <?php echo base_url();?> name = "siteurl" id = "siteurl"/>
    </form>
  </div></div></div>

  
 <!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('5800-712-10-4032');/*]]>*/</script><noscript><a href="https://www.olark.com/site/5800-712-10-4032/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->
  
<script>
  $(document).ready(function(){
    $('#myCarousel2').carousel({
        interval: 3000
    });


    $('#myCarousel2').carousel('cycle');
	$("#overlay").show();
	
	// $("#startbutton, #startbutton2").click(function(){
      // $("#overlay").show();
    // });

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
     var siteurl = $("#siteurl").val();
	 
	 if (email==""||email=="Email Address"){
	 $(".boxoverlay").prepend('<p class = "alert">Oops, we need more information!</p>')
	
	 }
	 else{
  $(".boxoverlay").html('<a class = "button4"><img src = "'+siteurl+'/assets/Images/ajaxwhiteblack.gif" height = "100px"></a>');
  
	$.ajax({
      type: "POST",
      url: "index.php/Users/site/emailsignup",
      data: {email: email},
      success: function(data) {
      if(data=='nope')
        {$(".boxoverlay").prepend('<p class = "alert alert-error">Check to see if you\'ve entered a valid email address</p>');}
      else{
          $(".boxoverlay").html(data);
		$("#overlay .close").on("click", function(){
        $("#overlay").fadeOut(1000);
        });}
      }
    });}	
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
