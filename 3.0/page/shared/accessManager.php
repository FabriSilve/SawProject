<?php
    /*
     * - se trovo un coockie attivo autorizzo l'utente
     * - se l'utente è autorizzato inizializzo variabile logged = 1, = 0 altrimenti
     */

    $logged = 0;
    $username = null;

    session_start();

    if(isset($_COOKIE["EAkeep"])) {
        if($_COOKIE["EAkeep"] ==true) {
            $logged = 1;
            if(isset($_COOKIE["EAusername"])) {
                $username = $_COOKIE["EAusername"];
                $_SESSION["EAauthorized"] = 1;
                $_SESSION["EAusername"] = $username;
            }
        }
    }

    if(isset($_SESSION["EAauthorized"]) && $_SESSION["EAauthorized"] == 1) {
        $logged = 1;
    }

    /*
     * var:
     *      $logged
     *      $username
     */
?>