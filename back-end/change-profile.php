<?php
    session_start();

    $mysqli = require __DIR__ . "/database.php";

    function changeUser() {
        $is_invalid = TRUE;
        $is_taken = TRUE;

        if ($is_invalid) { echo "<em style='color: #c1121f;'>Incorrect password</em><br>"; }
        if ($is_taken) { echo "<em style='color: #c1121f;'>User is already taken</em><br>"; }
    }

    function changePass() {
        $is_invalid = TRUE;

        if ($is_invalid) { echo "<em style='color: #c1121f;'>Incorrect password</em><br>"; }
    }
?>