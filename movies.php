<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "online_movie";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

$sql = "SELECT title, description, image FROM movies";
$result = $conn->query($sql);

$movies = [];
while ($row = $result->fetch_assoc()) {
    // Ensure the correct URL path
    $movies[] = $row;
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($movies);

?>
