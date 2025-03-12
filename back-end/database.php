<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_pw = "";
    $db_name = "project_apple";

    // create connection
    $mysqli = new mysqli($db_host, $db_user, $db_pw, $db_name);
    if ($mysqli->connect_errno) { die("Connection error: " . $mysqli->connect_error); }

    // // create users table
    // $create_users_table = "CREATE TABLE users (
    // user_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // username VARCHAR(32) UNIQUE KEY,
    // pass_hash VARCHAR(255) NOT NULL
    // )";
    // if (!$mysqli->query($create_users_table)) { die("Error creating users table: " . $mysqli->error); }

    // // create topics table
    // $create_topics_table = "CREATE TABLE topics (
    // topic_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // topic_name VARCHAR(32) UNIQUE KEY
    // )";
    // if (!$mysqli->query($create_topics_table)) { die("Error creating topics table: " . $mysqli->error); }

    // // create posts table
    // $create_posts_table = "CREATE TABLE posts (
    // post_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // topic_id INT(11) UNSIGNED NOT NULL,
    // subject_name VARCHAR(32) NOT NULL,
    // rating TINYINT(1) NOT NULL,
    // rating_desc TEXT,
    // user_id INT(11) UNSIGNED NOT NULL
    // )";
    // if (!$mysqli->query($create_posts_table)) { die("Error creating posts table: " . $mysqli->error); }

    // // insert admin into users table
    // $pass_hash = password_hash("hello23", PASSWORD_DEFAULT);
    // $insert_admin = "INSERT INTO users (username, pass_hash) VALUES ('admin', '$pass_hash')";
    // if (!$mysqli->query($insert_admin)) { die("Error: " . $insert_admin . "<br>" . $mysqli->error); }

    return $mysqli;
?>