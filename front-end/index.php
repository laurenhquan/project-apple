<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Apple | Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=EB+Garamond&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ url_for('static', filename='favicon.ico') }}">

</head>

<body>
    <header>
        <a class="logo" href="index.php" style="text-decoration: none;">PROJECT APPLE</a>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="topics.php">Topics</a></li>
                <li><a href="mission.php">Our Mission</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="profile.php">My Profile</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="entry.php" class="login-button">Log in / Sign up</a>
    <?php else: ?>
        <a href="new-post.html" class="login-button">+ Make a Post</a>
    <?php endif; ?>
    <main>
        <h2>Welcome to Project Apple!</h2>
    </main>
</body>
</html>