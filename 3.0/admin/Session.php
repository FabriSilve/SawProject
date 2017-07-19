<?php
$logged = 0;
$username = null;
if(isset($_COOKIE["EAkeep"])) {
    if($_COOKIE["EAkeep"] ==true) {
        $logged = 2;
    }
}
if(isset($_COOKIE["EAusername"])) {
    $username = $_COOKIE["EAusername"];
}
session_start();
if(isset($_SESSION["authorized"]) && $_SESSION["authorized"] == 2) {
    $logged = 2;
}
?>