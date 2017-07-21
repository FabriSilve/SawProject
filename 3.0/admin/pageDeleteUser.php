<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    require("shared/navbar.php");
?>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p><a href="pageDashboard.php"> Torna indietro</a></p>
                </div>
            </div>
            <div class="col-sm-8 text-left">
                <h1><b>Cancellazione degli utenti</b></h1>
                    <form method="post" action="script/userDeleter.php"> <!--TODO inserire popup di conferma-->
                    <p>Inserisci il nome utente da eleminare:</p>
                        <input type="text" name="username" id="username" placeholder="Username" class="radiusDiv padding5" required><span id="status"></span>
                        <p></p>
                    <p><input type="submit" value="Controlla"></p>
                </form>
                <hr>
            </div>
        </div>
    </div>

<?php
    require("shared/footer.php");
?>
