<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "online_movie";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_year = $_POST['release_year'];
    $director = $_POST['director'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $added_by = $_POST['added_by'];

    // Handle Image Upload
    $imagePath = "uploads/default.jpg"; // Default image
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $target_dir = "uploads/";
        $imageFileName = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . time() . "_" . $imageFileName; // Prevent duplicates

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $imagePath = $target_file; // Save the correct path
        }
    }

    // Insert into database
    $sql = "INSERT INTO movies (title, genre, release_year, director, description, rating, added_by, image) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssds", $title, $genre, $release_year, $director, $description, $rating, $added_by, $imagePath);

    if ($stmt->execute()) {
        echo "Movie added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
