<?php
require("dbAccess.php");
require("header.php");
require("navbar.php");
?>

<!DOCTYPE html>
<html lang="it">
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageDashboard.php"> Torna indietro</a></p>
            </div>
        </div>
    <div class="col-sm-8 text-left">
            <form method="post" action="adminAdder.php">
                <h1>Utenti</h1>
                <p>Inserisci le credenziali:</p>
                <p>
                    <input type="username" name="username" id="username" placeholder="Enter username" class="radiusDiv padding5" required>
                </p>
                <p>
                    <input type="email" name="email" id="email" placeholder="Enter email" class="radiusDiv padding5" required>
                </p>
                <p>
                    <input type="password" name="password" id="password" placeholder="Enter Password" class="radiusDiv padding5" required>
                </p>
                    <button type="submit" class="radiusDiv">Add</button>
            </form>
        </div>
    </div>
</html>