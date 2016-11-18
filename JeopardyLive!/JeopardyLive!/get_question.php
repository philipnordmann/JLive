<?php
include("helper.php");
echo file_get_contents( "template_game.html" );

$points = $_GET["p"];
$k_id = $_GET["k_id"];


$question = get_question(get_question_id($k_id,$points));


_createQuestionTile("get_answer.php?f_id=".get_question_id($k_id,$points),"",$question,"50 double-tile");

?>