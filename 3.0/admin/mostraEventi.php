<?php require("header.php");?>

<!DOCTYPE html>
<html lang="it">

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
            <h1>Eventi</h1>
            <p><?php
                $DB = [];
                $count = 0;
                require("Access.php");
                try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM Events");
                $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo 'id: '.$row['id']."<br/>";
                        echo 'name: '.$row['name']."<br/>";
                        echo 'description: '.$row['description']."<br/>";
                        echo 'day: '.$row["day"]."<br/>";
                        echo 'address: '.$row['address']."<br/>";
                        echo 'image: '.$row['image']."<br/>";
                        echo 'lat: '.$row['lat']."<br/>";
                        echo 'lon: '.$row['lon']."<br/>";
                        echo "<br/>";
                    }
                echo json_encode($DB, JSON_PRETTY_PRINT);
                $conn = null;
                }
                catch(PDOException $e) {
                    echo "ERROR ".$e->getMessage();
                }
                ?>
            <hr>
        </div>
    </div>
</div>


</html>



