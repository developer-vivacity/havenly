	</div>

<div class = "footer">
 <div class = "padding_left block white_text">
<br><br>
<ul>
<li> <a href = <?php echo base_url('index.php/Users/site/howwework');?>>How we work</li>
<li> <a href = <?php echo base_url('index.php/Users/site/whoweare');?>>About</li>
<li><a href = "http://blog.havenly.com">Blog</a></li>
</ul><br>
<p class = "cursive small">Designed with love in beautiful Colorado.</p>

</div>
<div class = "block2">
<ul>
<li><a href = "http://www.facebook.com/thehavenly"><img src = <?php echo base_url("assets/Images/fbicon.png")?> align="middle"></a> </li>
<li><a href = "http://www.twitter.com/thehavenly"><img src = <?php echo base_url("assets/Images/twicon.png")?> align="middle"></a> </li>
<li><a href = "http://www.pinterest.com/thehavenly"><img src = <?php echo base_url("assets/Images/pinicon.png")?> align="middle"> </a></li>
</ul>

</section>
</div></div>
<script>
var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
if (isMobile)
{
var viewportWidth = $(window).width();
	$(".footer li").css("font-size", "4em");
	$(".footer ul li").css("display", "block");
	$(".footer ul li").css("height", "50");
	$(".footer").height(300);
	}

</script>
</body>
</html>