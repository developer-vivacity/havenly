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
		<a class="brand" href="<?php echo base_url();?>">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
              <li><a id = "servlink" href="<?php echo base_url().'/#services';?>">Services</a></li>
              <li><a id = "pricelink" href="<?php echo base_url().'/#price'; ?>">Cost</a></li>
			      <li><a id = "goodslink" href="<?php echo base_url().'/#goods';?>">Goods</a></li>
              <li><a id = "aboutlink" href="#">About</a></li>
              <li><a <a id = "contlink"href="#contact">Contact</a></li>
            </ul>
			<ul class = "nav pull-right white_text">
			
			<li><a class = "white_text sanslight" href = "<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>

<section id="goods" class = "white"><br><br></section>
			<div id="projectwrap3">
	  		<header class="clearfix">
		  		<div class="container">
		  		 	<div class="span12">
		  		 		<div class="boxcolor">
		  				<h1>THE PEOPLE</h1>
		  				</div>
		  			</div><!-- span12 -->
		  		</div><!-- container -->
	  		</header>
		</div><!-- projectwrap -->
		
    	<div id="projectwrap_2" class = "white">
    	<div id="aboutwrap">
    		<div class="container">
							<br>
							<BR><BR><BR>
							<BR>
				<div class = "row">
					<div class = "span12 center">
						<h2 class = "midlarge center sanslight">
								Whether you stare longingly at your ever-growing pinterest page, or you just want someone to take care of decorating for you - we get it.
								</h2>
						<BR><BR><BR><BR><BR><BR><BR>
				</div>
				<div class="row">
					<div class="span4">
						<h3>Meet the team.</h3>
						<h4>We've been there. We know you're busy, we know you don't want to pay too much, because we don't either.</h4><BR><BR>
						<h4>So you move every other year?  
						Think it's too much work to get a coordinated room? Afraid you'll scare people away with your bachelor pad?  
						
						<BR><BR>We built Havenly to help.</h4>
					</div><!-- span4 -->
					
					<div class="span4">
						<div class="about_item">
							<div class="about_item_center">
								<img class = "translucent img-circle" src = <?php echo base_url('assets/Images/Lee.jpg');?> height=150><br><br>
								<div class="clear"></div>
				                <h3>Lee Mayer</h3>
				                
<p class = "sanslight small dark_gray_text">
Lee is a Denver resident who misses the East Coast. 
She was formerly a VP at Bankrate, a consultant at Bain, and worked in strategy and corporate development at Canon. 
<br><br>Lee has an MBA from Harvard Business School and a B.S. from Columbia University.<br><br>
She loves cows and has most recenly learned to ski.  Ask her about her collection of speeding tickets.</p>
							</div>
						</div><!-- about_item -->
					</div><!-- span4 -->
					
					<div class="span4">
						<div class="about_item">
							<div class="about_item_center">
							<img class = "translucent img-circle" src = <?php echo base_url('assets/Images/Emily.jpg');?> height=150><br><br>
								<div class="clear"></div>
				                <h3>Emily Motayed</h3>
				                <p class = "sanslight small dark_gray_text">Emily is a DC gal at heart, but is currenly a nomad traveling between Denver, Chicago and NYC.
								She was formerly in marketing at American Express, and a consultant for Huron Consulting.
							<br><br>Emily has a B.A. from Vanderbilt University.<br><br><br>
							She hates working out, and has strayed quite far from her childhood ambition to be a grocery store baker.</p>
							</div>
						</div><!-- about_item -->
					</div><!-- span4 -->
					
				</div><!-- End Row -->
    		</div><!-- End aboutwrap -->
		</div><!-- End Container -->
</div>

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
		</div>