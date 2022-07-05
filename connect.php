<?php
$dbHost     = "localhost";
$dbUsername = "u833937764_admin";
$dbPassword = "Admin@123";
$dbName     = "u833937764_ghugeimmig";

// $dbHost     = "localhost";
// $dbUsername = "nandan";
// $dbPassword = "nandan";
// $dbName     = "gugeleagel";

// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

$con = mysqli_connect($dbHost, $dbUsername, $dbPassword,$dbName);

// Check connection
if ($db->connect_error) {
    
    die("Connection failed: " . $db->connect_error);
}
else{
     //echo("testsucess");
}