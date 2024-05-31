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
                    <a class="nav-link active" href="#">Recipes</a>
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
                    <form class="d-flex">
                    <input class="form-control me-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
            </div>
        </div>
    </nav>
        <div class="jumbotron">
            <p class="lead">What type of recipe are you looking for?<p>
            <hr class="my-4">
            <form method="GET" action="recipes.php">
                <select name="rca" onchange='this.form.submit()'>
                    <option selected>Select a Recipe Category</option>
                    <?php
                    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
                    if ( mysqli_connect_errno() )
                    {
                        die( mysqli_connect_error() );
                    }
                    $sql = "select DISTINCT Recipe_category from RECIPES ORDER BY Recipe_category ASC";
                    if ($result = mysqli_query($connection, $sql))
                    {
                        // loop through the data
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo '<option value="' . $row['Recipe_category'] . '">';
                            echo $row['Recipe_category'];
                            echo "</option>";
                        }
                        // release the memory used by the result set
                        mysqli_free_result($result);
                    }
                    ?>
                </select>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET")
                {
                    if (isset($_GET['rca']) )
                    {
                ?>
                <p>&nbsp;</p>
                <table class="table table-hover">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">Recipe Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Time to Cook (min)</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Author's Last Name</th>
                            <th scope="col">Upload Date</th>
                        </tr>
                    </thead>
                    <?php
                        if ( mysqli_connect_errno() )
                        {
                            die( mysqli_connect_error() );
                        }
                        $sql = " SELECT *
                            FROM RECIPES
                            LEFT JOIN USERS ON Recipe_author = User_id
                            WHERE Recipe_category = '{$_GET['rca']}'
                            ORDER BY Recipe_rating DESC";
                        if ($result = mysqli_query($connection, $sql))
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                    ?>
                    <tr>
                        <td><a href="ingredients.php?id=<?php echo $row['Recipe_id']; ?>"><?php echo $row['Recipe_name']; ?></a></td>
                        <td><?php echo '$' . $row['Recipe_price'] ?></td>
                        <td><?php echo $row['Recipe_mintocook'] ?></td>
                        <td><?php echo $row['Recipe_rating'] ?></td>
                        <td><a href="authors.php?id=<?php echo $row['User_id']; ?>"><?php echo $row['User_lname']; ?></a></td>
                        <td><?php echo $row['Recipe_uploaddate'] ?></td>
                    </tr>
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