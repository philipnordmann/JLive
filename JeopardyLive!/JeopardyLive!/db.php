<?php
//$connection = mysqli_connect('localhost','root','','jl');
$connection = mysqli_connect('172.20.3.14','ruht','hallo','JeopardyDB');
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>