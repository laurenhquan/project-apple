<?php
    function getPosts() {
        // session_start();

        $mysqli = require __DIR__ . "/database.php";

        $query = "SELECT posts.post_id, posts.subject_name, posts.rating, posts.rating_desc, posts.user_id, topics.topic_name
                FROM posts
                JOIN topics ON posts.topic_id = topics.topic_id
                ORDER BY posts.post_id DESC
                LIMIT 10";

        $result = $mysqli->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="post-card carousel-card">';
                echo '<h3 class="post-title">' . htmlspecialchars($row["subject_name"]) . '</h3>';
                echo '<p class="post-desc">' . nl2br(htmlspecialchars($row["rating_desc"])) . '</p>';
                echo '<p class="user-credit">user_' . htmlspecialchars($row["user_id"]) . ' on ' . htmlspecialchars($row["topic_name"]) . '</p>';
                echo '<img src="images/imagesrating_' . intval($row["rating"]) . '.png" alt="Rating" class="apple-corner">';

                if (isset($_SESSION['user_id']) && $row['user_id'] == $_SESSION['user_id']) {
                    echo '<form method="POST" action="../back-end/delete-post.php" class="delete-form" onsubmit="return confirm(\'Are you sure you want to delete this post?\');">';
                    echo '<input type="hidden" name="post_id" value="' . $row["post_id"] . '">';
                    echo '<button type="submit" class="delete-x" title="Delete Post">×</button>';
                    echo '</form>';
                }
                echo '</div>';
            }
        } else {
            echo "<p>No recent posts available.</p>";
        }
    }
?>

