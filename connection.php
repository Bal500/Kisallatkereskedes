<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "user_db";

    if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)) {
        die("Csatlakozási hiba...");
    }
?>