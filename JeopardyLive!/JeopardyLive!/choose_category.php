<?php
include("db.php");
include("helper.php");
echo file_get_contents( "template.html" );
$id = $_GET['id'];
$queryResult =  mysqli_query($connection,"select bezeichnung from themen where t_id = $id");
$row = mysqli_fetch_array($queryResult);
$topic = $row['bezeichnung'];
?>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    $(function () {
        $(".search").keyup(function () {
            var searchid = $(this).val();
            var dataString = 'search=' + searchid + "&table=kategorien&id=<?php echo $id; ?>"
            if (searchid != '') {
                $.ajax({
                    type: "POST",
                    url: "result_category.php",
                    data: dataString,
                    cache: false,
                    success: function (html) {
                        $("#result").html(html).show();
                    }
                });
            } return false;
        });
        jQuery("#result").live("click", function (e) {
            var $clicked = $(e.target);
            var $name = $clicked.find('.name').html();
            var decoded = $("<div/>").html($name).text();
            $('#searchid').val(decoded);
        });
        jQuery(document).live("click", function (e) {
            var $clicked = $(e.target);
            if (!$clicked.hasClass("search")) {
                jQuery("#result").fadeOut();
            }
        });
        $('#searchid').click(function () {
            jQuery("#result").fadeIn();
        });
    });
</script>
<body>
    <h1>
        Thema: <?php echo $topic ?>
    </h1>
    <div class="content">
        <input type="text" class="search" id="searchid" placeholder="Search for Topic" />
        <br />
    </div>
    <div id="result">
        <?php
        $t_id = $id;
        $strSQL_Result = mysqli_query($connection,"select k_id, bezeichnung from kategorien where t_id = $id order by k_id desc LIMIT 9");
        if (!$strSQL_Result) {
            printf("Error: %s\n", mysqli_error($connection));
            exit();
        }
        while($row=mysqli_fetch_array($strSQL_Result))
        {
            $id = $row['k_id'];
            $bezeichnung = $row['bezeichnung'];$link = "#";
            createTile($link, $bezeichnung);
        }
        ?>
    </div>
    <?php
    $link = "insert_category.php?t_id=".$t_id."";
    $itemDesc = "Category";
    createAdd($link, $itemDesc);
    ?>
</body>

