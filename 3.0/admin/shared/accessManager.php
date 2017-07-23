<?php
    $logged = 0;
    if(session_status() !== PHP_SESSION_ACTIVE ) {
        session_start();
    }
    if(isset($_SESSION["EAadmin"]) && $_SESSION["EAadmin"] == 1) {
        $logged = 1;
    } else {
        header("Location: index.php");
    }
?>