<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<div class = "center bgcontainer"><BR>
<div class = "seventy" style= "height:80px;">
<table class = "left-align">
<tr><td width = "82%">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=90></a>
</td>
<td width= "100%">
<?php
 echo '<a class = "condensed black_text medium" href="#">&nbsp;&nbsp;XXXX&nbsp;&nbsp;</a>';
 echo '<a class = "condensed black_text medium" href="'.base_url().'index.php/Users/site/logout/">&nbsp;&nbsp;XXXX</a>'; 
?>
</td></table>
</div>
<BR><BR>


<div class = "center">
<br>
<div class = "seventy border white">

<?php 

// print_r($room_data);

foreach ($room_data as $room){
echo "<br>";
echo '<div class = "border">';
$html = base_url('index.php/Admin/site/show_contest/'.$room['id']);
echo "<div class = 'horizontal center'>";
echo "<a href = {$html}>";
echo "<img src = '{$room['room_photo1']}' height=150>";
echo '<div class = "inline top padding_small">';
echo '<p class = "sanslight medium">';
echo date('m.d.y',strtotime($room_data[0]['Timestamp'])).' '.$room['status'];
echo '</p>';
echo "</a>";
echo "<hr class = 'style'>";
echo "</div></div></div>";
echo "<br><br><br>";

}
?>
</div>
<div class = "push"> 
</div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
</div>