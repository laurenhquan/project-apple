<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Apple | Our Mission</title>
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
                <li><a href="mission.php" class="active">Our Mission</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="profile.php">My Profile</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <div id="missionModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>OUR MISSION</h2>
            <p>Inspired by AppleRankings.com, Project Apple aims to create communities through tier-blogs. By creating such reviews, our users are able to connect with one another and try new things!</p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("missionModal");
            const closeButton = document.querySelector(".close");
            modal.style.display = "flex";
            closeButton.addEventListener("click", function () {
                modal.style.display = "none";
            });
        });
    </script>
</body>
</html>