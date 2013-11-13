<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>

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
              <li class="active"><a href = "<?php echo base_url();?>">Home</a></li>
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator')?>">Rooms</a></li>
              <li><a>Designs</a></li>
			               </ul>
			<ul class = "nav pull-right black_text">
			
			<li><a class = "black_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>

	  <div class = "white">
	  <div class = "container">
	  <BR><BR><BR><BR>
	  <input type = "hidden" value= "<?php echo base_url()?>" id="siteurl" name = "siteurl"/>
	 
	  
	  <div id = "conceptproducts">
	   
	   <?php 
		foreach ($conceptproducts as $products)
		{
			echo '<div class = "row well"><div class = "span3 sanslight midsmall middle">';
			echo $products->category;
			echo '<hr class = "style">';
			echo '<div class = "small dark_gray_text sanslight">USER COMMENTS: <span class = "black_text">'.$products->comments.'</span></div>';
			echo '</div>';
		
		
			echo '<div class = "span3"><img src = "'.$products->filename.'" height = "50px"></div>';
			echo '<div class = "sanslight span1">$'.$products->price.'</div>';
			echo '<div class = "span1">';
			echo '<a class = "button4" href = "'.base_url('index.php/Admin/site/deleteproductconcept/'.$concept_id.'/'.$products->id).'">Delete</a></div>';
			
			echo '</div>';
			
	   }?>
	   <BR><BR><BR>
	  <?php  $attributes = array('class' => 'productform', 'id' => 'addproducts');
		echo form_open('Admin/site/addproductconcept',$attributes);
		
		?>
	   <div class = "text-center row serif medium">Add New Products</div>
	   <BR><BR><BR>
	    <input type = "hidden" value = "<?php echo $concept_id;?>" id="concept_id" name = "concept_id"/>
	   <?php 
	  
		$count = 0;
		echo '<div class = "row" id = "row'.$count.'">';
		?>
	  
	  <div class = "span3">
	<?php 
	echo '<input type = "hidden" name = "counthold" value = '.$count.' class = "counthold">';
	echo '<select class = "selecttype" name = "category" id = "select.'.$count.'">';
	 
	foreach ($types as $key){
	echo '<option value = "'.$key->type.'">'.$key->type;
	echo '</option>';
	  }
	echo '</select>';

	?>
	</div>
	<div class = "span5">
	<input type = "text" name = "weblink" value = "Image Link" class = "weblink" onclick="if(this.value=='Image Link'){this.value=''}" onblur="if(this.value==''){this.value='Image Link'}">
	<input type = "text" name = "price" value = "Price" class = "price" onclick="if(this.value=='Price'){this.value=''}" onblur="if(this.value==''){this.value='Price'}">
	</div>
	<div class = "span1">
	<?php echo '<a class = "productconsave button4 small white_text" onclick ="add_product_concept();">Save This</a>'; ?>
	</div>
	  
	  </div>
	  </form>
	  </div>
	  <br><BR><BR>
	  </div>
	  </div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>