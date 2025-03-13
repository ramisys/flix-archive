<?php 

$host = "localhost";
$username = "root";  // Change this if needed
$password = "";  // Change this if needed
$database = "online_movie"; // Replace with your DB name

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

$title = $_POST['title'];
$image = $_POST['image'];
$description = $_POST['description'];

$sql = "INSERT INTO movies (title, image, description) VALUES ('$title', '$image', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>