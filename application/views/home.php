<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<a id = "hidden_link" href = "#welcome"></a>
<div class="navmenu">  
    <ul>  
        <li><a href=<?php echo base_url('index.php/Users/site/whoweare');?>>About</a></li>  
        <li><a href=<?php echo base_url('index.php/Users/site/howwework');?>>How we work</a></li>  
        <li><a href="#">1-888-978-3152</a></li>  
      </ul>  
  
</div>  


<div class = "coverimage">
<div class = "bgM horizontal right-align">
	  <a class = "button1 right-align inline condensed margin white_text midlarge" id="pull"> &#9776; </a>  
</div>	

<div class = "horizontal">
<div class = "login_button_main right-align">
<div class = "inline padding_small right-align">	
	<ul class = "menu_bar midsmall white_text">
	<li class = "inline midsmall condensed"> <a  class = "white_text" href = <?php echo base_url('index.php/Users/site/whoweare');?>>ABOUT</li></a>/
		<li class = "inline midsmall condensed"> <a  class = "white_text" href = <?php echo base_url('index.php/Users/site/howwework');?>>HOW WE WORK</li></a>/
			
		<li class = "blue_text midsmall condensed inline"> 1-888-978-3152</li>
		
	</div>
	
	
	
	</div>
	
<div class = "logo">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=120></a>
</div>
</div>				

	
	
	<div class="hero_text"><br><br>
		<div class = "padding_small">
		<p class = "midlargeplus dark_gray_text sanslight">
			YOUR ROOM, DECORATED AND DELIVERED.</p>
			<hr class = "seventy style1">
		<p class = "extralarge dark_gray_text condensed">
			YOUR PLACE JUST GOT BETTER.</p><br>
			<br>
		<a id = "startbutton" class = "button3">
		<p class = "condensed bottom inline midlarge white_text">GET STARTED&nbsp;
		<p class = "inline cursive bottom white_text midlarge">here</p></a>
				
	
	
</div>	</div></div>

<div class = "horizontal back white center padding_small_top middle" id = "titlerow">

</div>


<div class = "horizontal"><br><br><br><br>
<div id = "description" class = "paddingmob">
<p class = "blue_text serif padding_left large">Your very own personal decorator.</p><br>
<p class = "dark_gray_text sanslight medium space padding_right padding_left">Let our decorators help you pull your room together. Whether you’re starting from scratch or you just need a little flair. We work around the room you already have to suggest items that will complete your style. And if you like it, we deliver it all to you. No catch, really.</p>
<br><BR></div>
<div class = "row center">
<div class= "third top dark_gray_text center inline padding_left"> 
	<img src= <?php echo base_url('assets/Images/Desc_1.png');?> height="105"><br><br>
	<p class = "condensed medium dark_gray_text">TELL US ABOUT YOU</p>
	<hr class = "style">
	<p class = "sans-serif small dark_gray_text space">
		Get started by telling us a little about you and your room.  
		<span>Snap a pic</span>, fill out the quick form, and we'll get to work.  We'll match you with a designer that shares your style.
	</p>
	</div>

<div class = "third top gray_text center padding_small_sides inline">
	<img src= <?php echo base_url('assets/Images/Desc_2.png');?> height="105px"><br><br>
	<p class = "condensed medium dark_gray_text">BUY WHAT YOU LOVE</p>
	<hr class = "style">
	<p class = "sans-serif small dark_gray_text space">Our professional designers decorate your place, and show you how your room would look with the <span>items they have picked</span>. You tell us what you'd like to buy (or rent!), and we send it to you as quickly as we can. </p>
	</div>

<div class = "third top gray_text center inline padding_right">
<img src= <?php echo base_url('assets/Images/Desc_3.png');?> height="105px"><br><br>
<p class = "condensed medium dark_gray_text">ENJOY YOUR ROOM</p>
	<hr class = "style">
	<p class = "sans-serif small dark_gray_text space">
	We deliver everything you need.  Show off your new room! Check back in with us for more fun items, your designer will continue to find you items that you love.  You have <span>no commitment</span> to buy!
 </p>
 
</div>
  <br><br><br><br><br>	<p class = "serif midlarge dark_gray_text"><span> No minimums or commitments.</span>  Give us a try! (it's free)</p><br><br><br>

</div></div>
<div class = "horizontal center light_gray"><br><br><br><br>
<div class = "half top inline">
<BR><BR>
<hr class = "seventy style3">
<div class = "centerline">
<span class = "light_gray small sans-serif dark_gray_text">HOW HAVENLY WORKS
</span></div>
<p class = "seventy paddingmob midlargeplus serif dark_gray_text">
It's pretty easy.  You tell us a bit about you.  We do the work.</p></div>
<div class = "half inline">
<iframe id = "video" height="315" width = "500" src="http://www.youtube.com/embed/UxMgM_TCbPE" frameborder="0" allowfullscreen></iframe>
</div>
<BR><BR><BR><BR><BR>
</div>

<div class = "horizontal center padding_small_top white"><BR><BR>
<p class = "seventy large center pink_text condensed">
Try us out  <a class = "pink_text cursive" id ="startbutton2" href = "#overlay"> here &rarr;</a></p><br>
<p class = "serif small pink_text">
(we don't bite)</p><BR><BR>
</div>
<div id = "overlay">
<div class = "boxoverlay"><div class = "paddingmob dark_gray_text padding_small">
<a class = "close sanslight small paddingmob padding_small light_gray_text">X Close</a><BR><BR>
<p class = "large condensed">YOU LIKE US!</p>
<hr class = "seventy style3">
<p class = "condensed midlarge">We're in like with you too.</p>
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
<a class = "button3 pink white_text serif" id = "requestinvite">Request</a><br><br>
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
$(".hero_text").hide();

$(document).ready(function(){


$(window).on("load", function(){
		handleimage();
});


var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
if (isMobile)
{
	
	}
else{
$("#titlerow").fadeIn(500);

$(window).resize(function(){
handleimage();
});}



function handleimage(){
	var sHeight = $(window).height();
	var sWidth = $(window).width();
	$(".coverimage").height(sHeight);
	
	$(".hero_text").show().animate({top:(sHeight/3)}, {duration: 2200, easing: 'easeInOutBack'});
	
	if(sHeight>300){
		$("#titlerow").css("position", "absolute");
		$("#titlerow").css("top", sHeight-25);
		}
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



	
			