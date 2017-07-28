<?php
    if(session_status() !== PHP_SESSION_ACTIVE ) {
        session_start();
    }
    if(!empty($_COOKIE["AEkeep"]) && $_COOKIE["AEkeep"] === 1) {
        $_SESSION["EAauthorized"] = 1;
        if(!empty($_COOKIE["AEusername"]) && $_COOKIE["AEusername"] === 1) {
            $_SESSION["EAusername"] = $_COOKIE["AEusername"];
        }
    }

    if(!isset($_SESSION["EAauthorized"]) || $_SESSION["EAauthorized"] != 1) {
        header("Location: ../");
    }
?>