<?php
include("helper.php");
echo file_get_contents( "template_game.html" );

$points = $_GET["p"];
$k_id = $_GET["k_id"];
$answer = get_answer(get_question_id($k_id,$points));

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
                post(link, { katArray: <?php echo "'".$_POST['katArray']."'";?> });
    }
</script>
<?php

_createQuestionTile("#","abfahrt('JGameScreen.php?p=".$points."&k_id=".$k_id."')",$answer,"50 double-tile","");

createTile("JGameScreen_next.php?id_done=".$k_id."&points_done=".$points."","gewusst!","50 tile");
createTile("JGameScreen_next.php?id_done=".$k_id."&points_done=0","nicht gewusst!","50 tile");

?>