<?php
require("dbAccess.php");
//TODO trasformare in script


if(isset($_POST['username']))
    $username = trim($_POST['username']);

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE FROM Users WHERE username = :username;");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $conn = null;
    echo "";
}
catch(PDOException $e) {
    //TODO comunicare errore alla pagina chiamante
    echo "ERROR ".$e->getMessage();
}

?>

<!--TODO non pagnia a parte ma comunica risultato alla pagina chiamante-->
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><a href="../pageDashboard.php"> Torna indietro</a></p>
            </div>
            <div class="col-sm-8 text-left">
                <h1>Utenti</h1>
                <p></p>
                <div class="well">
                    <p>Utente e` stato eliminato con successo!</p>
                </div>
                <hr>
            </div>
        </div>
    </div>


