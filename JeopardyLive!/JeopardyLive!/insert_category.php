<?php
    include("db.php");
    $bezeichnung = $_POST['bezeichnung'];
    $t_id = $_GET['t_id'];
    $result = mysqli_query($connection, "insert into kategorien (bezeichnung, t_id) values ('$bezeichnung',$t_id)");
    header("Location:choose_category.php?id=$t_id");

?>