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
    3 => 12,
    4 => 13,
    5 => 14,
    6 => 15,
);
$id_done = $_GET["id_done"];
$points_done = $_GET["points_done"];
$k_id = 1;
echo $id_done;
echo $points_done;

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
            <th width="16,66%">Chipsatz</th>
            <th width="16,66%">RAM</th>
            <th width="16,66%">KM</th>
            <th width="16,66%">Drucker</th>
            <th width="16,66%">AEW</th>
            <th width="16,66%">WGP</th>
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
                if($j==$points_done&&$katArray[$i]==$id_done){
                    createTile("get_question.php?k_id=".$katArray[$i]."&p=".$j."","HALLO SIMON","100 double-tile");
                }else{
                    createTile("get_question.php?k_id=".$katArray[$i]."&p=".$j."",$j,"100 double-tile");
                }
                    ?>
                
                </td>
                <?php } ?>
            </tr>
            <?php
        }
            ?>

</table>


</body>