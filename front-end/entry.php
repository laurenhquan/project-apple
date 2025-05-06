<?php require "..\back-end\user_in.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Project Apple | Log in/Sign up</title>
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
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="dropdown">
                        <a href="profile.php" class="dropbtn">My Profile</a>
                        <div class="dropdown-content">
                            <a href="profile.php">View Profile</a>
                            <a href="settings.php">Settings</a>
                            <a href="../back-end/user_out.php">Sign Out</a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Log in / Sign up</h2>
        <div class="login-container">
            <form action="entry.php" method="POST" autocomplete="off">
                <input type="text" placeholder="Enter username" name="username" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>" required>
                <input type="password" placeholder="Enter password" name="pass" required>
                <?php if ($is_invalid): ?>
                    <em style="color: #c1121f;">Invalid login</em><br>
                <?php endif; ?>
                <button type="submit" style="color: #e3d4c2; font-family: 'DynaPuff', sans-serif;"><b>></b></button>
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
    <img src="images/applelogo2.webp" alt="Apple Logo" class="corner-apple">
</body>
</html>