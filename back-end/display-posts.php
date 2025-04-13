<?php
    function renderTopicPosts($topic_id) {
        session_start();

        $mysqli = require __DIR__ . "/database.php";

        $get_posts = "SELECT post_id, subject_name, rating, rating_desc, user_id FROM posts WHERE topic_id=?";
        $stmt = $mysqli->prepare($get_posts);
        $stmt->bind_param("i", $topic_id);
        $stmt->execute();
        $result = $stmt->get_result();

        echo '<div class="post-container">';
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="post-card">';
                echo '<h3>' . htmlspecialchars($row["subject_name"]) . '</h3>';
                echo '<p>' . htmlspecialchars($row["rating_desc"]) . '</p>';
                echo '<p class="user-credit">— user_' . htmlspecialchars($row["user_id"]) . '</p>';
                if (isset($_SESSION['user_id']) && $row["user_id"] == $_SESSION["user_id"]) {
                    echo '<form method="POST" action="../back-end/delete-post.php" class="delete-form" onsubmit="return confirm(\'Are you sure you want to delete this post?\');">';
                    echo '<input type="hidden" name="post_id" value="' . $row["post_id"] . '">';
                    echo '<button type="submit" class="delete-x" title="Delete Post">×</button>';
                    echo '</form>';
                }
                echo '</div>';
            }
        } else {
            echo "<p style='text-align: center;'>No results found.</p>";
        }
        echo '</div>';
    }
?>
