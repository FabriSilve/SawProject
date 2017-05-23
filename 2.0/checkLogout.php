<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 22/05/2017
 * Time: 18:21
 */

	if(isset($_COOKIE['myCoocke'])) {
        setcookie('myCoocke',null);
        session_unset();
        session_destroy();
    }
	header('location: index.php');
?>