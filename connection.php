<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "interview";

$conn = mysqli_connect($server, $username, $password, $db);
if(!$conn){
    die("Databse Connection Failed".mysql_error());
}
?>