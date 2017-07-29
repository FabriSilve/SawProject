<?php
    session_start();
    /*if(isset($_COOKIE['EAkeepC'])) {
        setcookie('EAkeepC',null, time()-10, "/");
    }*/
    if(isset($_COOKIE['EAusernameC'])) {
        setcookie('EAusernameC',null, time()-10, "/");
    }
    session_unset();
    session_destroy();
    header('location: ../index.php');

?>


