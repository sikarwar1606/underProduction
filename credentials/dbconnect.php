<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "secure";

$conn = mysqli_connect($server, $username, $password, $database, 3307);
if (!$conn){

    die("Error". mysqli_connect_error());
}
?>
