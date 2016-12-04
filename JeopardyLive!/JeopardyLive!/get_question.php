<?php
include ("helper.php");
echo file_get_contents ( "template.html" );

$points = $_GET ["p"];
$k_id = $_GET ["k_id"];
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
<?php
$q_id = get_question_id ( $k_id, $points );
$question_data = get_question ( $q_id );
$question = $question_data ['frage'];


if ($question_data ['filetype'] == "NONE") {
	_createQuestionTile ( "#", "abfahrt('get_answer.php?p=" . $points . "&q_id=" . $q_id . "')", $question, "100 triple-tile", "" );
} elseif ($question_data ['filetype'] == "AUDIO") {
	_createQuestionTile ( "#", "abfahrt('get_answer.php?p=" . $points . "&q_id=" . $q_id . "')", $question, "100 triple-tile", "" );
	?><audio controls autoplay>
			<source src="<?php echo $question_data ['file'];?>" type="audio/mpeg">
		</audio>
<?php
} elseif ($question_data ['filetype'] == "PICTURE") {
	_createQuestionTile ( "#", "abfahrt('get_answer.php?p=" . $points . "&q_id=" . $q_id . "')", $question, "100 ultra-tile", "" );
	?><img src="<?php echo $question_data ['file'];?>"/>
<?php
}
?>
