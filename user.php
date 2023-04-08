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
    <link href="./assets/css/fontawesome.css" rel="stylesheet">
    <link href="./assets/css/solid.css" rel="stylesheet">
    <link rel="icon" href="./assets/kepek/csinsegg.ico">
</head>
<body>
    <div class="icon-bar">
        <a class="intactive" href="elerheto.html"><i class="fa fa-paw"></i></a>
        <a class="inactive" href="kiegeszito.html"><i class="fa-solid fa-baseball"></i></a>
        <a class="active" href="tartasa.html"><i class="fa-solid fa-house"></i></a>
        <a class="inactive" href="jellemzoi.html"><i class="fa-solid fa-venus-mars"></i></a>
        <a class="inactive" href="elerhetoseg.html"><i class="fa-solid fa-phone"></i></a>
        <?php
            if (isset($_SESSION["id"])) {
                echo "<a class='inactive' href='user.php'><i class='fa-solid fa-user'></i></a>";
            } else {
                echo "<a class='inactive' href='login.php'><i class='fa-solid fa-user'></i></a>";
            }
        ?>
    </div>
    
    <?php
        echo "<p> Hello there ".$_SESSION["name"]."</p>";
    ?>
    <a href="logout.inc.php"><i class="fa-solid fa-right-from-bracket"></i></a>
</body>
</html>