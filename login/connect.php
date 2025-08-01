<?php
// Database configuration
$dbhost = "localhost:3307";
$dbuser = "root";
$dbpass = "";
$dbname = "agriconnect_login"; 

// Enable mysqli error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Main connection using procedural style (for compatibility)
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if (!$conn) {
        throw new mysqli_sql_exception("Connection failed: " . mysqli_connect_error());
    }
    
    //echo "Connected successfully to database: $dbname";
    
} catch (mysqli_sql_exception $e) {
    die("Failed to connect to the database: " . $e->getMessage());
}


$connLogin = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connLogin->connect_error) {
    die("OOP Connection failed: " . $connLogin->connect_error);
}

?>
