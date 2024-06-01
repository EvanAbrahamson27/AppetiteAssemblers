<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Appetite Assemblers</title>
        <!-- add a reference to the external stylesheet -->
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <style>
            .cool-image {
                width: 300px;
                height: auto;
                border-radius: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s;
                margin-left:20px;
                margin-top:20px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Appetite Assemblers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link active" href="#">Home
                    <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recipes.php">Recipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="restrictions.php">Diets + Lifestyles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="authors.php">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                </ul>
                <form class="d-flex" action="search.php" method="get">
                    <input class="form-control me-sm-2" type="search" name="s" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
                <button class="btn btn-dark my-2 my-sm-0" onclick="window.location.href = 'upload.php';">Upload</button>
            </div>
        </div>
    </nav>
    <div class="card bg-light mb-3 body-margin" style="max-width: 50rem;">
    <div class="card-header"><h1 class="card-title">Welcome to Appetite Assemblers!</h1></div>
    <div class="card-body">
    <h4 class="card-title">We strive to make it easy to find your next meal.</h4>
    <p class="card-text">Ready to begin? Just check out the recipes tab or click this button.</p>
    </div>
    </div>
    <img src="AppetiteAssemblers.jpg" alt="Cool Image" class="cool-image">
    <br />
    <a href="recipes.php"><button type="button" class="btn btn-secondary body-margin">Recipes</button></a>
    </body>
</html>