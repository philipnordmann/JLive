<?php
include ("db.php");
include ("helper.php");
echo file_get_contents ( "template.html" );
?>
<body>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">
$(function(){
    $(".search").keyup(function()
    {
        var searchid = $(this).val();
        
        if (searchid != '') {
        	var dataString = 'search='+ searchid+"&table=themen"
            
        } else{
        	var dataString ="&table=themen"
        }
        $.ajax({
            type: "POST",
            url: "result_topic.php",
            data: dataString,
            cache: false,
            success: function (html) {
            $("#result").html(html).show();
    }
});
    return false;
});
});
</script>
<h1>Themenauswahl</h1>
	<div class="content">
		<input type="text" class="search" id="searchid"
			placeholder="Search for Topic" /><br />
	</div>
	<div id="result">
        <?php
								$strSQL_Result = mysqli_query ( $connection, "select t_id, bezeichnung from themen order by t_id desc LIMIT 10" );
								if (! $strSQL_Result) {
									printf ( "Error: %s\n", mysqli_error ( $connection ) );
									exit ();
								}
								while ( $row = mysqli_fetch_array ( $strSQL_Result ) ) {
									$id = $row ['t_id'];
									$bezeichnung = $row ['bezeichnung'];
									$link = "choose_category.php?id=" . $id . "";
									createTile ( $link, $bezeichnung, 10 );
								}
								?>
    </div>
    <?php
				$link = "insert_topic.php";
				$itemDesc = "Topic";
				createAdd ( $link, $itemDesc );
				?>
</body>

