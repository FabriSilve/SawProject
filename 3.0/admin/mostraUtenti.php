<?php require("header.php");?>

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
                <p><?php
                    require("Access.php");
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT * FROM Users");
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo 'username: '.$row['username']."<br/>";
                            echo 'email: '.$row['email']."<br/>";
                            echo "<br/>";
                        }
                        $conn = null;
                    }
                    catch(PDOException $e) {
                        echo "ERROR ".$e->getMessage();
                    }
                    ?></p>
                <hr>
            </div>
        </div>
</div>


</html>


