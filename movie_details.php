<?php
require 'db_connect.php';

if (!isset($_GET['movie_id']) || empty($_GET['movie_id'])) {
    die("Invalid Movie ID.");
}

$movie_id = $_GET['movie_id'];

$sql = "SELECT movies.*, admins.username 
        FROM movies 
        JOIN admins ON movies.added_by = admins.admin_id 
        WHERE movies.movie_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Movie not found.");
}

$movie = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($movie['title']); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1c1c1c;
            color: white;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            text-align: left;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .poster {
            width: 100%;
            /* Ensures it takes full container width */
            max-width: 300px;
            /* Adjust to your preferred size */
            height: auto;
            /* Maintains aspect ratio */
            display: block;
            /* Prevents extra spacing */
            object-fit: cover;
            /* Ensures proper cropping */
            border-radius: 10px;
            /* Optional rounded corners */
        }

        .info {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #ff4500;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .back-btn:hover {
            background-color: #e03e00;
        }
    </style>
</head>

<body>
    <h1><?php echo htmlspecialchars($movie['title']); ?></h1>
    <div class="container">
        <img src="/onlinemovie/admin/<?php echo htmlspecialchars($movie['image']); ?>" alt="Movie Poster"
            class="poster">

        <p class="info"><strong>Genre:</strong> <?php echo htmlspecialchars($movie['genre']); ?></p>
        <p class="info"><strong>Release Year:</strong> <?php echo htmlspecialchars($movie['release_year']); ?></p>
        <p class="info"><strong>Director:</strong> <?php echo htmlspecialchars($movie['director']); ?></p>
        <p class="info"><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($movie['description'])); ?></p>
        <p class="info"><strong>Rating:</strong> <?php echo htmlspecialchars($movie['rating']); ?> / 5</p>
        <p class="info"><strong>Added by:</strong> <?php echo htmlspecialchars($movie['username']); ?></p>

        <a href="index.php" class="back-btn">Back to Movies</a>
    </div>
</body>

</html>