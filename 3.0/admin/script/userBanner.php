<?php
    require("dbAccess.php");
    require("navbar.php");

    if(isset($_POST["username"])) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
    }

    try{
        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username 
                                                                AND password = :password
                                                                AND banned !=1");
        $stmt = $conn->prepare("UPDATE Users SET  banned=1 WHERE username = :username AND password = :password");
        $stmt->execute();
        $conn = null;
    }
    catch(PDOException $e) {
        //TODO comunicare errore a pagine chiamante
        echo "ERROR ".$e->getMessage();
    }

    //TODO comunicare messaggio di successo a pagina chiamente
?>
