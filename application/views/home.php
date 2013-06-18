<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<a id = "hidden_link" href = "#welcome"></a>
<div class="navmenu">  
    <ul>  
        <li><a href=<?php echo base_url('index.php/Users/site/whoweare');?>>About</a></li>  
        <li><a href=<?php echo base_url('index.php/Users/site/howwework');?>>How we work</a></li> 
		<li><a href=<?php echo base_url('index.php/Users/site/pricing');?>>Pricing</a></li> 		
      	<li><a href=<?php echo base_url('index.php/Users/site/login');?>>Log In</a></li>  
		</ul>  
  
</div>  


<div class = "coverimage">


<div class = "horizontal">
<div class = "login_button_main right-align">
<div class = "inline padding_small right-align">	
	<ul class = "menu_bar midsmall white_text">
		<li class = "inline midsmall sanslight"> <a  class = "white_text" href = <?php echo base_url('index.php/Users/site/whoweare');?>>about</li></a>
		<li class = "inline midsmall sanslight"> <a  class = "white_text" href = <?php echo base_url('index.php/Users/site/howwework');?>>how</li></a>
		<li class = "inline midsmall sanslight"> <a  class = "white_text" href = <?php echo base_url('index.php/Users/site/pricing');?>>price</li></a>
		<li class = "inline midsmall sanslight"> <a  class = "white_text" href = <?php echo base_url('index.php/Users/site/products');?>>goods</li></a>
		<li class = "inline midsmall sanslight"><a class = "button4 pink white_text sanslight" href=<?php echo base_url('index.php/Users/site/login');?>>LOG IN</a></li>  
	</div>
	
	
	
	</div>


</div>				

	
	
	<div class="hero_text"><br><br>
	<div class = "center">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=140></a>
	<div class = "bgM horizontal right-align">
	  <a class = "button1 right-align inline condensed margin white_text midlarge" id="pull"> &#9776; </a>  
</div>	
		<div class = "padding_small">
			<p class = "large condensed"><BR>
			YOUR PLACE JUST GOT <p class = "extralarge condensed">BETTER.</p><br><BR>
				
			<p class = "medium space sanslight">
			Your room, decorated and delivered.
			</p><BR><br>
			<div class = "center">
		<a id = "startbutton" class = "button3 half sanslight medium inline white_text">
		&nbsp;&nbsp;GET STARTED&nbsp;&nbsp;
		</a>
	
		</div>
				</div>
	
	
</div>	</div></div>

<div class = "horizontal back white center padding_small_top middle" id = "titlerow">

</div>


<div class = "horizontal"><br><br><br><br>
<div id = "description" class = "paddingmob"><BR><BR>
<p class = "black_text serif center large">Your very own decorator.</p><br>
<p class = "sanslight medium space center">Let our decorators help you pull your room together. For one very low flat fee. </p>
<br><BR><BR></div>
<div class = "row center">
<div class= "third top  center inline padding_left"> 
	<img src= <?php echo base_url('assets/Images/Desc_1.png');?> height="125"><br><br>
	<p class = "condensed medium ">TELL US ABOUT YOU</p>
<BR>
	<p class = "sanslight seventy midsmall space">
		Get started by telling us a little about you and your room.  
			</p>
	</div>

<div class = "third top center padding_small_sides inline">
	<img src= <?php echo base_url('assets/Images/Desc_2.png');?> height="125px"><br><br>
	<p class = "condensed medium">BUY WHAT YOU LOVE</p>
<BR>
	<p class = "sanslight seventy  midsmall  space">Our professional designers decorate your place, with your input. </p>
	</div>

<div class = "third top center inline padding_right">
<img src= <?php echo base_url('assets/Images/Desc_3.png');?> height="125px"><br><br>
<p class = "condensed medium">ENJOY YOUR ROOM</p>
<BR>
	<p class = "sanslight seventy midsmall space">
	We deliver everything you need.  Show off your new room!  </p>
 
</div>
  <br><br><br><br><br>	<p class = "serif midlarge black_text"><span> No minimums or commitments.</span>  Ever.</p><br><br><br><BR><BR>

</div></div>
<div class = "horizontal center blue"><br><br><br><br>
<div class = "half top inline">
<BR><BR>
<hr class = "seventy style2">
<div class = "centerline">
<span class = "blue small sans-serif white_text">HOW HAVENLY WORKS
</span></div>
<p class = "seventy paddingmob midlargeplus serif white_text">
It's pretty easy.  You tell us a bit about you.  We do the work.</p></div>
<div class = "half inline">
<iframe id = "video" src="http://player.vimeo.com/video/68198071" width="500" height = "315" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
</div>
<BR><BR><BR><BR><BR>
</div>

<div class = "horizontal center padding_small_top bgcontainer"><BR><BR>
<p class = "seventy large center pink_text condensed">
Try us out  <a class = "pink_text cursive" id ="startbutton2" href = "#overlay"> here &rarr;</a></p><br>
<p class = "serif small pink_text">
(we don't bite)</p><BR><BR>
</div>
<div id = "overlay">
<div class = "boxoverlay"><div class = "paddingmob dark_gray_text padding_small">
<a class = "close sanslight small paddingmob padding_small light_gray_text">X Close</a><BR><BR>
<p class = "large condensed">YOU LIKE US!</p>
<hr class = "seventy style">
<p class = "condensed midsmall padding_small">Havenly is currently open to people with an invitation in selected cities.  To request an invite, submit your email address and zip code, and we'll hit you back.<br><br>
</p>
<form name="signup" method="post" action=<?php echo base_url('index.php/Users/site/requestinvite');?>>
<div class = "horizontal">
<label class = "half condensed midsmall middle inline" for="Email">Email Address:</label><br><br>
<input class = "half middle inline" type="text" name="email" value="" id="email" maxlength="30"/>
</div><br><br>
<div class = "horizontal">
<label class = "half condensed midsmall middle inline" for="Zipcode">Zipcode:</label><br><br>
<input class = "half middle inline" type="text" name="zipcode" value="" id="zipcode" maxlength="30" /></div><br><br>
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

		


<?php 
	include(APPPATH.'/views/templates/footer.php');
?>


		
				


<script>

$("#titlerow").hide();

$(document).ready(function(){
		
$(window).on("load", function(){		
handleimage();


});

$(window).resize(function(){
handleimage();
});

$(".coverimage").one("load", function(){
alert('yay');
});

function handleimage(){
	var sHeight = $(window).height();
	$(".coverimage").height(sHeight);
		}

	
		
$("#startbutton, #startbutton2").click(function(){
	$("#overlay").fadeIn(1000);
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

 $("#pull").on('click', function(){
	$(".navmenu ul").slideToggle();
    });  
});
</script>



	
			