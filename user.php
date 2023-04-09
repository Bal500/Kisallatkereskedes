<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Csincsilla Store</title>
    <link rel="stylesheet" href="./CSS/main.css">
    <link rel="stylesheet" href="./CSS/szoveg.css">
    <link rel="stylesheet" href="./CSS/anim.css">
    <link rel="stylesheet" href="./CSS/iconbar.css">
    <link rel="stylesheet" href="./CSS/login.css">
    <link rel="stylesheet" href="./CSS/toltokep.css">
    <link rel="stylesheet" href="./CSS/back.css">
    <link rel="stylesheet" href="./CSS/userinter.css">
    <link href="./assets/css/fontawesome.css" rel="stylesheet">
    <link href="./assets/css/solid.css" rel="stylesheet">
    <link rel="icon" href="./assets/kepek/csinsegg.ico">
</head>
<body>
    <div class="icon-bar">
        <a class="intactive" href="elerheto.php"><i class="fa fa-paw"></i></a>
        <a class="inactive" href="kiegeszito.php"><i class="fa-solid fa-baseball"></i></a>
        <a class="inactive" href="tartasa.php"><i class="fa-solid fa-house"></i></a>
        <a class="inactive" href="jellemzoi.php"><i class="fa-solid fa-venus-mars"></i></a>
        <a class="inactive" href="elerhetoseg.php"><i class="fa-solid fa-phone"></i></a>
        <?php
            if (isset($_SESSION["id"])) {
                echo "<a class='active' href='user.php'><i class='fa-solid fa-user'></i></a>";
            } else {
                echo "<a class='active' href='login.php'><i class='fa-solid fa-user'></i></a>";
            }
        ?>
    </div>
    
    <div class="sidebar">
        <div class="user_data">
            <?php
                echo $_SESSION["name"];
            ?>
        </div>
        <img id="pp" src="./assets/kepek/user/defaultPP2.jpg" alt="profilkep" width="200" height="200">

        <div class="buttons">
            <button class="defaultbtn"><i class="fa-solid fa-person"></i><span>Személyes adatok</span></button>
            <button class="defaultbtn"><i class="fa-solid fa-user-secret"></i><span>Láthatóság</span></button>
            <button class="defaultbtn"><i class="fa-solid fa-lock"></i><span>Biztonság</span></button>
            <button class="defaultbtn"><i class="fa-solid fa-comments"></i><span>Chat</span></button>
            <button onclick="window.location='logout.inc.php'"class="defaultbtn"><i class="fa-solid fa-right-from-bracket"></i><span>Kijelentkezés</span></button>
            <button id="delete_account"><i class="fa-solid fa-trash"></i><span>Fiók törlése</span></button>
        </div>
    </div>
    
    
</body>
</html>