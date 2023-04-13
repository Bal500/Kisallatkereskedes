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
    <link rel="stylesheet" href="./CSS/sidebar.css">
    <link rel="stylesheet" href="./CSS/userinterface.css">
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
        <img id="pp" src="./assets/kepek/user/defaultPP.jpg" alt="profilkep" width="200" height="200">

        <div class="buttons">
            <div class="userinfo">
                <button class="defaultbtn"><i class="fa-solid fa-person"></i><span>Személyes adatok</span></button>
            </div>

            <div class="privacy">
                <button class="defaultbtn"><i class="fa-solid fa-user-secret"></i><span>Láthatóság</span></button>
            </div>

            <div class="security">
                <button class="defaultbtn"><i class="fa-solid fa-lock"></i><span>Biztonság</span></button>
            </div>

            <div class="chat">
                <button class="defaultbtn"><i class="fa-solid fa-comments"></i><span>Chat</span></button>
            </div>

            <button onclick="window.location='logout.inc.php'" class="defaultbtn"><i class="fa-solid fa-right-from-bracket"></i><span>Kijelentkezés</span></button>
            <button onclick="window.location='confirmation.inc.php'" id="delete_account"><i class="fa-solid fa-trash"></i><span>Fiók törlése</span></button>
        </div>
    </div>
    
    <div class="data">
        <div class="userinfoForm">
            <form>
                <label>
                    <div class="namer">
                        <span class="identifier">Név:</span>
                        <input class="inner" type="text" name="name" placeholder="Itt módosíthatod a neved..." value="<?php echo $_SESSION["name"];?>">
                    </div>
                </label>
                <label>
                    <div class=dob>
                        <span class="identifier">Születési idő:</span>
                        <br>
                            <input class="inner" type="date" name="birthdate">
                    </div>
                </label>
                <label>
                    <div class="bio">
                        <span class="identifier">Bio:</span>
                            <textarea class="inner" name="bio" width=400px height=230px placeholder="Mesélj magadról, hogy jobban megismerhessünk..."></textarea>
                    </div>
                    
                </label>
                <label>
                    <div class=daily>
                        <span class="identifier">Napi csincsillával töltött idő:</span>
                        <br>
                        <select name="cars" class="inner">
                            <option>Nincs csincsillám</option>
                            <option>Kevesebb, mint 1 óra</option>
                            <option>1-2 óra</option>
                            <option>3-5 óra</option>
                            <option>Több, mint 5 óra</option>
                        </select>
                    </div>
                </label>
                <label>
                    <div class="fav">
                        <span class="identifier">Kedvenc csincsilla a boltunkból:</span>
                        <div class=inner>
                            <input type="radio" name="favchin"> Puffancs
                            <br>
                            <input type="radio" name="favchin"> Kókusz
                            <br>
                            <input type="radio" name="favchin"> Hamu
                            <br>
                            <input type="radio" name="favchin"> Nutella
                            <br>
                            <input type="radio" name="favchin"> Mochi
                        </div>
                    </div>
                    
                </label>
                <label>
                    <div class="owner">
                        <span class="identifier">Van csincsillád?</span>
                        <div class=inner>
                            <input type="radio" name="owns_chinchilla" value="yes"> Van
                            <br>
                            <input type="radio" name="owns_chinchilla" value="no"> Nincs
                        </div>
                    </div>
                </label>
                <label>
                    <div class="longlove">
                        <span class="identifier">Mióta imádod a csincsillákat?</span>
                        <br>
                            <input class="inner" type="number" id="year_selector" min="1900" max="2099" step="1" value="2023">
                    </div>
                </label>
                <button class="savebtn"><i class="fa-solid fa-floppy-disk"></i><span>Mentés</span></button>
            </form>
        </div>
        
        <div class="privacyForm">
            <form>
                <label>
                    <div class=left>
                        <span class="identifier">Születési idő:</span>
                        <select name="pubpri" class="inner">
                            <option>Publikus</option>
                            <option>Privát</option>
                        </select>
                    </div>
                </label>
                <label>
                    <div class="left">
                        <span class="identifier">Bio:</span>
                        <br>
                        <select name="pubpri" class="inner">
                            <option>Publikus</option>
                            <option>Privát</option>
                        </select>
                    </div>
                    
                </label>
                <label>
                    <div class=left>
                        <span class="identifier">Napi csincsillával töltött idő:</span>
                        <br>
                        <select name="pubpri" class="inner">
                            <option>Publikus</option>
                            <option>Privát</option>
                        </select>
                    </div>
                </label>
                <label>
                    <div class="right">
                        <span class="identifier">Kedvenc csincsilla a boltunkból:</span>
                        <br>
                        <select name="pubpri" class="inner">
                            <option>Publikus</option>
                            <option>Privát</option>
                        </select>
                    </div>
                    
                </label>
                <label>
                    <div class="right2">
                        <span class="identifier">Van csincsillád?</span>
                        <br>
                        <select name="pubpri" class="inner">
                            <option>Publikus</option>
                            <option>Privát</option>
                        </select>
                    </div>
                </label>
                <label>
                    <div class="right3">
                        <span class="identifier">Mióta imádod a csincsillákat?</span>
                        <br>
                        <select name="pubpri" class="inner">
                            <option>Publikus</option>
                            <option>Privát</option>
                        </select>
                    </div>
                </label>
                <button class="savebtn"><i class="fa-solid fa-floppy-disk"></i><span>Mentés</span></button>
            </form>
        </div>

        <div class="securityForm">
            <label>
                <div class="passchanger">
                    <span class="identifier">Jelenlegi jelszó:</span>
                    <br>
                    <input class="inner" type="password" name="currpass">
                </div>
                <div class="passchanger">
                    <span class="identifier">Új jelszó:</span>
                    <br>
                    <input class="inner" type="password" name="newpass">
                </div>
                <div class="passchanger">
                    <span class="identifier">Új jelszó újra:</span>
                    <br>
                    <input class="inner" type="password" name="newpass2">
                </div>
                <button class="savebtn-new"><i class="fa-solid fa-floppy-disk"></i><span>Mentés</span></button>
            </label>
        </div>

        <div class="chatForm">
            <div class="chat-container">
                <div class="chat-header">
                    <h2>Chat</h2>
                </div>
                <div class="chat-messages">
                    <div class="message received">
                        <span class="sender">János</span>
                        <p>Hali, mizu?</p>
                    </div>
                    <div class="message received">
                        <span class="sender">Józsi</span>
                        <p>Szia! Erre minden pacek! <?php echo $_SESSION["name"]?>, veled minden OK?</p>
                    </div>
                    <div class="message sent">
                        <p>Persze, csak a szokásos. Összefutunk a hétvégén?</p>
                    </div>
                    <div class="message received">
                        <span class="sender">János</span>
                        <p>Aha, az király lenne! Hol találkozzunk?</p>
                    </div>
                </div>
                <div class="chat-input">
                    <input type="text" placeholder="Írd ide az üzeneted...">
                    <button class="chatbtn"><i class="fa-solid fa-share"></i><span>Küldés</span></button>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/JS/userinter.js"></script>
</body>
</html>