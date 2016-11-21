<?php
include("db.php");
include("helper.php");
echo file_get_contents( "template_game.html" );
$points_done = null;
$id_done = null;
$overlayArr = "";
if ($_POST) {
    $katArray = explode("-",$_POST['katArray']);

    if($_POST['overlayArr']){
        $overlayArr = $_POST['overlayArr'];
    }

?>
<script>
    function post(path, params, method) {
        method = method || "post"; // Set method to post by default if not specified.

        // The rest of this code assumes you are not using a library.
        // It can be made less wordy if you use one.
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for (var key in params) {
            if (params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }


    function abfahrt(link) {
                post(link, { katArray: <?php echo "'".$_POST['katArray']."'";?>, overlayArr: <?php echo "'".$overlayArr."'";?> });
    }
</script>
<?php
}
if ($_GET) {
    $points_done = $_GET["p"];
    $id_done = $_GET["k_id"];
}
?>
<body>

    
    <table class = "customtable">
        <tr>
            <?php for ($x = 0; $x < 6; $x++) {
            ?>
            <th width="16,66%">
                <?php echo catIdToName($katArray[$x]); ?>
            </th>
            <?php
                  }
            ?>
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
         if($points_done != null && $id_done != null && $j == $points_done && $katArray[$i] == $id_done){
             _createTile("#","abfahrt('get_question.php?k_id=".$katArray[$i]."&p=".$j."')",$j,"100 double-tile gray","");
         }else{
             _createTile("#","abfahrt('get_question.php?k_id=".$katArray[$i]."&p=".$j."')",$j,"100 double-tile","");
         }
                    ?>

                </td>
                <?php } ?>
            </tr>
            <?php
 }
            ?>

</table>

Team 1

</body>