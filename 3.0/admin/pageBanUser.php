<?php
require("shared/accessManager.php");
require("shared/header.php");
require("shared/navbar.php");

    /*TODO aggindere elenco utenti o utenti bannati e anche form per sbannare un utente*/
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageDashboard.php"> Torna indietro</a></p>
            </div>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Utenti</h1>
            <form method="post" onsubmit="confirm('Bannare l\'utente?');" action="script/userBanner.php">
                <p>Inserisci il nome utente da bannare:</p>
                <input type="text" name="username" placeholder="Username" class="radiusDiv padding5" required><span id="status"></span>
                <p></p>
                <p><input type="submit" value="Ban"></p>
            </form>
            <?php if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                echo '<hr><div class="well">'.$_GET["message"].'</div>';
            }
            ?>
        </div>
    </div>
</div>

