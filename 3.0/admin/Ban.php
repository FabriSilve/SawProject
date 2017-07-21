<?php
/**
 * Created by PhpStorm.
 * User: vera
 * Date: 20/07/17
 * Time: 9.54
 */
require("header.php");?>

<!DOCTYPE html>
<html lang="it">
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="admin.php"> Torna indietro</a></p>
            </div>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Utenti</h1>
            <form method="post" action="ban-users.php">
                <p>Inserisci il nome utente da bannare:</p>
                <input type="text" name="username" placeholder="Username" class="radiusDiv padding5" required><span id="status"></span>
                <p></p>
                <p><input type="submit" value="Ban"></p>
            </form>
            <hr>
        </div>
    </div>
</div>

