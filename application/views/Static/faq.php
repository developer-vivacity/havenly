<?php 
	include(APPPATH.'/views/templates/header.php');
?>

   <div class="top-nav">
    <div class="nav-left">
       <div class="account-nav-logo"><a href="<?php echo base_url();?>"><img src = "<?php echo base_url('assets/Images/Blue_dalle.png');?>" height = "100"></a></div>
     
    </div><!-- nav left -->
    <div class="nav-right">
      <ul>
        <li><a id="startbutton" class="button3" href="#overlay">&nbsp;GET STARTED</a><li>
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
          
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- top nav -->

 <div class = "white">	
<div class = "container"><BR><BR>
<div class = "text-center blue_text serif large">
Frequently Asked Questions</div>
<div id = "faq">
<BR><BR>


<h3> How does this whole thing <span>work?</span></h3>
<div><p>It works rather easily!<BR><BR>

First, answer some questions about your design preferences and about the room that you want to get decorated. Based on your survey answers, Havenly will set you up with one of our interior designers.
<BR><BR>2. Your designer will contact you to chat about your needs, style preferences, and visions for your space. Your initial consultation will last approximately 20-30 minutes. After the call, your designer will follow-up with you if any additional information or photos are needed.
<BR><BR>3.	Within three business days, your designer will send you two concept boards based on your initial consultation. You provide your own detailed feedback to your designer on both of the concept boards, to help us further refine your vision.
<BR><BR>4.	After your designer has received all your feedback, he or she will send a final visualization for your new room, along with a list of products, prices, and alternate options. You pick which items you’d like to buy, and we’ll do the purchasing for you! Just wait for everything to show up at your door. 

<BR><BR>It’s now that easy to get yourself decorated.
	</p></div>
	
<h3>This sounds like it costs an arm and a leg, and I'm not sure that I actually want to sell my appendages. How much is it <span>going to cost me?<span></h3>
<div> <p>Havenly offers design services for a flat fee. Your fee covers two phone calls, 
two revisions of your original concept board, one final visualization, and our purchasing services.  We source your items from retailers and wholesalers, and try our best to fit your budget.  Obviously, we can't work magic, but we like to think we can pretty any place up.
</p></div>
<h3>When do I find out how much the <span>entire room costs?</span></h3>
<div><p>Your total cost will consist of the design fee, cost of the furnishings, shipping and sales tax. When your designer sends you a design package, you will receive an items list with all of the prices, along with a shipping estimation and sales tax for your state.</p></div>
<h3> But I’m poor! Kind of. <span>I have a small budget - can you guys still help me?</span></h3>
<div><p>Yes! We believe that everyone has the right to a beautiful home, even if you're not one of those kids from My Super Sweet 16. Your designer will ask you about your budget, and source items and furnishings that fit within what you can afford. Even if you can’t buy everything at once, you can always sign back in at a later time and purchase from your personalized design package at a later date, as long as the items are available.</p></div>

<h3> Okay, this all sounds good. However, I don’t really have that much time to devote to this but I just want my new room designed. <span>How much of a time commitment is it on my part?</span></h3>
<div><p>Yes – you can give your designer as much feedback or as little feedback as you’d like – it’s totally up to you how involved you’d like to be within the design process. We built Havenly so that all of us, even people who don’t have strong opinions on pillow fabrics, can live in a gorgeous space.</p></div>

<h3>What <span>kind of items</span> do you source?</h3>
<div><p>We use a mix of retailers and wholesalers to make sure that we can design for all types of tastes, preferences, and budgets. </p></div>

<h3>Why <span>should I buy</span> the products from you?</h3>
<div><p>Because entering in your credit card, shipping address, billing address, name, phone number, on six different websites is incredibly annoying , we will do it for you since we love you all so much. You pay retail price (same as if you were to go to the retailers themselves) and we will guarantee lowest price in the off chance that you find an item for a lower price elsewhere.</p></div>
<h3>Okay so then why are my <span>shipping costs</span> so darned high?</h3>
<div><p>The shipping costs we quote are directly from our vendors, and we will always be transparent with what they charge. </p></div> 
<h3><span>What is this white glove delivery</span> you keep talking about in my final invoice?</h3>
<div><p>	For some of the larger furniture items (bed, couch, chairs, tables, etc), your items will arrive via in home delivery service. The items will ship via ground and the delivery service will contact you to set up an appointment within a four hour window for which day is most convenient for you. The delivery service will unpack and inspect the items, set the items up, and remove any packaging.  Trust us, it's way more fun than trying to fit your couch in your car.</p></div>
<h3>What about <span>returns?</span></h3>
<div><p>Each vendor has specific return policies, but most items are able to be returned, if they are in new condition, within 30 days – shipping and restocking fees may apply. Some customized items may be non-refundable, those items, however, will be clearly marked and your designer will always let you know about any return policies.
</p></div>

<h3> Yay!  So my decorator is, like, <span>my new BFF, right</span>? She's going to come shopping with me and have cocktails with me, and install all my stuff, right?</h3>
<div><p>As fun as our decorators are to drink with (trust us, we know), the  reason why we are so much cheaper than traditional interior design services is because we take out the on-site consultations and installations. Feel free to email your designer for any last minute questions, and to rave about your new space!	</p></div>
</div><BR><BR></div></div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

<script>
$(document).ready(function() {
	$('#faq h3').each(function() {
		var tis = $(this), state = false, answer = tis.next('div').hide().css('height','auto').slideUp();
		tis.click(function() {
			state = !state;
			answer.slideToggle(state);
			tis.toggleClass('active',state);
		});
	});
});
</script>