<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>


<?php 
 echo '<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a>';
?>
<div id="div_show_error_message"></div>
<?php

$querytype  = (sizeof($additionalroomdetails)==0?"insert":"update");
$attributes = array('class' => 'updateform', 'id' => 'updateform','enctype' => 'multipart/form-data');
echo form_open('Admin/site/additional_details_user_room/',$attributes);
echo '<input type="hidden" name="querytype" value="'.$querytype.'">';

echo '<input type="hidden" value="'.$roomid.'" name="roomid"/>';

?>

<?php 
$stylenotes="";
$ceilingheight="";
$hates="";
$likes="";
$keep="";
$buy="";
$checked="";
$sel="";
$buyitems=array('1'=>'Couch','2'=>'Coffee Table','3'=>'Bed','4'=>'Bed Frame/Headboard','5'=>'Art','6'=>'Chair','7'=>'Dresser','8'=>'Décor items','9'=>'Linens/Sheets','10'=>'Pillows','11'=>'Media','12'=>'Side Tables/Console Tables','13'=>'Nightstands','14'=>'Other (should have a blank textbox next to this option)');

foreach($additionalroomdetails as $key)
{
$stylenotes=$key->Style_notes;
$ceilingheight=$key->Ceiling_Height;
$hates=$key->Hates;
$likes=$key->Likes;
$keep=$key->Keep;
$buy=$key->Buy;

}

echo'<table>';
echo
'<tr><td>Style notes</td><td><input type="textbox" value="'.$stylenotes.'" name="stylenotes" id="stylenotes"/></td></tr>
<tr><td>Ceiling Height</td><td><input type="textbox" value="'.$ceilingheight.'" name="ceilingheight" id="ceilingheight"/></td></tr>
<tr><td>Hates</td><td><input type="textbox" value="'.$hates.'" name="hates" id="hates"/></td></tr>
<tr><td>Likes</td><td><input type="textbox" value="'.$likes.'" name="likes" id="likes"/></td></tr>
<tr><td>Keep</td><td><input type="textbox" value="'.$keep.'" name="keep" id="keep"/></td></tr>
<tr><td valign="top">Buy </td><td><div>';
foreach($buyitems as $key=>$value)
{
$sel="";
if(in_array($key,explode(',',$buy)))
$sel="checked";
echo '<div>
<input type="checkbox" name="buy[]"  value="'.$key.'" '.$sel.'/>'.$value.'
</div>';
}
echo '</div>';
echo'</td></tr><tr><td colspan="2"><input type="button" value="update" name="addroominfo" id="addroominfo"/></td></tr>';

echo'</table>';
echo '<input type="hidden" value="'.$roomid.'" name="itemsbuy" id="itemsbuy"/>';
echo form_close();
?>
