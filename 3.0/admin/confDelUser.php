<?php
require("shared/accessManager.php");
require("shared/header.php");
require("shared/navbar.php");
?>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageDeleteEvent.php"> Torna indietro</a></p>
            </div>
            <?php
            if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                echo '<hr><div class="well">'.$_GET["message"].'</div>';
            }
            ?>
        </div>
        <div class="col-sm-8 text-left">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
                </thead>
                <?php
                require("shared/accessManager.php");
                require("script/dbAccess.php");
                $message = "";
                try{
                    if(!isset($_POST["username"]) || empty($_POST["username"])) {
                        $message="Username non valido";
                        throw new Exception();
                    }
                    $username = trim($_POST["username"]);

                    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn->beginTransaction();

                    $stmt = $conn->prepare("SELECT username, email FROM Users NATURAL JOIN Profiles WHERE username = :username");
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                    echo '<h1>Seguente utente e` stato trovato: </h1>';
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr><td>'.$row['username'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                    }
                    if($stmt->rowCount() !== 1) {
                        $message = "Utente non presente nel sistema";
                        throw new Exception();
                    }

                    $conn = null;
                }
                catch(PDOException $e) {
                    $error = "Errore nel database". " ERROR ".$e->getMessage(); //TODO rimuovere in release
                }
                echo "</table>";

                if(!empty($error)) {
                    echo '<hr><div class="well">'.$error.'</div>';
                }
                ?>
            </table>

            <div class="col-sm-8 text-left">
                <form method="post" action="userDeleter.php">
                    <p>Conferma la cancellazione, rimmittendo il username: </p>
                    <input type="text" name="username" placeholder="Username" class="radiusDiv padding5" required>
                    <p></p>
                    <p><input type="submit" value="Conferma Eliminaazione"></p>
                </form>
        </div>
    </div>
</div>
