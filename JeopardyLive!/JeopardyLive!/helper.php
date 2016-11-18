<?php
include("db.php");
function createTile($link, $desc, $tileWidth) {
    $onclick = "location.href=".$link."";
    _createTile($link, $onclick, $desc, $tileWidth, "");
}

function _createTile($link, $onclick, $desc, $tileWidth, $id) {
?>
<div id="tile-<?php echo $id;?>" class="tile tile-<?php echo $tileWidth; ?> blue rounded shadow" onclick="<?php echo $onclick;?>">
    <div class="tile-content hvr-grow">
        <a href="<?php echo $link;?>">
            <p>
                <?php echo $desc; ?>
            </p>
        </a>
    </div>
</div>
<?php
}

function _createTileWithoutLink($onclick, $desc, $tileWidth, $id) {
?>
<div id="tile-<?php echo $id;?>" class="tile tile-<?php echo $tileWidth; ?> blue rounded shadow" onclick="<?php echo $onclick;?>">
    <div class="tile-content hvr-grow">
            <p>
                <?php echo $desc; ?>
            </p>
    </div>
</div>
<?php
}

function createAdd($link, $itemDesc) {
?>
    <a href="#openModal" class="tile hvr-grow">
        <img src="resources/plus-icon-13062.png" height="50" width="50" />
    </a>
    <div id="openModal" class="modalDialog" >
        <div>
            <div class="innerAdd">
                <a href="#close" title="Close" class="close">X</a>
                <form action="<?php echo $link;?>" method="post" target="">
                    <input type="text" name="bezeichnung" class="insert" placeholder="Enter new <?php echo $itemDesc;?>" />
                    <input type="submit" class="insert" value="Add <?php echo $itemDesc;?>" />
                </form>
                <br />
            </div>
        </div>
    </div>
<?php
}
?>

<?php
function catIdToName($k_id){
    $sql = "SELECT bezeichnung FROM kategorien WHERE K_ID = $k_id";
    $qry = mysql_query( $sql );
    $bezeichnung = mysql_fetch_array( $qry );
    return $bezeichnung;
}
?>

<?php
function get_question_id($k_id, $points){
    $sql = "SELECT F_ID FROM fragen WHERE k_ID = $k_id and wertung = $points";
    $qry = mysql_query( $sql );
    $f_id = mysql_fetch_array( $qry );
    return $f_id;
}
?>

<?php
function get_question($f_id){
    $sql = "SELECT frage FROM fragen WHERE F_ID = $f_id";
    $qry = mysql_query( $sql );
    $frage = mysql_fetch_array( $qry );
    return $frage;
}
?>

<?php
function get_answer($f_id){
    $sql = "SELECT antwort FROM fragen WHERE F_ID = $f_id";
    $qry = mysql_query( $sql );
    $antwort = mysql_fetch_array( $qry );
    return $antwort;
}
?>