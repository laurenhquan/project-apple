<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["post_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $post_id = (int) $_POST["post_id"];
    $user_id = $_SESSION["user_id"];

    // check if the post belongs to the user
    $check_query = "SELECT * FROM posts WHERE post_id = ? AND user_id = ?";
    $stmt = $mysqli->prepare($check_query);
    if (!$stmt) {
        die("Check query prepare failed: " . $mysqli->error);
    }

    $stmt->bind_param("ii", $post_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        // delete the post
        $delete_query = "DELETE FROM posts WHERE post_id = ?";
        $delete_stmt = $mysqli->prepare($delete_query);
        if (!$delete_stmt) {
            die("Delete query prepare failed: " . $mysqli->error);
        }

        $delete_stmt->bind_param("i", $post_id);
        $delete_stmt->execute();

        if ($delete_stmt->affected_rows === 1) {
            // success! -> redirect
            header("Location: ../front-end/profile.php");
            exit;
        } else {
            die("Delete failed or no row affected.");
        }
    } else {
        die("Post not found or doesn't belong to the user.");
    }
} else {
    die("Invalid request.");
}
