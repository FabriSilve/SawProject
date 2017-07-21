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
                <h1><b>Cancellazione degli eventi</b></h1>
                <form method="post" action="script/eventDeleter.php">
                    <p>Inserisci ID dell`evento da eleminare:</p>
                    <input type="text" name="id" id="id" placeholder="Event id" class="radiusDiv padding5" required>
                    <p></p>
                    <p><input type="submit" value="Elimina"></p>
                </form>
                <?php if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                    echo '<hr><div class="well">'.$_GET["message"].'</div>';
                }
                ?>
            </div>
        </div>
    </div>

