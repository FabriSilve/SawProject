<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 29/05/2017
 * Time: 23:14
 */
    session_start();
    if(isset($_COOKIE['EAkeep'])) {
        setcookie('EAkeep',null);
    }
    session_unset();
    session_destroy();
    header('location: index.php');

    /*TODO
        il sistema non effettua ancora il logout corretto*/
?>


