<?php

    function changeUser() {
        session_start();

        $mysqli = require __DIR__ . "/database.php";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if(!password_verify($_POST["pass"], $_SESSION["pass_hash"])) { // if password does not match the hash ver of it
                echo "<em style='color: #c1121f;'>Incorrect password</em><br>";
            }
            else { // if password is correct
                if($_POST["new_username"] == $_SESSION["username"]) { // if user puts in the same username already using
                    echo "<em style='color: #c1121f;'>Username is already in use</em><br>";
                }
                else {
                    $check_user = sprintf("SELECT * FROM users WHERE username = '%s'", $mysqli->real_escape_string($_POST["new_username"])); // query to check if username exists in db
                    $result = $mysqli->query($check_user); // run query
                    $existing_user = $result->fetch_assoc(); // variable to hold data if user exists

                    if ($existing_user) { // if username already exists
                        echo "<em style='color: #c1121f;'>Username is already taken</em><br>";
                    }
                    else { // if username is free
                        $update_user = "UPDATE users SET username = ? WHERE user_id = ?"; // query to update username in db
                        $stmt = $mysqli->stmt_init(); // create statement
                        if(!$stmt->prepare($update_user)) { die("MySQL error: " . $mysqli->error); } // kill if error with preparing query
                        $stmt->bind_param("si", $_POST['new_username'], $_SESSION['user_id']); // binds parameters

                        if($stmt->execute()) { // execute statement
                            $_SESSION["username"] = $_POST["new_username"]; // update session username
                            header("Location: settings.php"); // directs user to home page
                            exit;
                        } else {
                            die($mysqli->error . " " . $mysqli->errno); // kill if execute gives error
                        }
                    }
                }              
            }
        }
    }

    function changePass() {
        session_start();

        $mysqli = require __DIR__ . "/database.php";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if(!password_verify($_POST["old_pass"], $_SESSION["pass_hash"])) { // if password does not match the hash ver of it
                echo "<em style='color: #c1121f;'>Incorrect password</em><br>";
            }
            else { // if password is correct
                if(password_verify($_POST["new_pass"], $_SESSION["pass_hash"])) { // if user puts in the same password already using
                    echo "<em style='color: #c1121f;'>Password is already in use</em><br>";
                }
                else {
                    $update_pass = "UPDATE users SET pass_hash = ? WHERE user_id = ?"; // query to update username in db
                    $stmt = $mysqli->stmt_init(); // create statement
                    if(!$stmt->prepare($update_pass)) { die("MySQL error: " . $mysqli->error); } // kill if error with preparing query
                    $stmt->bind_param("si", password_hash($_POST["new_pass"], PASSWORD_DEFAULT), $_SESSION['user_id']); // binds parameters
                    $is_successful = true;

                    if($stmt->execute()) { // execute statement
                        $_SESSION["pass_hash"] = password_hash($_POST["new_pass"], PASSWORD_DEFAULT); // update session username
                        header("Location: settings.php"); // directs user to home page
                        exit;
                    } else {
                        die($mysqli->error . " " . $mysqli->errno); // kill if execute gives error
                    }
                }
            }
        }
    }
?>