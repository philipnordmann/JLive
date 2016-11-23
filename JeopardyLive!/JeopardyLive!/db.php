<?php
$connection = mysqli_connect('localhost','root','','JeopardyDB');
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset( $connection, "UTF8");
?>

