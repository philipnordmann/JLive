<?php
    include("db.php");
    $bezeichnung = $_POST('bezeichnung');
    $table = $_POST('table');
    if($table!=''){
        $result = mysqli_query($connection, "insert into $table ($bezeichnung)");
    }
?>