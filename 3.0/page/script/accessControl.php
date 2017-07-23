<?php
    if(session_status() !== PHP_SESSION_ACTIVE ) {
        session_start();
    }
    if(!isset($_SESSION["EAauthorized"]) || $_SESSION["EAauthorized"] != 1) {
        header("Location: ../");
    }
?>