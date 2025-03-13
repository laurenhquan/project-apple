<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Apple | Topics</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=EB+Garamond&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <a class="logo" href="index.php" style="text-decoration: none;">PROJECT APPLE</a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="topics.php" class="active">Topics</a></li>
                <li><a href="mission.php">Our Mission</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="profile.php">My Profile</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Topics</h2>

        <!-- <div class="topic-container">
            <form method="get" autocomplete="off">
                <input type="text" placeholder="Search topic" name="topic">
            </form>
        </div> -->

        <div class="topic-container">
            <a href="eatery.php">Cafes<br>+<br>Restaurants</a>
            <a href="food.php">Food</a>
            <a href="drinks.php">Drinks</a>
            <a href="products.php">Products</a>
            <a href="movies.php">Movies</a>
            <a href="tvshows.php">TV Shows</a>
            <a href="videogames.php">Video Games</a>
            <a href="books.php">Books</a>
        </div>
    </main>
</body>
</html>