<?php
echo file_get_contents ( "template.html" );
if (isset ( $_POST ['winner'] )) {
	$winner = $_POST ['winner'];
} else {
	$winner = 0;
}

if ($winner == 1) {
	$text = "Team 1 hat gewonnen!";
}
elseif ($winner == 2){
	$text = "Team 2 hat gewonnen!";
}
else {
	$text = "Unentschieden!";
}
?>
<p class="winner"><?php echo $text;?></p>
