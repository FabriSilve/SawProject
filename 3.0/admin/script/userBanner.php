<?php
    require("../shared/accessManager.php");
    require("dbAccess.php");

    $message = "";
    try{
        if(!isset($_POST["username"]) || empty($_POST["username"])) {
            $message="Username non valido";
            throw new Exception();
        }
        $username = trim($_POST["username"]);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        if($stmt->rowCount() !== 1) {
            $message = "Utente non presente nel sistema";
            throw new Exception();
        }

        $stmt = $conn->prepare("UPDATE Users SET  banned=1 WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $conn->commit();
        $message = "Utente bannato con successo";
    }
    catch(PDOException $e) {
        $conn->rollBack();
        $message = "Errore nel database"." ERROR ".$e->getMessage(); //TODO rimuovere in release
    } catch (Exception $e) {
        $conn->rollBack();
    }
    $conn = null;
    header("Location: ../pageBanUser.php?message=".$message);
?>
