<?php require("header.php");?>

<!DOCTYPE html>
<html lang="it">
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="admin.php"> Torna indietro</a></p>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Utenti</h1>
                <form method="post" action="del.php">
                <p>Inserisci il nome utente da eleminare:</p>
                    <input type="text" name="username" id="username" placeholder="Username" class="radiusDiv padding5" required><span id="status"></span>
                <p><input type="submit" value="Controlla"></p>
            </form>
            <hr>
        </div>
    </div>
</div>

</html>
