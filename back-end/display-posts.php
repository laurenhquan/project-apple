<?php
    session_start();

    $mysqli = require __DIR__ . "/database.php";

    $current_page = $_SERVER['PHP_SELF'];

    if (str_contains($current_page, "eatery.php")) {
        $get_posts = "SELECT subject_name, rating, rating_desc, user_id FROM posts WHERE topic_id='1'";
    } elseif (str_contains($current_page, "food.php")) {
        $get_posts = "SELECT subject_name, rating, rating_desc, user_id FROM posts WHERE topic_id='2'";
    } elseif (str_contains($current_page, "drinks.php")) {
        $get_posts = "SELECT subject_name, rating, rating_desc, user_id FROM posts WHERE topic_id='3'";
    } elseif (str_contains($current_page, "products.php")) {
        $get_posts = "SELECT subject_name, rating, rating_desc, user_id FROM posts WHERE topic_id='4'";
    } elseif (str_contains($current_page, "movies.php")) {
        $get_posts = "SELECT subject_name, rating, rating_desc, user_id FROM posts WHERE topic_id='5'";
    } elseif (str_contains($current_page, "tvshows.php")) {
        $get_posts = "SELECT subject_name, rating, rating_desc, user_id FROM posts WHERE topic_id='6'";
    } elseif (str_contains($current_page, "videogames.php")) {
        $get_posts = "SELECT subject_name, rating, rating_desc, user_id FROM posts WHERE topic_id='7'";
    } elseif (str_contains($current_page, "books.php")) {
        $get_posts = "SELECT subject_name, rating, rating_desc, user_id FROM posts WHERE topic_id='8'";
    }

    $result = $mysqli->query($get_posts);
?>