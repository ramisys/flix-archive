<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$username = "root";  // Change this if needed
$password = "";  // Change this if needed
$database = "online_movie"; // Replace with your DB name

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

$movies = [];
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

echo json_encode($movies);
$conn->close();
?>
