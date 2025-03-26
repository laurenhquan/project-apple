<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $mysqli = require __DIR__ . "/database.php";

        $insert_post = "INSERT INTO posts (topic_id, subject_name, rating, rating_desc, user_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->stmt_init();
        if (!$stmt->prepare($insert_post)) { die("SQL error: " . $mysqli->error); }

        // TO-DO: check what topic_id aligns with the topic name given
        $check_topic = sprintf("SELECT * FROM topics WHERE topic_name = '%s'", $mysqli->real_escape_string($_POST["topic"]));
        $result = $mysqli->query($check_topic);
        $existing_topic = $result->fetch_assoc();
        $_SESSION["topic_id"] = $existing_topic["topic_id"];

        $stmt->bind_param("isisi", $_SESSION["topic_id"], $_SESSION["subject_name"], $_SESSION["rating"], $_SESSION["desc"], $_SESSION["user_id"]);
        if ($stmt->execute()) {
            header("Location: post-succesful.html");
            exit;
        } else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }
?>