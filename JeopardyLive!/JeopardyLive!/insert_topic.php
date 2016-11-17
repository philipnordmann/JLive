<?php
    include("db.php");
    $bezeichnung = $_POST['bezeichnung'];
    //echo $bezeichnung;
    $result = mysqli_query($connection, "insert into themen (bezeichnung) values ('$bezeichnung')");
    header("Location:choose_topic.php?");

?>