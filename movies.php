<?php

require("db_connect.php");

$sql = "SELECT movie_id, title, description, image FROM movies";
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
