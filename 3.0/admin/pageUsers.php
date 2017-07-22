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
        </div>
            <div class="col-sm-8 text-left">
                <h1>Utenti</h1>
                <p>
                    <?php //TODO trasportare in script e incudere con require
                   /* $DB = [];
                    $count = 0;*/
                    require("script/dbAccess.php");
                    try {
                        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT * FROM Users");
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { //TODO disegnare come tabella
                            echo 'username: '.$row['username']."<br/>";
                            echo 'email: '.$row['email']."<br/>";
                            echo "<br/>";
                        }
                        //echo json_encode($DB, JSON_PRETTY_PRINT);
                        $conn = null;
                    }
                    catch(PDOException $e) {
                        echo "ERROR ".$e->getMessage();
                    }
                    ?>
                </p>
                <hr>
            </div>
        </div>
    </div>

<?php
    require("shared/footer.php");
?>


