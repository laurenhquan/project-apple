<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Apple | My Profile</title>
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
                <li><a href="topics.php">Topics</a></li>
                <li><a href="mission.php">Our Mission</a></li>
                <li><a href="profile.php" class="active">My Profile</a></li>
            </ul>
        </nav>
    </header>

    <a href="../back-end/user_out.php" class="login-button">Sign out</a>

    <main>
        <h2>My Profile</h2>

        <h3>My Posts</h3>
        <p>top posts here</p>
        <!-- top posts + see all -->
        
        <h3>Change username</h3>
        <div class="profile-container">
            <form autocomplete="off">
                <input type="text" placeholder="Enter new username" name="new_user_name" required>
                <input type="password" placeholder="Enter password" name="pass" required>
                <button type="submit"><b>></b></button>
            </form>
        </div>
        

        <h3>Change password</h3>
        <div class="profile-container">
            <form autocomplete="off">
                <input type="password" placeholder="Enter old password" name="old_pass" required>
                <input type="password" placeholder="Enter new password" name="new_pass" required>
                <button type="submit"><b>></b></button>
            </form>
        </div>
    </main>
</body>
</html>