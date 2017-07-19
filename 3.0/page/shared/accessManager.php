<?php
    $logged = 0;
    $username = null;
    if(isset($_COOKIE["EAkeep"])) {
        if($_COOKIE["EAkeep"] ==true) {
            $logged = 1;
        }
    }
    if(isset($_COOKIE["EAusername"])) {
        $username = $_COOKIE["EAusername"];
    }
    session_start();
    if(isset($_SESSION["EAauthorized"]) && $_SESSION["EAauthorized"] == 1) {
        $logged = 1;
    }
?>