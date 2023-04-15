<?php
    require_once 'dbh.inc.php';

    function dataExists($conn, $userID) {
        $sql = "SELECT * FROM personal WHERE userID = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: login.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $userID);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            $result = false;
        }

        mysqli_stmt_close($stmt);
        return $result;
    }

    function getPersonal($conn) {
        $dataExists = dataExists($conn, $_SESSION["id"]);

        $_SESSION["bio"] = $dataExists["bio"];
        $_SESSION["favChin"] = $dataExists["favChin"];
        $_SESSION["owner"] = $dataExists["owner"];
        $_SESSION["birthDate"] = $dataExists["birthDate"];
        $_SESSION["dailyTime"] = $dataExists["dailyTime"];
        $_SESSION["loveTime"] = $dataExists["loveTime"];
    }
?>