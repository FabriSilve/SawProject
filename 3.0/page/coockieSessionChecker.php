<?php
    $logged = 0;
    if(isset($_COOKIE["EAkeep"])) {
        if($_COOKIE["EAkeep"] ==true) {
            $logged = 1;
        }
    }
    session_start();
    if(isset($_SESSION["authorized"]) && $_SESSION["authorized"] == 1) {
        $logged = 1;
    }
?>