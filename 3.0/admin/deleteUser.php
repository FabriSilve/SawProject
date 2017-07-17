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
            <p>Inserisci il nome utente da eleminare:</p>
            <p><input type="username" name="username" id="username" placeholder="username" class="radiusDiv padding5" required></p>
            <!--OnClick-->
            <p><?php
                $DB = [];
                $count = 0;
                require("Access.php");

                $conn = new mysqli($servername, $dbUser, $dbPass, $dbName);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $query = "SELECT password FROM Users WHERE username = :username;";
                $res = $conn->query($query);
                //echo "Utenti: nome\t, email\t, password\n";
                if($res->num_rows > 0) {
                    while($row = $res->fetch_row()) {

                        echo "\n['".$row[0]."'];\r\n";
                    }
                }
                $conn->close();
                ?></p>
            <hr>
        </div>
    </div>
</div>

</html>
