<?php require_once('config.php'); ?>
<!-- TCSS 445 : Spring 2024 -->
<!-- Assignment 4 Template -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Appetite Assemblers</title>
        <!-- add a reference to the external stylesheet -->
        <link rel="stylesheet" href="bootstrap.min.css">
        <style>
            .ingredient-section {
                padding: 60px;
                text-align: center;
                background-color: #f4f4f4;
            }
            .ingredient-content {
                max-width: 800px;
                margin: auto;
            }
            .ingredient-title {
                font-size: 2.5em;
                margin-bottom: 20px;
            }
            .ingredient-text {
                font-size: 1.2em;
                line-height: 1.6;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
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
        <div class="jumbotron">
            <div class="ingredient-section">
                <div class="ingredient-content">
                    <h1 class="ingredient-title" id="recipe-title">No Recipes with this ID</h1>
                    <h4 id="recipe-rating"></h4>
                    <h4 id="recipe-author"></h4>
                    <p class="ingredient-text">
                        A great selection! A list of ingredients for this recipe are below.
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <form method="GET" action="ingredients.php">
                <?php
                $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                if ( mysqli_connect_errno() )
                {
                    die( mysqli_connect_error() );
                    }
                    ?>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET")
                {
                    if (isset($_GET['id']) )
                    {
                ?>
                <p>&nbsp;</p>
                <table class="table table-hover">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">Ingredient Name</th>
                            <th scope="col">Ingredient Price</th>
                            <th scope="col">Ingredient Category</th>
                        </tr>
                    </thead>
                    <?php
                        if ( mysqli_connect_errno() )
                        {
                            die( mysqli_connect_error() );
                        }
                        $sql = " SELECT *
                            FROM RECIPE_INGREDIENTS u
                            LEFT JOIN INGREDIENTS i ON u.Ingredient_name = i.Ingredient_name
                            LEFT JOIN RECIPES r ON u.Recipe_id = r.Recipe_id
                            LEFT JOIN USERS s ON r.Recipe_author = s.User_id
                            WHERE u.Recipe_id = '{$_GET['id']}'
                            ORDER BY i.Ingredient_cat ASC";
                        if ($result = mysqli_query($connection, $sql))
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                    ?>
                    <tr>
                        <td><?php echo $row['Ingredient_name'] ?></td>
                        <td><?php echo '$' . $row['Ingredient_price'] ?></td>
                        <td><?php echo $row['Ingredient_cat'] ?></td>
                    </tr>
                    <script>
                        function updateTitle(newTitle) {
                            var titleElement = document.getElementById("recipe-title");
                            titleElement.innerHTML = newTitle;
                        }
                        function updateText(newText) {
                            var textElement = document.getElementById("recipe-rating");
                            textElement.innerHTML = newText;
                        }
                        function stars() {
                            let star = "";
                            for (let i = 0; i < <?php echo $row['Recipe_rating']?> / 20; i++) {
                                 star += "⭐"
                            }
                            return star;
                        }
                        updateTitle("<?php echo $row['Recipe_name'] ?>");
                        updateText(stars());
                        var textElement = document.getElementById("recipe-author");
                            textElement.innerHTML = "By <?php echo $row['User_fname'] ?> <?php echo $row['User_lname'] ?>";
                    </script>
                    <?php
                            }
                            // release the memory used by the result set
                            mysqli_free_result($result);
                        }
                    } // end if (isset)
                } // end if ($_SERVER)
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>