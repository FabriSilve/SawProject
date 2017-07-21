<?php
require("header.php");
require("dbAccess.php");
?>

<!--TODO modificare comuicazione con pagina chiamante-->

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="pageDashboard.php"> Torna indietro</a></p>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Eventi</h1>
            <p><?php
                if(isset($_POST['id']))
                    $id = trim($_POST['id']);
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("DELETE FROM Events WHERE id = :id;");
                    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                    $stmt->execute();
                    $conn = null;
                    echo "";
                }
                catch(PDOException $e) {
                    echo "ERROR ".$e->getMessage();
                }
                ?>
                <div class="well">
                     <p>Evento e` stato eliminato con successo!</p>
                </div>
            <hr>
        </div>
    </div>



