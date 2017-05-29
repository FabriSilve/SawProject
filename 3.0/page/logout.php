<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 29/05/2017
 * Time: 23:14
 */
    if(isset($_COOKIE['EAkeep'])) {
        setcookie('EAkeep',null);

    }
    $_SESSION ["authorized"] = 0;
    header('location: index.php');

    /*TODO
        il sistema non effettua ancora il logout corretto*/
?>


