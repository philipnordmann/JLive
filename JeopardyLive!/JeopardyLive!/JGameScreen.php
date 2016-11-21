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
$katArray = explode("-",$_POST['katArray']);
//$katArray = array(
//    1 => 1,
//    2 => 2,
//    3 => 12,
//    4 => 13,
//    5 => 14,
//    6 => 15,
//);

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
    
    <table class = "customtable">
        <tr>
            <th width="16,66%"><?php echo catIdToName($katArray[0]); ?></th>
            <th width="16,66%"><?php echo catIdToName($katArray[1]); ?></th>
            <th width="16,66%"><?php echo catIdToName($katArray[2]); ?></th>
            <th width="16,66%"><?php echo catIdToName($katArray[3]); ?></th>
            <th width="16,66%"><?php echo catIdToName($katArray[4]); ?></th>
            <th width="16,66%"><?php echo catIdToName($katArray[5]); ?></th>
        </tr>
        <?php


     for($j = 100; $j <= 500; $j=$j+100)
     {
?>
        <tr>
            <?php
         for($i = 0; $i < 6; $i++)
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