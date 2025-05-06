<?php if(session_status() !== 2) session_start(); ?>

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
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const track = document.querySelector(".carousel-track");
    const cards = document.querySelectorAll(".post-card");
    const leftBtn = document.querySelector(".carousel-btn.left");
    const rightBtn = document.querySelector(".carousel-btn.right");

    let index = 0;
    const visibleCards = 3; // center + peek left & right
    const totalCards = cards.length;
    const cardWidth = cards[0].offsetWidth + 20;

    function updateCarousel() {
      track.style.transform = `translateX(-${index * cardWidth}px)`;
    }

    leftBtn.addEventListener("click", () => {
      if (index > 0) {
        index--;
        updateCarousel();
      }
    });

    rightBtn.addEventListener("click", () => {
      if (index < totalCards - visibleCards) {
        index++;
        updateCarousel();
      }
    });

    window.addEventListener("resize", updateCarousel);
  });
</script>

<body>
    <header>
        <a class="logo" href="index.php" style="text-decoration: none;">PROJECT APPLE</a>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
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
  <section class="intro">
    <h2>Welcome to Project Apple!</h2>
  </section>

        <section class="carousel-section">
        <div class="carousel-wrapper">
  <button class="carousel-btn left">&#10094;</button>

  <div class="carousel-container">
    <div class="carousel-track">
      <?php include("../back-end/display-posts.php"); ?>
    </div>
  </div>

  <button class="carousel-btn right">&#10095;</button>
</div>
    </section>
</main>

<footer>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="entry.php" class="login-button">Log in / Sign up</a>
        <?php else: ?>
            <a href="new-post.php" class="login-button">+ Make a Post</a>
        <?php endif; ?>
</footer>


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

        document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.querySelector(".dropdown");

    
    const isLoggedIn = true; 

    if (!isLoggedIn) {
        dropdown.style.display = "none"; 
            }
        });

    
    });
    </script>
    <!--Missions Pop Up End-->



</body>
</html>