<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 31/05/2017
 * Time: 11:23
 */
    /*
     *  ste = 0
     *  vera = 1
     *  faber = 2
     *  default = webdev vera
     */
    $whereIAm = 11;

    /*$servername;
    $dbUser;
    $dbPass;
    $dbName;*/

    switch($whereIAm) {
        case 0:
            $servername = "localhost";
            $dbUser = "S4095697";
            $dbPass = "sawforthewin666";
            $dbName = "S4095697";
            break;
        case 1:
            $servername = "localhost";
            $dbUser = "root";
            $dbPass = "root";
            $dbName = "sawdb";
            break;
        case 2:
            //dati faber;
        default:
            $servername = "localhost";
            $dbUser = "S4116422";
            $dbPass = "Minsk";
            $dbName = "S4116422";
    }
