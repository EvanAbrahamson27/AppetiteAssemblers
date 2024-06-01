<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors - Appetite Assemblers</title>
    <link rel="stylesheet" href="bootstrap.min.css">
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
                <form class="d-flex" action="search.php" method="get">
                    <input class="form-control me-sm-2" type="search" name="s" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
                <button class="btn btn-dark my-2 my-sm-0" onclick="window.location.href = 'upload.php';">Upload</button>
            </div>
        </div>
    </nav>

    <div class="authors-section">
        <div class="authors-content">
            <h1 class="authors-title">Meet Our Authors</h1>
            <p class="authors-text">
                Discover the culinary experts who bring you the best recipes. Our authors are passionate about food and love to share their creative culinary ideas with you.
            </p>
        </div>
    </div>

    <div class="team-section">
        <div class="container">
            <div class="row">
                <?php
                // Connect to the database
                $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                if (!$connection) {
                    die('Connection failed: ' . mysqli_connect_error());
                } else {
                    echo '<p>Connected to database successfully.</p>';
                }

                // Fetch authors from the database
                $sql = "SELECT User_fname, User_lname, User_email, User_joindate FROM USERS";
                if ($result = mysqli_query($connection, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-lg-4 col-md-6 col-sm-12 text-center team-member">';
                            echo '<h4>' . htmlspecialchars($row['User_fname']) . ' ' . htmlspecialchars($row['User_lname']) . '</h4>';
                            echo '<p>Email: <a href="mailto:' . htmlspecialchars($row['User_email']) . '">' . htmlspecialchars($row['User_email']) . '</a></p>';
                            echo '<p>Joined: ' . htmlspecialchars($row['User_joindate']) . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No authors found.</p>';
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo '<p>Error executing query: ' . mysqli_error($connection) . '</p>';
                }

                // Close connection
                mysqli_close($connection);
                ?>
            </div>
        </div>
    </div>
    </body>
</html>
