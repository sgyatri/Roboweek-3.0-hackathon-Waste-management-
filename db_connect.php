<?php
$servername = "127.0.0.1";
$username = "root";  // Default for XAMPP
$password = "";      // Default for XAMPP (empty)
$dbname = "smart_waste";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
