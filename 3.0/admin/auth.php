<?php
/**
 * Created by PhpStorm.
 * User: vera
 * Date: 12/07/17
 * Time: 16.15
 */

session_start();

    $admin = 'admin';
    $pass = 'a029d0df84eb5549c641e04a9ef389e5';
    echo md5('pass');


    if(!$_SESSION['admin']){
        header("Location: admin.php");
        exit;
    }

    if($_POST['submit']){
        if($admin == $_POST['user'] AND $pass == md5($_POST['pass'])){
            $_SESSION['admin'] = $admin;
            header("Location: admin.php");
            exit;
        }else echo 'Le credenziali sono sbagliate';
    }

    if($_SESSION['admin']){
        header("Location: admin.php");
        exit;
    }

    if($_GET['do'] == 'logout'){
        unset($_SESSION['admin']);
        session_destroy();
    }
?>

<a href="admin.php?do=logout">Logout</a>
