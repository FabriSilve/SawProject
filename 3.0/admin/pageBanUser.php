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
            <?php if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                echo '<hr><div class="well">'.$_GET["message"].'</div>';
            }
            ?>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-6 text-left">
                    <h1>Esegui Ban</h1>
                    <form method="post" action="script/userBanner.php"> <!--TODO inserire richiesta di conferma operazione-->
                        <p>Inserisci username:</p>
                        <p><input type="text" name="username" placeholder="Username" class="radiusDiv padding5" required></p>
                        <p><input type="submit" value="Ban"></p>
                    </form>
                </div>
                <div class="col-sm-6 text-right">
                    <h1>Rimuovi Ban</h1>
                    <form method="post" onsubmit="confirm('Rimuovere ban all\'utente?');" action="script/userUnbanner.php">
                        <p>Inserisci username:</p>
                        <p><input type="text" name="username" placeholder="Username" class="radiusDiv padding5" required></p>
                        <p><input type="submit" value="Unban"></p>
                    </form>
                </div>
            </div>
            <div class="row">
                <h3>Utenti Bannati</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <?php
                        require ("script/dbAccess.php");
                        $error = "";
                        try {
                            $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT username, email FROM Users WHERE banned=1");
                            $stmt->execute();
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr><td>'.$row['username']."</td>";
                                echo '<td>'.$row['email']."</td></tr>";
                            }
                            $conn = null;
                        }
                        catch(PDOException $e) {
                            $error = "ERROR ".$e->getMessage();
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
</div>

