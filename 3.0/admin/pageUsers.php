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
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>
                            Username
                        </th>
                        <th>
                            Email
                        </th>
                    </tr>
                    </thead>
                    <?php
                        require ("script/dbAccess.php");
                        $error = "";
                        try {
                            $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT username, email FROM Users");
                            $stmt->execute();
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr><td>'.$row['username']."</td>";
                                echo '<td>'.$row['email']."</td></tr>";
                            }
                            $conn = null;
                        }
                        catch(PDOException $e) {
                            $error = "ERROR ".$e->getMessage(); //TODO rimuovere in release
                        }
                    ?>
                </table>
                <hr>
                <?php
                if(!empty($error)) {
                    echo '<div class="well">'.$error.'</div>';
                }
                ?>
            </div>
        </div>
    </div>

<?php
    require("shared/footer.php");
?>


