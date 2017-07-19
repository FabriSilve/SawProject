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
                    $DB = [];
                    $count = 0;
                    require("Access.php");
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //$conn = new mysqli($servername, $dbUser, $dbPass, $dbName);
                    /*
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }*/
                        $stmt = $conn->prepare("SELECT * FROM Users");
                        $stmt->execute();

                    //$query = "SELECT * FROM Users";
                    //$res = $conn->query($query);
                    //echo "Utenti: nome\t, email\t, password\n";
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $DB[$count++] = array(
                                "username" => $row["username"],
                                "email" => $row["email"]
                            );
                            
                        }
                    /*header("Content-Type: application/json");*/
                    echo json_encode($DB, JSON_PRETTY_PRINT);
                    $conn = null;
                    } catch(PDOException $e) {
                        echo "ERROR ".$e->getMessage();
                    }

                    /*if($res->num_rows > 0) {
                        while($row = $res->fetch_row()) {
                            //$DB[$count++] = [$row[0],$row[1],$row[2]];
                            echo "\n['".$row[0]."',\r\n'".$row[1]."',\t\r\n'".$row[2]."'];\t\r\n";
                        }
                    }
                    $conn->close();*/
                    ?></p>
                <hr>
            </div>
        </div>
</div>


</html>


