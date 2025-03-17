<?php
    $is_invalid = false; // to check for invalid login in entry.html

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $mysqli = require __DIR__ . "/database.php"; // connects to database

        $check_user = sprintf("SELECT * FROM users WHERE username = '%s'", $mysqli->real_escape_string($_POST["username"])); // query to check if user exists in db

        $result = $mysqli->query($check_user); // run query

        $existing_user = $result->fetch_assoc(); // variable to hold data if user exists

        if($existing_user) { // if user exists
            if(password_verify($_POST["pass"], $existing_user["pass_hash"])) { // if password matches the hash ver of it
                session_start(); // start session aka user is logged in

                // set session data to user's data
                $_SESSION["user_id"] = $existing_user["user_id"];
                $_SESSION["username"] = $existing_user["username"];
                $_SESSION["pass_hash"] = $existing_user["pass_hash"];

                header("Location: index.php"); // directs user to home page
                exit;
            }
        }
        else { // new user
            $pass_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT); // hash password

            $insert_user = "INSERT INTO users (username, pass_hash) VALUES (?, ?)"; // query to insert new user into db

            $stmt = $mysqli->stmt_init(); // create statement

            if(!$stmt->prepare($insert_user)) { die("MySQL error: " . $mysqli->error); } // kill if error with preparing query

            $stmt->bind_param("ss", $_POST["username"], $pass_hash); // binds parameters

            if($stmt->execute()) { // execute statement
                session_start(); // start session aka user is logged in

                // set session data to user's data
                $_SESSION["user_id"] = $_POST["user_id"];
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["pass_hash"] = $_POST["pass_hash"];

                header("Location: index.php"); // directs user to home page
                exit;
            } else {
                die($mysqli->error . " " . $mysqli->errno); // kill if execute gives error
            }
        }

        $is_invalid = true; // none of the above applies = invalid login
    }
?>