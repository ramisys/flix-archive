<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Submit a new movie</h1>
    <form action="add.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br><br>
        <label for="imag">Image:</label>
        <input type="text" id="image" name="image" required>
        <br><br>
        <label for="description">Description</label>
        <input type="text" id="description" name="description" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>