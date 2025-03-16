<?php
session_start();
if (!isset($_SESSION['client_id'])) {
    header("Location: user_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Library</title>
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
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            padding: 20px;
            justify-content: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .movie {
            background-color: #333;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .movie:hover {
            transform: scale(1.05);
        }

        .movie img {
            width: 180px;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
        }

        .movie h3 {
            margin: 10px 0 5px;
        }
    </style>
</head>

<body>
    <h1>Online Movie Library</h1>
    <div class="container" id="movie-container"></div>

    <script>
        fetch('movies.php')
            .then(response => response.json())
            .then(movies => {
                const container = document.getElementById("movie-container");
                container.innerHTML = "";

                movies.forEach(movie => {
                    console.log("Movie:", movie); // Debugging

                    const movieElement = document.createElement("div");
                    movieElement.classList.add("movie");
                    movieElement.innerHTML = `
                        <img src="admin/${movie.image}" alt="${movie.title}" loading="lazy">
                        <h3>${movie.title}</h3>
                        <p>${movie.description}</p>
                    `;

                    // Clickable box for movie details
                    movieElement.addEventListener("click", () => {
                        window.location.href = `movie_details.php?movie_id=${movie.movie_id}`;
                    });

                    container.appendChild(movieElement);
                });
            })
            .catch(error => console.error("Error fetching movies:", error));
    </script>
</body>

</html>