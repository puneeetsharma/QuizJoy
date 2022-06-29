<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "quizdatabase";
$con = mysqli_connect($server, $username, $password, $db);

if (!$con) {
    die("connection to this database faild due to" . mysqli_connect_error());
}
?>