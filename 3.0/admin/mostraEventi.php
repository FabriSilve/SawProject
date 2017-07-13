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
                $query = "SELECT * FROM Events";
                $res = $conn->query($query);
                if($res->num_rows > 0) {
                    while($row = $res->fetch_row()) {
                        //$DB[$count++] = [$row[0],$row[1],$row[2]];
                        echo "['".$row[0]."','".$row[1]."',\t\r\n'".$row[2]."',
                              '".$row[3]."','".$row[4]."','".$row[5]."',
                              '".$row[6]."','".$row[7]."','".$row[8]."'];\r\n";
                    }
                }
                $conn->close();
                ?></p>
            <hr>
        </div>
    </div>
</div>


</html>



