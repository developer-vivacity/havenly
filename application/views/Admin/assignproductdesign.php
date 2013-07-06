<?php
echo '<p><a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'/index.php/Admin/site/currentroomwithuser/'.$roomid.'">Back</a></p>';
  echo '<div>';
 
?>
<table>
	<tr>
	<td>
		 Product for <?php echo $designname;?>: 
	</td>
	
	</tr>
<tr>
	
<td>
	
	<?php
	if(sizeof($productassign)==0)
	echo "NO PRODUCT ASSIGN";
        foreach($productassign as $key)
	{
	echo '<div style="float:left;width:110px;"><img src="'.$key->link.'" height="100px" width="100px"/><br><span>&nbsp;'.wordwrap($key->product_name,15,"<br />\n").'</span></div>';
			
	}
	?>

</td>
</tr>
<tr>
<td>&nbsp;</td></tr>
<tr>

<td>Design Images:</td></tr>


<tr>
<td>

<?php
if(sizeof($designimage)==0)
echo "NO DESIGN IMAGE";
foreach($designimage as $key)
{
	
echo '<div style="float:left;width:110px;"><img src="'.$key->filename.'" height="100px" width="100px"/></div>';
	
	
}


?>

</td>

</tr>


</table>
