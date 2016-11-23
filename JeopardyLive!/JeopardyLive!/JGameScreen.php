<?php
include ("db.php");
include ("helper.php");
echo file_get_contents ( "template_game.html" );
$game_statusString = "0-0-0";
$overlayArr = "";
if ($_POST) {
	$katArray = explode ( "-", $_POST ['katArray'] );
	
	if ($_POST ['overlayArrString']) {
		$overlayArrString = $_POST ['overlayArrString'];
	} else {
		$overlayArrString = "100-200-300-400-500;100-200-300-400-500;100-200-300-400-500;100-200-300-400-500;100-200-300-400-500;100-200-300-400-500;";
	}
	$overlayArr1 = explode ( ";", $overlayArrString );
	for($i = 0; $i < 6; $i ++) {
		$overlayArr [$i] = explode ( "-", $overlayArr1 [$i] );
	}
	
	if ($_POST ['game_status']) {
		$game_statusString = $_POST ['game_status'];
	}
	$game_status = explode ("-", $game_statusString);
}

if ($_GET) {
	$points_done = $_GET ["p"];
	if ($game_status[0] = "0") {
		$game_status[0] = 1;
		$game_status[1]+=$points_done;
	}
	else{
		$game_status[0] = 0;
		$game_status[2]+=$points_done;
	}
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

    function arrayToString(arr) {
		var retStr = "";
		for (var i = 0; i < 6; i++) {
			for (var j = 0; j < 5; j++) {
				retStr += arr[i][j] + "-";
			}
			
			retStr = retStr.substring(0,retStr.length-1)+";";
		}
		return retStr.substring(0,retStr.length);
		
	}


         function abfahrt(link, k, p) {
        	 	var overlayArrString = "<?php echo $overlayArrString;?>";
				var ovArr = [[0]];
        	 	var ovArr1 = overlayArrString.split(";");
        	 	for (var i = 0; i < ovArr1.length; i++) {
					ovArr[i] = ovArr1[i].split("-");
				}

				for (var i = 0; i < 6; i++) {
					for (var j = 0; j < 5; j++) {
						if (k == i && p == j) {
							ovArr[i][j] = "";
						}
					}
				}
				overlayArrString = arrayToString(ovArr);
				document.getElementById("test").innerHTML = overlayArrString;
				post(link, { katArray: <?php echo "'".$_POST['katArray']."'";?>, overlayArrString: overlayArrString, game_status:  <?php echo "'".$game_statusString."'"; ?>});
          		
                
    }
</script>
<body>


	<table class="customtable">
		<tr>
            <?php
												
												for($x = 0; $x < 6; $x ++) {
													?>
            <th width="16,66%">
                <?php echo catIdToName($katArray[$x]); ?>
            </th>
            <?php
												}
												?>
        </tr>
        <?php
								
								for($j = 100; $j <= 500; $j = $j + 100) {
									?>
        <tr>
            <?php
									for($i = 0; $i < 6; $i ++) {
										?>
                <td>
                    <?php
										if ($overlayArr [$i] [($j - 100) / 100] != "") {
											$p = ($j-100) / 100;
											_createTile ( "#", "abfahrt('get_question.php?k_id=" . $katArray [$i] . "&p=" . $j . "',".$i.",".$p.")", $j, "100 double-tile", "" );
										} else {
											_createTile ( "#", "", $j, "100 double-tile gray", "" );
										}
										?>

                </td>
                <?php } ?>
            </tr>
            <?php
								}
								?>

</table>
<?php

for($i = 0; $i < 6; $i ++) {
	for($j = 0; $j < 5; $j ++) {
		echo $overlayArr [$i] [$j];
	}
}
?>

<p id="test"></p>

</body>