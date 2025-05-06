<?php require "..\back-end\post-it.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Project Apple | New Post</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=EB+Garamond&display=swap" rel="stylesheet">
</head>

<body>
<div class="right-tree"></div>
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

    <main>
        <h2>Make a Post</h2>
        <div class="login-container">
            <form action="new-post.php" method="POST" autocomplete="off">
                <select name="topic" required>
                    <option value="placeholder" style="font-weight: bold; color: #b89179;" disabled selected value>-- Select a Topic --</option>
                    <option value="eatery">Cafes + Restaurants</option>
                    <option value="food">Food</option>
                    <option value="drinks">Drinks</option>
                    <option value="products">Products</option>
                    <option value="movies">Movies</option>
                    <option value="tvshows">TV Shows</option>
                    <option value="videogames">Video Games</option>
                    <option value="books">Books</option>
                </select>
                <input type="text" placeholder="Enter name" name="subject_name" style="width: 275px;" required>
                <label for="rating" style="font-size: 25px; font-weight: bold;">Rating</label>
                <img id="ratingImage" src="images/imagesrating_5.png" alt="Rating Image" style="width: 150px; display: block; margin: auto;">
                <input type="range" id="rating" name="rating" min="0" max="10" step="1" style="accent-color: #664d3b; width: 275px;" required>
                <textarea placeholder="Enter description" name="desc" style="width: 275px;"></textarea>
                <button type="submit"><b>></b></button>
            </form>
        </div>
    </main>

    <script>
        const ratingSlider = document.getElementById("rating");
        const ratingImage = document.getElementById("ratingImage");

        const imageMap = {
            "0": "images/imagesrating_0.png",
            "1": "images/imagesrating_1.png",
            "2": "images/imagesrating_2.png",
            "3": "images/imagesrating_3.png",
            "4": "images/imagesrating_4.png",
            "5": "images/imagesrating_5.png",
            "6": "images/imagesrating_6.png",
            "7": "images/imagesrating_7.png",
            "8": "images/imagesrating_8.png",
            "9": "images/imagesrating_9.png",
            "10":"images/imagesrating_10.png"
        };

        ratingSlider.addEventListener("input", function() {
            const value = ratingSlider.value;
            ratingImage.src = imageMap[value] || "imagesrating_5.png";
        });
    </script>

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