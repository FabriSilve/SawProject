<?php
require("header.php");
require("Access.php");?>

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
            <h1>Modifica i dati utente:</h1>
            <p>
                <?php
                if(isset($_POST["username"]))
                    $username = trim($_POST["username"]);
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username;");
                    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                    $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<b>I valori vecchi sono:<br/></b>";
                        echo 'Username: '.$row['username']."<br/>";
                        echo 'Email: '.$row['email']."<br/>";
                        echo 'Password: '.$row['password']."<br/>";
                    }
                    $conn = null;
                }
                catch(PDOException $e) {
                    echo "ERROR ".$e->getMessage();
                }
                ?>
            </p>
            <form method="post" action="ModificaU.php">
                <p></p>
                <p><b>Inserisci i nuovi dati:</b></p>
                    <input type="text" name="username" id="username" placeholder="Username" class="radiusDiv padding5" required><span id="status"></span>
                    <input type="text" name="email" id="email" placeholder="Email" class="radiusDiv padding5" required><span id="status"></span>
                    <input type="text" name="password" id="password" placeholder="Password" class="radiusDiv padding5" required><span id="status"></span>
                    <p></p>
                <p><input type="submit" value="Modificare"></p>
            </form>
            <hr>
        </div>
    </div>
</div>

</html>
