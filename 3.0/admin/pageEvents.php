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
            <h1>Eventi</h1>
            <p><?php //TODO esportare in script e richiamare con require
                /*$DB = [];
                $count = 0;*/
                require("script/dbAccess.php");
                try {
                $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM Events");
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $image_file = "../uploads/default.jpg";
                        if(file_exists("../uploads/".$row["id"].".jpg"))
                            $image_file = "../uploads/".$row["id"].".jpg";

                        echo 'id: '.$row["id"].'<br/>';
                        echo 'name: '.$row["name"].'<br/>';
                        echo 'description: '.$row["description"].'<br/>';
                        echo 'day: '.$row["day"].'<br/>';
                        echo 'address: '.$row["address"].'<br/>';
                        echo 'image: <img src="'.$image_file.'" style="height:200px;"><br/>';
                        echo 'lat: '.$row["lat"].'<br/>';
                        echo 'lon: '.$row["lon"].'<br/>';
                        echo '<br/>';
                    }
                //echo json_encode($DB, JSON_PRETTY_PRINT);
                $conn = null;
                }
                catch(PDOException $e) {
                    //TODO comunicare errori alla pagina
                    echo "ERROR ".$e->getMessage();
                }
                ?>
            <hr>
        </div>
    </div>
</div>

<?php
    require("shared/footer.php");
?>



