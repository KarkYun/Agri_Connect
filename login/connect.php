<?php

$dbhost = "localhost: 3307";
$dbuser = "root";
$dbpass = ""; 
$dbname = "agriconnect_login";  // Changed from "agriconnect_login_db"

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to database: $dbname";
?>


