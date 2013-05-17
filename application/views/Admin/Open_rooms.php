<?php 
	include(APPPATH.'/views/templates/header2.php');
?>

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
echo '<p class = "title">';
echo date('m.d.y',strtotime($room_data[0]['Timestamp'])).' '.$room['status'];
echo '</p>';
echo "</a>";
echo "<hr class = 'style'>";
echo "</div></div></div>";
echo "<br><br><br>";

}