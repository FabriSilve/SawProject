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
                <p><?php
                    /**
                     * Created by PhpStorm.
                     * User: vera
                     * Date: 12/07/17
                     * Time: 17.21
                     */
                    $DB = [];
                    $count = 0;
                    require("Access.php");

                    $conn = new mysqli($servername, $dbUser, $dbPass, $dbName);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $query = "SELECT * FROM Users";
                    $res = $conn->query($query);
                    //echo "Utenti: nome\t, email\t, password\n";
                    if($res->num_rows > 0) {
                        while($row = $res->fetch_row()) {
                            //$DB[$count++] = [$row[0],$row[1],$row[2]];
                            echo "\n['".$row[0]."',\r\n'".$row[1]."',\t\r\n'".$row[2]."'];\t\r\n";
                        }
                    }
                    $conn->close();
                    ?></p>
                <hr>
            </div>
        </div>
</div>


</html>


