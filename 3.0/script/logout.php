<?php
    session_start();
    if(isset($_COOKIE['EAkeep'])) {
        setcookie('EAkeep',null);
    }
    if(isset($_COOKIE['EAusername'])) {
        setcookie('EAusername',null);
    }
    session_unset();
    session_destroy();
    header('location: index.php');

    /*TODO il sistema non effettua ancora il logout corretto*/
?>


