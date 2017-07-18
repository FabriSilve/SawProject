<?php
require("header.php");
require("Access.php");

if(isset($_POST["username"])) {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
}

try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE Users SET username = ':username', email = ':email',password = ':password'
                                          WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $conn = null;
        echo "";
        //require("admin.php");
}
catch(PDOException $e) {
    echo "ERROR ".$e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="it">
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="admin.php"> Torna indietro</a></p>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Modifica i dati utente:</h1>
            <p></p>
            <div class="well">
                <p>I dati stati modificati con successo!</p>
            </div>
            <hr>
        </div>
    </div>
</div>

</html>

