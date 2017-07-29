<?php
    if(session_status() !== PHP_SESSION_ACTIVE ) {
        session_start();
    }
    if(empty($_SESSION["EAadmin"]) || $_SESSION["EAadmin"] !== 1) {
        header("Location: index.php");
    }
?>