<?php
$host = "localhost:3308";
$uname = "root";
$pass = "";
$database = "db_wat";

$connection = mysqli_connect($host, $uname, $pass, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>