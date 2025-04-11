<?php if(session_status() !== 2) session_start(); ?>

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
                <li><a href="#" id="missionButton">Our Mission</a></li>
                <li class="dropdown">
                    <a href="profile.php" class="dropbtn">My Profile</a>
                    <div class="dropdown-content">
                        <a href="profile.php">View Profile</a>
                        <a href="settings.php">Settings</a>
                        <a href="../back-end/user_out.php">Sign Out</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <a href="../back-end/user_out.php" class="login-button">Sign out</a>

    <main>
        <h2>My Profile</h2>
        <h3>My Posts</h3>

        <?php
        $mysqli = require __DIR__ . "/../back-end/database.php";
        $user_id = $_SESSION["user_id"];
        $get_user_posts = "SELECT post_id, subject_name, rating_desc FROM posts WHERE user_id = ?";
        $stmt = $mysqli->prepare($get_user_posts);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <div class="post-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="post-card">';
                    echo '<h3>' . htmlspecialchars($row["subject_name"]) . '</h3>';
                    echo '<p>' . htmlspecialchars($row["rating_desc"]) . '</p>';
                    echo '<form method="POST" action="../back-end/delete-post.php" class="delete-form" onsubmit="return confirm(\'Are you sure you want to delete this post?\');">';
                    echo '<input type="hidden" name="post_id" value="' . $row["post_id"] . '">';
                    echo '<button type="submit" class="delete-x" title="Delete post">×</button>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo "<p>You haven't posted anything yet.</p>";
            }
            ?>
        </div>
    </main>

    <!--Missions Pop Up Start-->
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
            const missionButton = document.getElementById("missionButton");

            if (missionButton) {
                missionButton.addEventListener("click", function (event) {
                    event.preventDefault();
                    modal.style.display = "flex";
                });
            }

            closeButton.addEventListener("click", function () {
                modal.style.display = "none";
            });

            modal.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>
    <!--Missions Pop Up End-->
</body>
</html>
