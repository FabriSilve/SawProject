<?php
require("shared/accessManager.php");
require("shared/header.php");
require("shared/navbar.php");
?>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageDeleteEvent.php">Back</a></p>
            </div>
            <?php
            if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                echo '<hr><div class="well">'.$_GET["message"].'</div>';
            }
            ?>
        </div>
        <div class="col-sm-8 text-left">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>day</th>
                    <th>address</th>
                    <th>lat</th>
                    <th>lon</th>
                    <th>owner</th>
                </tr>
                </thead>
                <?php
                    require("shared/accessManager.php");
                    require("script/dbAccess.php");
                    $message = "";
                    try {
                        if(!isset($_POST["id"]) || empty($_POST["id"])) {
                            $message="ID non valido";
                            throw new Exception();
                        }
                        $id = trim($_POST["id"]);

                        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT * FROM Events WHERE id=:id;");
                        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                        $stmt->execute();

                        if($stmt->rowCount() !== 1) {
                            $message = "ID non presente nel sistema";
                            throw new Exception();
                        }
                        echo '<h1>Seguente evento e` stato trovato: </h1>';
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<td>'.$row["id"].'</td>';
                            echo '<td>'.$row["name"].'</td>';
                            echo '<td>'.$row["description"].'</td>';
                            echo '<td>'.$row["day"].'</td>';
                            echo '<td>'.$row["address"].'</td>';
                            echo '<td>'.$row["lat"].'</td>';
                            echo '<td>'.$row["lon"].'</td>';
                            echo '<td>'.$row["owner"].'</td>';
                            echo '</tr>';
                        }
                        $conn = null;
                    }
                    catch(PDOException $e) {
                        $error = "Errore nel database". " ERROR ".$e->getMessage(); //TODO rimuovere in release
                    } catch (Exception $e) {
                        header("Location: pageDeleteEvent.php?message=" . $message . "&id=" . $idGet);
                    }
                    echo "</table>";

                    if(!empty($error)) {
                        echo '<hr><div class="well">'.$error.'</div>';
                    }
                ?>
            </table>

            <div class="col-sm-8 text-left">
                <form method="post" action="script/eventDeleter.php">
                    <p>Confirm deletion: </p>
                    <input type="text" hidden name="id" id="id" placeholder="Event id" class="radiusDiv padding5"
                           value="<?php echo $id; ?>">
                    <p></p>
                    <p><input type="submit" value="Conferma"></p>
                </form>
            </div>
        </div>
    </div>
