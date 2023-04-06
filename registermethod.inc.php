<?php
    if (isset($_POST["submit_reg"])) {
        $name = $_POST["name_register"];
        $email = $_POST["email_register"];
        $password = $_POST["password_register"];
        $password2 = $_POST["password2_register"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if (emptyInputSignup($name, $email, $password, $password2) !== false) {
            //header("location: login.php?error=emptyinput");
            header("location: login.php#");
            exit();    
        }
        if (invalidUid($name) !== false) {
            //header("location: login.php?error=invaliduid");
            header("location: login.php#reg");
            exit();    
        }
        if (invalidEmail($email) !== false) {
            //header("location: login.php?error=invalidemail");
            header("location: login.php#reg");
            exit();
        }
        if (pwdMatch($password, $password2) !== false) {
            //header("location: login.php?error=passwordsdontmatch");
            header("location: login.php#reg");
            exit();
        }
        if (emailExists($conn, $email) !== false) {
            //header("location: login.php?error=emailtaken");
            header("location: login.php#reg");
            exit();
        }

        createUser($conn, $name, $email, $password);

    } else {
        //header("location: login.php");
        header("location: login.php#log");
        exit();
    }