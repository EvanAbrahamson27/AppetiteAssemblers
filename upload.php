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
            .upload-section {
                padding: 60px;
                text-align: center;
                background-color: #f4f4f4;
            }
            .upload-content {
                max-width: 800px;
                margin: auto;
            }
            .upload-title {
                font-size: 2.5em;
                margin-bottom: 20px;
            }
            .upload-text {
                font-size: 1.2em;
                line-height: 1.6;
            }
            .jumbotron {
                margin-left:20px;
                margin-top:20px;
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
                    <button class="btn btn-dark my-2 my-sm-0" onclick="window.location.href = '#';">Upload</button>
                </div>
            </div>
        </nav>
        <div class="jumbotron">
            <form method="POST" action="upload.php">
                <div class="upload-section">
                    <div class="upload-content">
                        <h1 class="upload-title">Upload a Recipe</h1>
                        <p class="upload-text">
                            Have your own idea for a great recipe? Upload it here!
                        </p>
                    </div>
                </div>
                <hr class="my-4">
                <div>
                    <label for="upTitle" class="form-label mt-4">Recipe Title</label>
                    <input type="text" class="form-control" id="upTitle" name="upTitle" placeholder="Enter title">
                </div>
                <div>
                    <label for="upPrice" class="form-label mt-4">Price</label>
                    <input type="text" class="form-control" id="upPrice" name="upPrice" placeholder="Enter price">
                </div>
                <div>
                    <label for="upTTC" class="form-label mt-4">Time to Cook (Minutes)</label>
                    <input type="text" class="form-control" id="upTTC" name="upTTC" placeholder="Enter Time to Cook">
                </div>
                <div>
                    <label for="upCatSelect" class="form-label mt-4">Recipe Category</label>
                    <select class="form-select" id="upCat" name="upCat">
                        <option>Breakfast</option>
                        <option>Lunch</option>
                        <option>Dinner</option>
                        <option>Dessert</option>
                    </select>
                </div>
                <div>
                    <label for="upIngSelect" class="form-label mt-4">Ingredients (ctrl + click for multiple)</label>
                    <select multiple="" class="form-select" id="upIng" name="upIng">
                    </select>
                </div>
                <button type="submit" class="btn btn-dark">Submit Recipe</button>
                <?php
                define('DBHOST', 'localhost');
                define('DBUSER', 'username');
                define('DBPASS', 'password');
                define('DBNAME', 'database_name');

                $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $ingsql = "SELECT *
                        FROM INGREDIENTS
                        ORDER BY Ingredient_name ASC";

                    if ($result = mysqli_query($connection, $ingsql)) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $ingredients[] = htmlspecialchars($row['Ingredient_name']);
                    ?>
                    <div>
                    </div>
                <?php
                        } ?>
                        <script>
                            const ingredients = <?php echo json_encode($ingredients); ?>;
                        ingredients.forEach(ingredient => {
                        const option = document.createElement('option');
                        option.value = ingredient;
                        option.textContent = ingredient;
                        document.getElementById('upIng').appendChild(option);
                        });
                    </script>
                <?php
                    } else {
                        echo "Error: " . mysqli_error($connection);
                    }
                }
                    ?>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $recipeTitle = mysqli_real_escape_string($connection, $_POST['upTitle']);
                    $recipeCategory = mysqli_real_escape_string($connection, $_POST['upCat']);
                    $recipePrice = floatval($_POST['upPrice']);
                    $recipeMinToCook = intval($_POST['upTTC']);
                    $currentDate = date("Y-m-d H:i:s");

                    $result = mysqli_query($connection, "SELECT MAX(Recipe_id) AS max_id FROM RECIPES");
                    $newId = mysqli_fetch_assoc($result);
                    $newRecipeId = $newId['max_id'] + 1;

                    $sql = "INSERT INTO RECIPES (Recipe_id, Recipe_name, Recipe_category, Recipe_price, Recipe_author, Recipe_rating, Recipe_mintocook, Recipe_uploaddate) 
                        VALUES ($newRecipeId, '$recipeTitle', '$recipeCategory', $recipePrice, 108, DEFAULT, $recipeMinToCook, '$currentDate')";

                    if (mysqli_query($connection, $sql)) {
                        echo "New recipe created successfully";
                    } else {
                        echo "Error: " . mysqli_error($connection);
                    }

                    $selectedIngredients = $_POST['upIng'];
                    foreach ($selectedIngredients as $ingredient) {
                        $ingredientname = mysqli_real_escape_string($connection, $ingredient);
                        $sql = "INSERT INTO RECIPE_INGREDIENTS (Recipe_id, Ingredient_name)
                        VALUES ($newRecipeId, '$ingredientname')";

                        if (mysqli_query($connection, $sql)) {
                            echo "New ingredients list created successfully";
                        } else {
                            echo "Error: " . mysqli_error($connection);
                        }
                    }

                    mysqli_free_result($result);
                    mysqli_close($connection);
                }
                ?>
            </form>
        </div>
    </body>
</html>