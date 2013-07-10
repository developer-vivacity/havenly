<?php
echo '<p><a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'/index.php/Admin/site/currentroomwithuser/'.$roomid.'">Back</a></p>';
  echo '<div>';
 
?>
<table>
	<tr>
	<td>
	Design Images:	 
	</td>
	
	</tr>
<tr>
	
<td>
	<?php
if(sizeof($designimage)==0)
echo "NO DESIGN IMAGE".'&nbsp;&nbsp;&nbsp;<a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'">Add Design Image</a>';
foreach($designimage as $key)
{
	
echo '<div style="float:left;width:110px;"><a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'"><img src="'.$key->filename.'" height="100px" width="100px"/></a></div>';
	
	
}


?>
	

</td>
</tr>
<tr>
<td>&nbsp;</td></tr>
<tr>

<td>

 Product for <?php echo $designname;?>:
</td></tr>


<tr>
<td>

<?php

	if(sizeof($productassign)==0)
	echo "NO PRODUCT ASSIGN".'&nbsp;&nbsp;&nbsp;<a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'">Add Product</a>';
        foreach($productassign as $key)
	{
	echo '<div style="float:left;width:110px;"><a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'"><img src="'.$key->link.'" height="100px" width="100px"/><br><span>&nbsp;'.wordwrap($key->product_name,15,"<br />\n").'</span></a></div>';
			
	}
	?>

</td>

</tr>


</table>
