<?php
    //TODO trasformare in script
    require("dbAccess.php");

    $message = "";
    try{
        if(!isset($_POST["username"]) || empty($_POST["username"])) {
            $message="Username non valido";
            throw new Exception();
        }
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username 
                                                                AND password = :password
                                                                AND banned !=1"); //TODO query errata. ricercare utente per vedere se esiste
        $stmt = $conn->prepare("UPDATE Users SET  banned=1 WHERE username = :username AND password = :password");
        $stmt->execute();
        $conn = null;
    }
    catch(PDOException $e) {
        //TODO comunicare errore a pagine chiamante
        $message = "ERROR ".$e->getMessage();
    } catch (Exception $e) {}
    header("Location: ../pageBanUser.php?message=".$message);
    //TODO comunicare messaggio di successo a pagina chiamente
?>
