<?php
    function getMyPosts() {
        session_start();

        $mysqli = require __DIR__ . "/database.php";
    
        $user_id = $_SESSION["user_id"];
        $get_posts = "SELECT post_id, subject_name, rating_desc FROM posts WHERE user_id = ?";

        $stmt = $mysqli->prepare($get_posts);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<div class='post-container'>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="post-card">';
                echo '<h3>' . htmlspecialchars($row["subject_name"]) . '</h3>';
                echo '<p>' . htmlspecialchars($row["rating_desc"]) . '</p>';
                echo '<form method="POST" action="../back-end/delete-post.php" onsubmit="return confirm(\'Are you sure you want to delete this post?\');">';
                echo '<input type="hidden" name="post_id" value="' . $row["post_id"] . '">';
                echo '<button type="submit" class="delete-btn">Delete</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "<p>You haven't posted anything yet.</p>";
        }
        echo "</div>";
    }
?>