<?php
    /**
     * - se trovo un coockie attivo autorizzo l'utente
     * - se l'utente è autorizzato inizializzo variabile logged = 1, = 0 altrimenti
     */

    $logged = 0;
    $username = null;

    session_start();


    if(!empty($_COOKIE["EAusernameC"])) {
        $logged = 1;
        $username = $_COOKIE["EAusernameC"];
        $_SESSION["EAauthorized"] = 1;
        $_SESSION["EAusername"] = $username;
    }

    if(!empty($_SESSION["EAauthorized"]) && $_SESSION["EAauthorized"] == 1) {
        if(!empty($_SESSION["EAusername"])) {
            $logged = 1;
            $username = $_SESSION["EAusername"];
        }

    }

    /*
     * var:
     *      $logged
     *      $username
     */
?>