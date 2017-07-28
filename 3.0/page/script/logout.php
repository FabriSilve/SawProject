<?php
    session_start();
    if(isset($_COOKIE['EAkeepC'])) {
        setcookie('EAkeepC',null);
    }
    if(isset($_COOKIE['EAusernameC'])) {
        setcookie('EAusernameC',null);
    }
    session_unset();
    session_destroy();
    header('location: ../index.php');

?>


