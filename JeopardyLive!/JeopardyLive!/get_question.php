<?php
include("helper.php");
echo file_get_contents( "template_game.html" );

$points = $_GET["p"];
$k_id = $_GET["k_id"];
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

$question = get_question(get_question_id($k_id,$points));

_createQuestionTile("#","abfahrt('get_answer.php?p=".$points."&k_id=".$k_id."')",$question,"50 double-tile","");
//_createQuestionTile("#","abfahrt('get_answer.php?p=".$points."&k_id=".$k_id.""')",$question,"50 double-tile","");

?>