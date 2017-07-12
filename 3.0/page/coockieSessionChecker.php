<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 21/05/2017
 * Time: 10:43
 */
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