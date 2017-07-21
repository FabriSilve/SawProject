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
            <div class="col-sm-8 text-left"><!-- TODO div radice per script ajax-->
                <h1>Utenti</h1>
                <form method="post" action="script/formUpdateUser.php"> <!--TODO insereire uno script ajax per visualizzare qui file intermedio-->
                    <p>Inserisci il nome utente da modificare:</p>
                    <input type="text" name="username" placeholder="Username" class="radiusDiv padding5" required>
                    <span id="status"></span>
                    <p></p>
                    <p><input type="submit" value="Controlla"></p>
                </form>
                <?php if(isset($_GET["error"]) && $_GET["error"] !== "" ) {
                    echo '<div class="well">'.$_GET["error"].'</div>';
                }
                ?>
                <hr>
            </div>
        </div>
    </div>

<?php
    require("shared/footer.php");
?>