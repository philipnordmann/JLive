<?php
include("helper.php");
echo file_get_contents( "template.html" );

$points = $_GET["p"];
$q_id = $_GET["q_id"];
$answer = get_answer($q_id);
if ($_POST) {
	$overlayArrString = $_POST ['overlayArrString'];
	$game_status = $_POST ['game_status'];
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
    	post(link, { katArray: <?php echo "'".$_POST['katArray']."'";?>, overlayArrString: <?php echo "'".$overlayArrString."'"; ?>, game_status:  <?php echo "'".$game_status."'"; ?>});
    }
</script>
<p>
<?php



_createQuestionTile("#","abfahrt('JGameScreen.php?p=".$points."&k_id=".$k_id."')",$answer,"100 triple-tile","");
?>
</p>
<p>
<?php
_createTile("#","abfahrt('JGameScreen.php?p=".$points."')","gewusst!","10 double-tile","");
_createTile("#","abfahrt('JGameScreen.php?p=0')","nicht gewusst...","10 double-tile right","");

?>
</p>