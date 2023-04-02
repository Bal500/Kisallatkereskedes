<!-- <?php
    //session_start();

    include("connection.php");

    $error_regdata = "A megadott adatok nem megfelelőek, próbálkozz újra!";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $entered_name = $_POST['name_register'];
        $entered_email = $_POST['email_register'];
        $entered_password = $_POST['password_register'];
        $entered_password2 = $_POST['password2_register'];

        if (!empty($entered_name) || !empty($entered_password) || $entered_password != $entered_password2 || !is_numeric($entered_name)) {
            $query = "insert into user_form (name, email, password) values ('$entered_name', '$entered_email', '$entered_password')";
            mysqli_query($conn, $query);
            die();
        } else {
            echo '<span class="error_msg">'.$error_regdata.'</span>';
        }
    }
?> -->

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
    <link href="./assets/css/fontawesome.css" rel="stylesheet">
    <link href="./assets/css/solid.css" rel="stylesheet">
    <link rel="icon" href="./assets/kepek/csinsegg.ico">
</head>
<body>
    <div class="icon-bar">
        <a class="inactive" href="elerheto.html"><i class="fa fa-paw"></i></a>
        <a class="inactive" href="kiegeszito.html"><i class="fa-solid fa-baseball"></i></a>
        <a class="inactive" href="tartasa.html"><i class="fa-solid fa-house"></i></a>
        <a class="inactive" href="jellemzoi.html"><i class="fa-solid fa-venus-mars"></i></a>
        <a class="inactive" href="elerhetoseg.html"><i class="fa-solid fa-phone"></i></a>
        <a class="active" href="login.php"><i class="fa-solid fa-user"></i></a>
    </div>
    <div class="wrapper">
        <form method="post" id="login-method">
            <div class="login-form">
                <h2>Bejelentkezés</h2>
                <form action="#">
                    <div class="input">
                        <span class="icon"><i class="fa-solid fa-at"></i></span>
                        <input type="email" required>
                        <label>E-mail</label>
                    </div>
    
                    <div class="input">
                        <span class="icon"><i class="fa-solid fa-key"></i></span>
                        <input type="password" required>
                        <label>Jelszó</label>
                    </div>
    
                    <div class="remember-forgot">
                        <label><input type="checkbox">Emlékezz rám | </label><a href="#">Elfelejtetted a jelszavad?</a>
                    </div>
    
                    <button type="submit" class="btn">Belépés</button>
    
                    <div class="login-regist">
                        <p>Még nincs fiókod? <a href="#" class="regist-link">Regisztrálj!</a></p>
                    </div>
                </form>
            </div>
        </form>

        <form method="post" id="register-method">
            <div class="regist-form">
                <h2>Regisztráció</h2>
                    <div class="input">
                        <span class="icon"><i class="fa-solid fa-signature"></i></span>
                        <input type="text" name="name_regsiter" required>
                        <label>Név</label>
                    </div>
                    <div class="input">
                        <span class="icon"><i class="fa-solid fa-at"></i></span>
                        <input type="email" name="email_regsiter" required>
                        <label>E-mail</label>
                    </div>
                    <div class="input">
                        <span class="icon"><i class="fa-solid fa-key"></i></span>
                        <input type="password" name="password_regsiter" required>
                        <label>Jelszó</label>
                    </div>
                    <div class="input">
                        <span class="icon"><i class="fa-solid fa-key"></i></span>
                        <input type="password" name="password2_regsiter" required>
                        <label>Jelszó újra</label>
                    </div>
                    <div class="aszf">
                        <label><input type="checkbox">ÁSZF elfogadása</label>
                    </div>
                    <button type="submit" class="btn" formt="register-method">Regisztráció</button>
                    <div class="login-regist">
                        <p>Van már fiókod? <a href="#" class="login-link">Jelentkezz be!</a></p>
                    </div>
            </div>
        </form>
    </div>
    <script src="./assets/JS/login.js"></script>
</body>
</html>