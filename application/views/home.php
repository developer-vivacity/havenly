<?php 
	include(APPPATH.'/views/templates/header.php');
?>




 <div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
        <div class="container"> 
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		<a class="brand" href="#">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a id = "servlink" href="#services">Services</a></li>
              <li><a id = "pricelink" href="#price">Cost</a></li>
			      <li><a id = "goodslink" href="#goods">Goods</a></li>
              <li><a id = "aboutlink" href="<?php echo base_url('index.php/Users/site/whoweare');?>">About</a></li>
              <li><a <a id = "contlink"href="#contact">Contact</a></li>
            </ul>
			<ul class = "nav pull-right white_text">
			
			<li><a class = "white_text sanslight" href = "<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>

  
	<div id="headerwrap">
  		<header class="clearfix">
  		 	<div id = "welcome_bar">
  		 		<img src=<?php echo base_url('assets/Images/Blue_dalle.png');?> height = 200>
				<BR><BR>
  				<h1 class= "white_text">YOUR PLACE</h1><h1>JUST GOT BETTER</h1>
			
  			</div>
  		</header>
	</div>
	
	<div id="welcomewrap">
		<header class="clearfix">
			<div class="container">
			<div class="span12">
				<h2 class = "sanslight">Your room, decorated and delivered 	&nbsp;&nbsp;<a id = "startbutton" class = "button3" href = "#overlay">
		&nbsp;&nbsp;GET STARTED&nbsp;&nbsp;
		</a></h2>
			</div>
			</div>
		</header>
	</div>

<section id="services"><br><br></section>

	<div id="servicewrap">
		<div class="container"><BR><BR><BR>
			<h2 class = "midlargeplus serif">Your room should be as attractive as you are.</p>
			<h2 class = "sanslight">Let our decorators help you pull your room together. For one very low flat fee.</h2>
			<br>
			<div class="row">
				<div class="span4">
					<div class="mask">
					<img src= <?php echo base_url('assets/Images/Desc_1.png');?> height="125"><br><br>
						<h4>Tell us about you.</h4>
						<p class = "sanslight black_text">
						Get started by telling us a little about you and your room.  </p>
					</div>
				</div><!-- span3 -->
				
				<div class="span4">
					<div class="mask">
						<img src= <?php echo base_url('assets/Images/Desc_2.png');?> height="125"><br><br>
						<h4>Get decorated.</h4>
						<p class = "sanslight black_text">Our professional designers put together proposals for your place, you choose the one you like.</p>
					</div>
				</div><!-- span3 -->
				
				<div class="span4">
					<div class="mask">
						<img src= <?php echo base_url('assets/Images/Desc_3.png');?> height="125"><br><br>
						<h4>Buy what you love.</h4>
						<p class = "sanslight black_text"> You tell us what you like, and we send it to you.  You can finally invite people over, shame free. </p>
					</div><BR><BR>
				</div><!-- span3 -->
			<div class = "span12">
			<h2 class = "sanslight">No minimums or commitments.  Ever.</h2></div>
			</div><!-- row --><BR><BR><Br><Br>
		</div><!-- container -->
	</div><!-- servicewrap -->

    <div id="example" class ="blue">
		<div class="container">
			<br><BR><BR><BR><BR><BR>
			<div class = "row">
			<div class = "span5">
			
<hr class = "style2">
<div class = "centerline">
<span class = "blue midsmall sans-serif white_text">HOW HAVENLY WORKS
</span></div>
			<p class = "serif midlargeplus white_text">It's pretty easy, you tell us about you, and we do the rest.</p><BR>
			</div>
			<div class = "span5 offset1">
			<iframe id = "video" src="http://player.vimeo.com/video/68198071" width="100%" height = "315" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
			</div>
			</div>
		<BR><BR><BR><BR><BR>
		</div><!-- container -->
		</div><!-- example -->
		
<div id="example" class = "white"><BR><BR><BR><BR>
			<div class="container">
				<div class="row">
					<div class="span2"></div>
					<div class="span8">
						<br><BR><br>
						<h2 class = "large">Some love from our customers</h2>
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
		</div><!-- example -->
		
<!-- Price Tables -->

<section id="price" class = "trellis"><br><BR><BR><br></section>
		<div id="pricewrap" class = "white">
			<div class="container">
			<br>
				<div class="span12">
				<h2 class = "large sanslight blue_text">We're cheap and easy.</h2>
				<h3 class ="medium sanslight">We offer two options to cover all levels of decorating phobia. </h3><BR><BR>
				    <div class="pricing-table-wrapper">
	                	<div class="pricing-table row-fluid">
		                    <ul class="pricing-column span5 ">
		                        <li class="pricing-title"><BR>Cotton<BR><BR>
							<p class = "midsmall sanslight">Have most of your stuff? Just want some help?</p></li>
		                        <li class="pricing-price"><img src = "<?php echo base_url().'assets/Images/cotton.png';?>" height="100px"> </span>
		                        </li>
		                        <li>Selection of furnishings to coordinate with your current room</li>
								 <li>Custom moodboard</li>
		                        <li>Unlimited stylish support</li>
		                        <li>$10 credit towards eligible furnishings</li>
		                       		                    </ul>
	                    
		                    <ul class="pricing-column span5 offset1">
		                        <li class="pricing-title"><BR>Cashmere<BR><BR>
							<p class = "midsmall sanslight">Our comprehensive design plan.</p></li>
		                          <li class="pricing-price"><img src = "<?php echo base_url().'assets/Images/cashmere.png';?>" height="100px"> </span>
		                        </li>
								
		                        <li>Whole room decorating plan.</li>
		                        <li>Custom rendering & full revision</li>
		                        <li>Unlimited Stylish Support</li>
		                        <li>$30 credit towards eligible furnishings</li>
		                       
		                    </ul>
	                    
		                    
	                	</div><!-- Pricing-Table Row Fluid -->
	            	</div><!-- Pricing-Table-Wraper -->				
            	</div><!-- Span12 -->
			</div><!-- Container -->
        	<br>
        	<br>
		</div>
		
	<!-- products -->

	<section id="goods" class = "white"><br><br></section>
			<div id="projectwrap">
	  		<header class="clearfix">
		  		<div class="container">
		  		 	<div class="span12">
		  		 		<div class="boxcolor">
		  				<h1>THE GOODS</h1>
		  				</div>
		  			</div><!-- span12 -->
		  		</div><!-- container -->
	  		</header>
		</div><!-- projectwrap -->
		
    	<div id="projectwrap_2" class = "white">
			<div class="container">
			<br>
			<br>
			

			<h2 class = "sanslight midlargeplus">We work with well known retailers and our own suppliers to find what you're looking for.</h3>
			<BR><BR>
			
			<h3 class = "sanslight blue_text midlarge">Here's how expensive things usually are</h3><br>
			<h3 class = "sanslight dark_gray_text midsmall">Obviously, it all depends on your taste, budget, and how much you need</h3>
<BR><BR>
<div class = "row">
<div class = "span5 offset2">
<table class = "half center inline top">
<tr height = "70px"><td width = "50%">
<img src = <?php echo base_url('assets/Images/sofa.png');?> height="40px"><BR><BR></td>
<td><p class = "sanslight medium">$1,200-$5,000</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/chair.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$250-$1,000</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/table.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$250-$3,000</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/rug.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$150-$1,000</p><BR><BR></td></tr>
</table>
</div>
<div class = "span5">
<table class = "half center inline top">
<tr height = "70px"><td width = "50%">
<img src = <?php echo base_url('assets/Images/bed.png');?> height="40px"><BR><BR></td>
<td><p class = "sanslight medium">$350-$2,000</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/lamp.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$30-$400</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/pillow.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$30-$100</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/art.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$100-$3000</p><BR><BR></td></tr>

</table>
<BR><BR>
</div>

</div>
			</div><!-- container -->
		</div><!-- projectwrap2 -->
		
		

	<!-- Contact Section Begins -->
		<section id="contact"><br><br></section>

		<div id="footerwrap">
			<div class="container">
			<br>
			<h2 class = "large sanslight">Get In Touch</h2>
				<div class="row">
					<div class="span5">
						<h3 class = "pink_text">Where in the world are we?</h3>
						<h4><a class = "white_text" href = "http://www.gavanize.it">Galvanize</a></h4>
						<h4>1062 Delaware St.</h4>
						<h4>Denver, CO</h4>
						<h4>hello@havenly.com</h4>
					</div><!-- span4 -->
					
					<!--<div class="span4">
						<img src="assets/img/twitter.png" alt="">
 						<div id="jstwitter" class="clearfix">
						<p id="twitter_update_list"></p>
						</div>
						<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script><!-- Script Needed to load the Tweets -->
						<!--<script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/wrapbootstrap.json?callback=twitterCallback2&count=1"></script>
						<h4>Update by @WrapBootstrap</h4>-->
					<!-- span4 -->
					
					<div class="span5 offset1">
						<h3 class = "pink_text">Say Hey</h3><BR><BR>
						<ul class = "inline">
					<li><a href = "http://www.facebook.com/thehavenly"><img src = <?php echo base_url("assets/Images/fbicon.png")?> align="middle"></a> </li>
					<li><a href = "http://www.twitter.com/thehavenly"><img src = <?php echo base_url("assets/Images/twicon.png")?> align="middle"></a> </li>
					<li><a href = "http://www.pinterest.com/thehavenly"><img src = <?php echo base_url("assets/Images/pinicon.png")?> align="middle"> </a></li>
						</ul>
						<h4><a class = "blue_text" href = "http://www.blog.havenly.com/">Our Most Interesting Thoughts on the Blog</a></h4>
					</div><!-- span4 -->

				</div><!-- row -->
			</div><!-- container -->
		</div><!-- footerwrap -->

	<!-- Bottom Map -->
		<div id="map">
		<img src = "<?php echo base_url('assets/Images/MyLR2.jpg');?>">
		
		</div>
		


		
<div id = "overlay">
<div class = "boxoverlay"><div class = "paddingmob dark_gray_text padding_small">
<a class = "close sanslight small light_gray_text">X Close</a><BR><BR>
<div class = "span5 offset1">
<p class = "large condensed">YOU LIKE US!</p>
<p class = "condensed midsmall">Havenly is currently open to people with an invitation in selected cities.  To request an invite, submit your email address and zip code, and we'll hit you back.<br><br>
</p><br></div>
<form name="signup" method="post" action=<?php echo base_url('index.php/Users/site/requestinvite');?>>
<div class = "horizontal span5 offset1">
<label class = "half condensed midsmall middle inline" for="Email">Email Address:</label><br>
<input class = "half middle inline" type="text" name="email" value="" id="email" maxlength="30"/><br><br>
</div>
<div class = "horizontal span5 offset1">
<label class = "half condensed midsmall middle inline" for="Zipcode">Zipcode:</label><br>
<input class = "half middle inline" type="text" name="zipcode" value="" id="zipcode" maxlength="30" /></div><br>
<div class = "span5 offset1">
<a class = "button3 pink white_text condensed" id = "requestinvite">Request</a><br><br>
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

$("#servlink").click(function(){
$('html, body').animate({
	scrollTop: $("#services").offset().top
}, 1000);});
$("#contlink").click(function(){
$('html, body').animate({
	scrollTop: $("#contact").offset().top
}, 1000);});
$("#aboutlink").click(function(){
$('html, body').animate({
	scrollTop: $("#about").offset().top
}, 1000);});
$("#pricelink").click(function(){
$('html, body').animate({
	scrollTop: $("#price").offset().top
}, 1000);});
$("#goodslink").click(function(){
$('html, body').animate({
	scrollTop: $("#goods").offset().top
}, 1000);});


 
});
</script>


	
			