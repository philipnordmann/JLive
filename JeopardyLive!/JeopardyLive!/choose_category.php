<html lang="de">
<?php
include ("db.php");
include ("helper.php");
echo file_get_contents ( "template.html" );
$id = $_GET ['id'];
$queryResult = mysqli_query ( $connection, "select bezeichnung from themen where t_id = $id" );
$row = mysqli_fetch_array ( $queryResult );
$topic = $row ['bezeichnung'];
?>
<body>
	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="category.js"></script>
	<script type="text/javascript">
    $(function () {
        $(".search").keyup(function () {
            var searchid = $(this).val();
            
            if (searchid != '') {
            	var dataString = 'search=' + searchid + "&table=kategorien&id=<?php echo $id; ?>"
            }
            else {
            	var dataString = "table=kategorien&id=<?php echo $id; ?>"
            } $.ajax({
                type: "POST",
                url: "result_category.php",
                data: dataString,
                cache: false,
                success: function (html) {
                    $("#result").html(html).show();
                    validate();
                }
            });
            return false;
        });
    });

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


    function abfahrt() {
        if (getArrayCount(ids) == 6) {
            post('JGameScreen.php', { katArray: printArray(ids) });
        }
    }
    </script>
	<h1>
        Thema: <?php echo $topic?>
    </h1>
	<div class="content">
		<input type="text" class="search" id="searchid"
			placeholder="Search for Topic" /><br />
	</div>
	<div id="result">
        <?php
								$t_id = $id;
								$strSQL_Result = mysqli_query ( $connection, "select k_id, bezeichnung from kategorien where t_id = $id order by k_id desc LIMIT 9" );
								if (! $strSQL_Result) {
									printf ( "Error: %s\n", mysqli_error ( $connection ) );
									exit ();
								}
								while ( $row = mysqli_fetch_array ( $strSQL_Result ) ) {
									$id = $row ['k_id'];
									$bezeichnung = $row ['bezeichnung'];
									$link = "#";
									$onclick = "toggleArray(" . $id . ")";
									_createTileWithoutLink ( $onclick, $bezeichnung, 10, $id );
								}
								?>
    
    
	</div>
	
    <?php
				
				$link = "insert_category.php?t_id=" . $t_id . "";
				$itemDesc = "Category";
				createAdd ( $link, $itemDesc );
				?>
    <!--<input  type="submit" value="Abfahrt" />-->

	<div class="tile tile-10 rounded shadow quadra-tile"
		onclick="abfahrt()">
		<div class="tile-content hvr-grow">
			<p>
				<img height="40" width="40" src="resources/arrow.png" />
			</p>
		</div>
	</div>
</body>
</html>


