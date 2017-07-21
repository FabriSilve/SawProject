<?php
require("header.php");
require("dbAccess.php");
//TODO rimuovere se ajax
?>

<!--TODO trasformare in script che risponde per richiesta ajax-->
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="../pageDashboard.php"> Torna indietro</a></p>
            </div>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Modifica i dati utente:</h1>
            <form method="post" action="userUpdater.php">
                <p>
                    <?php
                        $error = "";
                        try {
                            if(!isset($_POST["username"]) ) {
                                $error = "Utente non inserito";
                                throw new Exception();
                            }

                            $username = trim($_POST["username"]);

                            $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username;");
                            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                            $stmt->execute();
                            if($stmt->rowCount() !== 1) {
                                $error = "utente non presente";
                                throw new Exception();
                            }
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<b>I valori vecchi sono:<br/></b>';
                                echo 'Username: '.$row["username"].'<br/>';
                                echo 'Email: '.$row["email"].'<br/>';
                                echo 'Password: ******** <br/>';
                                echo '<input type="text" name="oldUsername" value="'.$row["username"].'" hidden>';
                            }
                            $conn = null;
                        }
                        catch(PDOException $e) {
                            echo "ERROR ".$e->getMessage();
                        } catch(Exception $e) {
                            header("Location: pageUpdateUser.php?error=".$error);
                        }
                    ?>
                </p>

                <p></p>
                <p><b>Inserisci i nuovi dati:</b></p>
                    <input type="text" name="newUsername" id="username" placeholder="Username" class="radiusDiv padding5" required><span id="status"></span>
                    <input type="email" name="email" id="email" placeholder="Email" class="radiusDiv padding5" required><span id="status"></span>
                    <input type="password" name="password" id="password" placeholder="Password" class="radiusDiv padding5" required><span id="status"></span>
                    <p></p>
                <p><input type="submit" value="Modificare"></p>
            </form>
            <hr>
        </div>
    </div>
</div>


