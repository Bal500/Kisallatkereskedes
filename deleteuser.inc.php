<?php
    session_start();
    require_once 'dbh.inc.php';

    $id_del = $_SESSION["id"];

    $query = "DELETE FROM user_form WHERE id='$id_del'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script>
            alert("A felhasználó sikeresen törlésre került!");
        </script>';
        session_destroy();
        header("location: login.php?torolve");
        exit();
    } else {
        echo '<script>
            alert("Valami hiba történt, próbáld újra!");
        </script>';
        require_once 'logout.inc.php';
        exit();
    }
?>