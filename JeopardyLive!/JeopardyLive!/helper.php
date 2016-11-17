<?php
function createTile($link, $desc) {
    ?>
    <div class="tile tile-10 blue rounded shadow" onclick="location.href='<?php echo $link;?>';">
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

function createAdd($link, $itemDesc) {
    ?>
    <a href="#openModal" class="tile hvr-grow">
        <img src="resources/plus-icon-13062.png" height="50" width="50" />
    </a>
    <div id="openModal" class="modalDialog">
        <div>
            <a href="#close" title="Close" class="close">X</a>
            <form action="<?php echo $link;?>" method="post" target="">
                <input type="text" name="bezeichnung" class="insert" placeholder="Enter new <?php echo $itemDesc;?>" />
                <input type="submit" class="insert" value="Add <?php echo $itemDesc;?>" />
            </form>
            <br />
        </div>
    </div>
<?php
}
?>