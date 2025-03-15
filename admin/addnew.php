<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Movie</title>
</head>
<body>
    <h1>Submit a new movie</h1>
    <form action="add.php" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br><br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>
        <br><br>

        <label for="release_year">Year:</label>
        <input type="number" id="release_year" name="release_year" min="1888" max="2025" required>
        <br><br>

        <label for="director">Director:</label>
        <input type="text" id="director" name="director" required>
        <br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
        <br><br>

        <label for="rating">Rating:</label>
        <input type="number" step="0.1" id="rating" name="rating" min="1" max="5" required>
        <br><br>

        <label for="added_by">Added by (User ID):</label>
        <input type="number" id="added_by" name="added_by" required>
        <br><br>

        <label for="image">Movie Poster:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <br><br>

        <!-- Hidden input to send the "upload" value -->
        <input type="hidden" name="upload" value="1">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
