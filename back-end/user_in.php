<?php
    $is_invalid = false; // to check for invalid login in entry.html

    $mysqli = require __DIR__ . "./database.php"; // connects to database

    $check_for_user = sprintf("SELECT * FROM user WHERE user_name = '%s'", $mysqli->real_escape_string($_POST["user_name"])); // query to check if user exists in db

    $result = $mysqli->query($check_for_user); // run query

    $existing_user = $result->fetch_assoc(); // variable to hold data if user exists

    if($existing_user) { // if user exists
        if(password_verify($_POST["pass"], $existing_user["pass_hash"])) { // if password matches the hash ver of it
            session_start(); // start session aka user is logged in

            // set session data to user's data
            $_SESSION["user_id"] = $existing_user["user_id"];
            $_SESSION["user_name"] = $existing_user["user_name"];
            $_SESSION["pass_hash"] = $existing_user["pass_hash"];

            header("Location: front-end/pages/logged-in.html"); // directs user to home page
            exit;
        }
    }
    else { // new user
        $pass_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT); // hash password

        $insert_user = "INSERT INTO user (user_name, pass_hash) VALUES (?, ?)"; // query to insert new user into db

        $stmt = $mysqli->stmt_init(); // create statement

        if(!$stmt->prepare($insert_user)) { die("MySQL error: " . $mysqli->error); } // kill if error with preparing query

        $stmt->bind_param("ss", $_POST["user_name"], $pass_hash); // binds parameters

        if($stmt->execute()) { // execute statement
            session_start(); // start session aka user is logged in

            // set session data to user's data
            $_SESSION["user_id"] = $existing_user["user_id"];
            $_SESSION["user_name"] = $existing_user["user_name"];
            $_SESSION["pass_hash"] = $existing_user["pass_hash"];

            header("Location: front-end/pages/logged-in.html"); // directs user to home page
            exit;
        } else {
            die($mysqli->error . " " . $mysqli->errno); // kill if execute gives error
        }
    }

    $is_invalid = true; // none of the above applies = invalid login
?>