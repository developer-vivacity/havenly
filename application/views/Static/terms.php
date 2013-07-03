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

	  <div class = "white">	  <BR><BR><Br><Br><Br>
	  <div class = "container">
	  <div class = "row">
	  <div class = "span6 offset3">
	  <p class = "midsmall condensed">
1. Please read these Terms of Use as by using the website www.havenly.com (hereafter called The Site) you agree to be legally bound by these terms which will take effect immediately on use of the Site. If you do not agree to be legally bound then please do not access the Site.
<BR><BR><BR>Exclusion of Liability<BR>
<BR><BR>2. While we have taken all reasonable steps to ensure the accuracy and completeness of the information on the Site, we give no warranty and make no representation regarding the accuracy or completeness of the content of this website. Consequently, we accept no liability for any losses or damages arising out of errors or omissions contained in the Site.
<BR><BR>3. No warranty is given that the website shall be available on an uninterrupted basis, and no liability can be accepted in respect of losses or damages arising out of such unavailability.
<BR><BR>4. We accept no liability in respect of losses or damages arising out of changes made to the content of this website by unauthorised third parties.
<BR><BR>5. Access to and use of this website is at the user's own risk and we do not warrant that the use of the Site or any material downloaded from it will not cause damage to any property, including but not limited to loss of data or computer virus infection.
<BR><BR>6. Nothing in these terms and conditions shall attempt to exclude liability for death or personal injury, or for fraudulent misrepresentation.
<BR><BR><BR>Copyright<BR><BR>
7. All rights, save as expressly granted, are reserved to Havenly, Inc. Reproduction in any form of any part of the contents of the Site is prohibited.
<BR><BR><BR>Prohibited Use<BR><BR>
<BR><BR>8. You agree to use the Site for lawful purposes only, and in a way that does not infringe the rights of, restrict or inhibit anyone else's use and enjoyment of the Site.
<BR><BR>9. You agree not to attempt to alter the content of Havenly, Inc.in any way.
<BR><BR><BR>Privacy and Confidentiality<BR><BR>
<BR><BR>10. By agreeing to be bound by these terms and conditions, you confirm that you have read, understood and agreed to our Privacy Policy.
<BR><BR><BR>Governing Law and Jurisdiction<BR><BR>
<BR><BR>11. You agree that the terms and conditions of use of this website are governed by United States and Delaware law and any dispute regarding this website shall be subject to the exclusive jurisdiction of the courts in Delaware.
<BR><BR><BR>Changes to Terms and Conditions<BR><BR>
<BR><BR>12. The contents of the Site, including these terms and conditions of use, are subject to change by us without prior notification to you.
Regulatory Information
<BR><BR>13 Havenly Inc.is a company incorporated in Delaware.
<BR><BR><BR>
</div></div></div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
