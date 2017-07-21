<?php
$logged = 0;

session_start();
if(isset($_SESSION["EAadmin"]) && $_SESSION["EAadmin"] == 1) {
    $logged = 1;
}
?>