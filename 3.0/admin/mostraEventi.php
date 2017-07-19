<?php require("header.php");?>

<!DOCTYPE html>
<html lang="it">

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="admin.php"> Torna indietro</a></p>
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
                    $DB[$count++] = array(
                        "id" => $row["id"],
                        "name" => $row["name"],
                        "description" => $row["description"],
                        "day" => $row["day"],
                        "address" => $row["address"],
                        "image" => $row["image"],
                        "lat" => $row["lat"],
                        "lon" => $row["lon"],
                        "owner" => $row["owner"]
                    );
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



