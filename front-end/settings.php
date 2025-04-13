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

    <footer>
        <a href="../back-end/user_out.php" class="login-button">Sign out</a>
    </footer>

    <main>
        <h2>Settings</h2>
        
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