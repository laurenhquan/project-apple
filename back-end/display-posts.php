<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$mysqli = require __DIR__ . "/database.php";


function renderTopicPosts($topic_id) {
    global $mysqli;

    $query = "SELECT post_id, subject_name, rating, rating_desc, user_id FROM posts WHERE topic_id=?";
    $stmt = $mysqli->prepare($query);
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
            echo '</div>';
        }
    } else {
        echo "<p style='text-align: center;'>No results found.</p>";
    }
    echo '</div>';
}
?>
