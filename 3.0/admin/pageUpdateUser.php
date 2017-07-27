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
                <?php
                echo $_POST["username"];
                    if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                        echo '<div class="well">'.$_GET["message"].'</div>';
                    }
                ?>
            </div>
            <div class="col-sm-8 text-left">
                <h1><b>Modifica degli Utenti</b></h1>
                <div class="well">
                    <form method="post" action="TrovaUpdateUser.php">
                        <p>Inserisci il nome utente da modificare:</p>
                        <input type="text" name="username" id="username" placeholder="Username"
                               class="radiusDiv padding5" required><span id="status"></span>
                        <p></p>
                        <p><input type="submit" value="Controlla"></p>
                    </form>
                </div>
                <hr>
                <div class="well">
                    <h4>Utenti attualmente presenti nel database:</h4>
                    <?php
                    require("script/showUsers.php");
                    ?>
                </div>
        </div>
    </div>

<?php
    require("shared/footer.php");
?>