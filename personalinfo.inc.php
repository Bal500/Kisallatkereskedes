<?php
    session_start();
    require_once 'dbh.inc.php';

    $userID = $_SESSION["id"];

    $stmt = $conn->prepare("SELECT bio, birthDate, dailyTime, loveTime, favChin, owner FROM personal WHERE userID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $_SESSION["bio"] = $row["bio"];
    $_SESSION["birthdate"] = $row["birthDate"];
    $_SESSION["dailyTime"] = $row["dailyTime"];
    $_SESSION["loveTime"] = $row["loveTime"];
    $_SESSION["favChin"] = $row["favChin"];
    $_SESSION["owner"] = $row["owner"];

    $stmt->close();
    $conn->close();
?>
