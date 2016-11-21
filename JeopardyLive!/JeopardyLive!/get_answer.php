<?php
include("helper.php");
echo file_get_contents( "template_game.html" );

$points = $_GET["p"];
$k_id = $_GET["k_id"];
//$f_id = $_GET["f_id"];

$answer = get_answer(get_question_id($k_id,$points));

_createQuestionTile("JGameScreen_next.php?id_done=".$k_id."&points_done=".$points."","",$answer,"50 double-tile");

createTile("JGameScreen_next.php?id_done=".$k_id."&points_done=".$points."","gewusst!","50 tile");
createTile("JGameScreen_next.php?id_done=".$k_id."&points_done=0","nicht gewusst!","50 tile");

?>