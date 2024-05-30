<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors - Appetite Assemblers</title>
    <!-- add a reference to the external stylesheet -->
    <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
    <style>
        .authors-section {
            padding: 60px;
            text-align: center;
            background-color: #f4f4f4;
        }
        .authors-content {
            max-width: 800px;
            margin: auto;
        }
        .authors-title {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .authors-text {
            font-size: 1.2em;
            line-height: 1.6;
        }
        .team-section {
            padding: 60px;
            background-color: #fff;
        }
        .team-member {
            margin: 20px 0;
        }
        .team-member img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .team-member h4 {
            margin: 10px 0 5px;
        }
        .team-member p {
            margin: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Appetite Assemblers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recipes.php">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="restrictions.php">Diets + Lifestyles</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="authors.php">Authors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    
    <div class="authors-section">
        <div class="authors-content">
            <h1 class="authors-title">Meet Our Authors</h1>
            <p class="authors-text">
                Our talented team of culinary authors brings you the best recipes from around the world. Each member of our team is an expert in their field, dedicated to sharing their knowledge and passion for food.
            </p>
        </div>
    </div>
    
    <div class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 text-center team-member">
                    <img src="path/to/image1.jpg" alt="Author 1">
                    <h4>John Doe</h4>
                    <p>Head Chef</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center team-member">
                    <img src="path/to/image2.jpg" alt="Author 2">
                    <h4>Jane Smith</h4>
                    <p>Pastry Chef</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center team-member">
                    <img src="path/to/image3.jpg" alt="Author 3">
                    <h4>Emily Johnson</h4>
                    <p>Nutritionist</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center team-member">
                    <img src="path/to/image4.jpg" alt="Author 4">
                    <h4>Michael Brown</h4>
                    <p>Grill Master</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center team-member">
                    <img src="path/to/image5.jpg" alt="Author 5">
                    <h4>Sarah Davis</h4>
                    <p>Recipe Developer</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center team-member">
                    <img src="path/to/image6.jpg" alt="Author 6">
                    <h4>David Wilson</h4>
                    <p>Food Blogger</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
