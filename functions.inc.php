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

    function emptyInputLogin($email_log, $password_log) {
        $result = false;
        if (empty($email_log) || empty($password_log)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $email_log, $password_log) {
        $emailExists = emailExists($conn, $email_log);

        if ($emailExists === false) {
            echo "<script>
                alert('Hiba! Az e-mail cím nem található!');
                window.location.href = 'login.php#log';
            </script>";
            exit();
        }

        $passwordHashed_log = $emailExists["password"];
        $checkPassword = password_verify($password_log, $passwordHashed_log);

        if ($checkPassword === false) {
            echo "<script>
                alert('Hibás jelszó!');
                window.location.href = 'login.php#log';
            </script>";
            exit();
        } else if ($checkPassword === true) {
            session_start();
            $_SESSION["id"] = $emailExists["id"];
            $_SESSION["email"] = $emailExists["email"];
            header("location: elerheto.php");
            exit();
        }
    }
?>