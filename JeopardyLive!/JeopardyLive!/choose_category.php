<?php
include("db.php");
include("helper.php");
echo file_get_contents("template.html");
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
                        validate();
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
<script>
    var ids = new Array();
    var pos = 1;
    ids.length = 6;

    function addClass(element, className) {
        if (!hasClass(element, className)) {
            if (element.className) {
                element.className += " " + className;
            } else {
                element.className = className;
            }
        }
    }

    function removeClass(element, className) {
        var regexp = addClass[className];
        if (!regexp) {
            regexp = addClass[className] = new RegExp("(^|\\s)" + className + "(\\s|$)");
        }
        element.className = element.className.replace(regexp, "$2");
    }

    function hasClass(element, className) {
        var regexp = addClass[className];
        if (!regexp) {
            regexp = addClass[className] = new RegExp("(^|\\s)" + className + "(\\s|$)");
        }
        return regexp.test(element.className);
    }

    function toggleClass(element, className) {
        if (hasClass(element, className)) {
            removeClass(element, className);
        } else {
            addClass(element, className);
        }
    }

    function toggleArray(id) {
        var elem = document.getElementById("tile-" + id);
        if (!checkArray(ids, id)) {
            if (getArrayCount(ids) < ids.length) {
                pushArray(ids, id);
                addClass(elem, "green");
            }
        }
        else {
            removeFromArray(ids, id);
            removeClass(elem, "green");
        }
        document.getElementById("test").innerHTML = printArray(ids);

    }

    function getArrayCount(array) {
        var ret = 0;
        for (var i = 0; i < array.length; i++) {
            if(array[i] != null){
                ret++;
            }
        }
        return ret;
    }

    function pushArray(array, val) {
        for (var i = 0; i < array.length; i++) {
            if (array[i] == null) {
                array[i] = val;
                return;
            }
        }
    }

    function removeFromArray(array, val) {
        for (var i = 0; i < array.length; i++) {
            if (array[i] == val) {
                array[i] = null;
                return;
            }
        }
    }

    function checkArray(array, val)
    {
        for (var i = 0; i < array.length; i++) {
            if (array[i] == val) {
                return true;
            }
        }
        return false;
    }

    function validate() {
        for (var i = 0; i < ids.length; i++) {
            if(ids[i] != null){
                toggleArray(ids[i]);
            }
        }
    }

    function printArray(array) {
        var retString ="";
        for (var i = 0; i < array.length; i++) {
            if (array[i] != null) {
                retString += array[i] + "-";
            }
        }
        return retString;
    }

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
            $bezeichnung = $row['bezeichnung'];
            $link = "#";
            $onclick = "toggleArray(".$id.")";
            _createTileWithoutLink($onclick, $bezeichnung, 10, $id);
        }
        ?>
    </div>
    <?php
    $link = "insert_category.php?t_id=".$t_id."";
    $itemDesc = "Category";
    createAdd($link, $itemDesc);
    ?>
    <p id="test"></p>
</body>


