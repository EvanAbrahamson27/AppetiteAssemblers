<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Appetite Assemblers</title>
    <!-- add a reference to the external stylesheet -->
    <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
    <style>
        .about-section {
            padding: 60px;
            text-align: center;
            background-color: #f4f4f4;
        }
        .about-content {
            max-width: 800px;
            margin: auto;
        }
        .about-title {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .about-text {
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
                    <li class="nav-item">
                        <a class="nav-link" href="authors.php">Authors</a>
                    </li>
                    <li class="nav-item active">
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
    
    <div class="about-section">
        <div class="about-content">
            <h1 class="about-title">About Appetite Assemblers</h1>
            <p class="about-text">
                Welcome to Appetite Assemblers, your number one source for all culinary delights. We're dedicated to providing you the very best of recipes, with an emphasis on health, taste, and innovation.
                <br><br>
                Founded in 2024, Appetite Assemblers has come a long way from its beginnings. When we first started out, our passion for cooking drove us to start our own business.
                <br><br>
                We hope you enjoy our recipes as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
            </p>
        </div>
    </div>
    
    <div class="team-section">
        <div class="container">
            <h2 class="text-center">Meet Our Team</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 text-center team-member">
                    <img src="path/to/image1.jpg" alt="Team Member 1">
                    <h4>Rick Adams</h4>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center team-member">
                    <img src="path/to/image2.jpg" alt="Team Member 2">
                    <h4>Evan Abrahamson</h4>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center team-member">
                    <img src="path/to/image3.jpg" alt="Team Member 3">
                    <h4>Aaniyah Alyes</h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
