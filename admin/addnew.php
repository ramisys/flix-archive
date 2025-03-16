<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Movie</title>
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
            max-width: 500px;
            margin: 0 auto;
            background-color: #333;
            padding: 20px 30px; /* Added more right padding */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            text-align: left;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input, textarea {
            width: calc(100% - 10px); /* Ensures proper width with padding */
            padding: 10px;
            background-color: #444;
            color: white;
            border: 1px solid #666;
            border-radius: 5px;
            box-sizing: border-box; /* Fixes padding issues */
        }

        input[type="file"] {
            padding: 5px;
        }

        button {
            margin-top: 20px;
            padding: 12px;
            background-color: #ff4500;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #e03e00;
        }
    </style>
</head>
<body>
    <h1>Submit a New Movie</h1>
    <div class="container">
        <form action="add.php" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required>

            <label for="release_year">Year:</label>
            <input type="number" id="release_year" name="release_year" min="1888" max="2025" required>

            <label for="director">Director:</label>
            <input type="text" id="director" name="director" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="rating">Rating (1-5):</label>
            <input type="number" step="0.1" id="rating" name="rating" min="1" max="5" required>

            <label for="image">Movie Poster:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <input type="hidden" name="upload" value="1">

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
