<?php
include("db.php");
include("helper.php");
echo file_get_contents( "template_game.html" );
//if ($_POST) {
//    echo '<pre>';
//    echo htmlspecialchars(print_r($_POST, true));
//    echo '</pre>';
//}

//$thema = $_GET['thema'];
//$katArray = $_POST['katArray'];
$katArray = array(
    1 => 1,
    2 => 2,
    3 => 3,
    4 => 4,
    5 => 5,
    6 => 6,
);

$k_id = 1;

/*
$kategorie1 = $katarray(1);
$kategorie2 = $katarray(2);
$kategorie3 = $katarray(3);
$kategorie4 = $katarray(4);
$kategorie5 = $katarray(5);
$kategorie6 = $katarray(6);
*/
?>
<body>
    <table id="table" style="width:100%">
        <tr>
            <th>kat1</th>
            <th>kat2</th>
            <th>kat3</th>
            <th>kat4</th>
            <th>kat5</th>
            <th>kat6</th>
        </tr>
        <?php

 
     for($j = 100; $j <= 500; $j=$j+100)
     {
        ?>
        <tr>
            <?php
         for($i = 1; $i <= 6; $i++)
     {
            ?>
                <td>

                    <?php 
         createTile("get_question.php?k_id=".$katArray[$i]."&p=".$j."",$j,"100 double-tile");
                    ?>
                </td>
                <?php } ?>
            </tr>
            <?php
 }
            ?>

</table>

</body>