<?php
function renderTopicPosts($topic_id) {
    session_start();
    $mysqli = require __DIR__ . "/database.php";

    $get_posts = "SELECT post_id, subject_name, rating, rating_desc, user_id 
                  FROM posts 
                  WHERE topic_id=? 
                  ORDER BY CHAR_LENGTH(rating_desc) DESC";
    
    $stmt = $mysqli->prepare($get_posts);
    $stmt->bind_param("i", $topic_id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<div class="post-container">';
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="post-card">';
            echo '<h3 class="post-title">' . htmlspecialchars($row["subject_name"]) . '</h3>';
            echo '<p class="post-desc">' . nl2br(htmlspecialchars($row["rating_desc"])) . '</p>';
            echo '<p class="user-credit">user_' . htmlspecialchars($row["user_id"]) . '</p>';
            echo '<img src="images/imagesrating_' . intval($row["rating"]) . '.png" alt="Rating" class="apple-corner">';
            echo '</div>';
            
    }
} else {
    echo "<p style='text-align: center;'>No posts yet for this topic.</p>";
}
echo '</div>';

}
?>
