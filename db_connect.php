<?php
$host = "localhost"; // Change if needed
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$database = "online_movie"; // Change to your database name

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
