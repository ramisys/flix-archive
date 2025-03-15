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
            grid-template-columns: repeat(5, 1fr); /* 5 movies per row */
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
        }

        .movie img {
            width: 180px; /* Fixed width */
            height: 250px; /* Fixed height */
            object-fit: cover; /* Ensures proper scaling */
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
        const container = document.getElementById("movie-container");

        fetch('movies.php')
            .then(response => response.json())
            .then(movies => {
                container.innerHTML = "";
                movies.forEach(movie => {
                    const movieElement = document.createElement("div");
                    movieElement.classList.add("movie");
                    movieElement.innerHTML = `
                        <img src="admin/${movie.image}" alt="${movie.title}" loading="lazy">
                        <h3>${movie.title}</h3>
                        <p>${movie.description}</p>
                    `;
                    container.appendChild(movieElement);
                });
            })
            .catch(error => console.error("Error fetching movies:", error));
    </script>
</body>

</html>
