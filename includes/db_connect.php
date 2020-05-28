<?php

$db_hostname = "localhost"; 
$db_username = "root";
$db_password = "";
$db_name = "quotes_app";

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

if(!$conn) {
    die("CONNECTION FAILED");
}




