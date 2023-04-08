<?php
    require_once 'dbh.inc.php';
    function emptyInputSignup($name, $email, $password, $password2) {
        $result = false;
        if (empty($name) || empty($email) || empty($password) || empty($password2)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidUid($name) {
        $result = false;
        if (is_numeric($name)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        $result = false;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function pwdMatch($password, $password2) {
        $result = false;
        if ($password !== $password2) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function emailExists($conn, $email) {
        $sql = "SELECT * FROM user_form WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: login.php?error=stmtfailed");
            //header("location: login.php#reg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $name, $email, $password) {
        $sql = "INSERT INTO user_form (name, email, password) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: login.php?error=stmtfailed");
            //header("location: login.php#reg");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        //$success_reg = "A regisztáció sikeres volt!";
        header("location: login.php#reg?error=none");
        exit();
    }