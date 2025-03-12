<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_pw = "";
    $db_name = "project_apple";

    $mysqli = new mysqli($db_host, $db_user. $db_pw, $db_name);

    if ($mysqli->connect_errno) { die("Connection error: " . $mysqli->connect_error); }

    return $mysqli;
?>