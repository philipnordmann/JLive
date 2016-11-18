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

function _createQuestionTile($link, $onclick, $desc, $tileWidth) {
?>
<div class="tile tile-<?php echo $tileWidth; ?> blue rounded shadow" onclick="<?php echo $onclick;?>;">
    <div class="tile-content hvr-grow question">
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
    include("db.php");
    $queryResult =  mysqli_query($connection,"SELECT bezeichnung FROM kategorien WHERE K_ID = $k_id");
    $bezeichnung = mysqli_fetch_array($queryResult);
    return $bezeichnung;
}
?>

<?php
function get_question_id($k_id, $points){
    include("db.php");
    $queryResult =  mysqli_query($connection,"SELECT f_id FROM fragen WHERE k_ID = $k_id and wertung = '$points'");
    $f_id = mysqli_fetch_array($queryResult);
    return $f_id['f_id'];
}
?>

<?php
function get_question($f_id){
    include("db.php");
    $queryResult =  mysqli_query($connection,"SELECT frage FROM fragen WHERE F_ID = $f_id");
    $frage = mysqli_fetch_array($queryResult);
    return $frage['frage'];
}
?>

<?php
function get_answer($f_id){
    include("db.php");
    $queryResult =  mysqli_query($connection,"SELECT antwort FROM fragen WHERE F_ID = $f_id");
    $antwort = mysqli_fetch_array($queryResult);
    return $antwort['antwort'];
}
?>