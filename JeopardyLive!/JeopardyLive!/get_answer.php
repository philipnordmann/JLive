<?php
include("helper.php");
echo file_get_contents( "template_game.html" );

$f_id = $_GET["f_id"];

$answer = get_answer($f_id);

_createQuestionTile("JGameScreen.php","",$answer,"50 double-tile");

?>