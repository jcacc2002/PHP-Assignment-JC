<?php

// Database Handler


$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mablesistersdb";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}