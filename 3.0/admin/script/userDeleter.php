<?php
    require("dbAccess.php");

    $message = "";
    try {
        if(!isset($_POST['username']) || empty($_POST['username'])) {
            $message = "Username mancante";
        }
        $username = trim($_POST['username']);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() !== 1) {
            $message = "Utente non presente nel sistema";
            throw new Exception();
        }

        $stmt = $conn->prepare("DELETE FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $conn->commit();
        $message = "Utente cancellato con successo";
    }
    catch(PDOException $e) {
        $conn->rollBack();
        $message = "Errore nel database". " ERROR ".$e->getMessage(); //TODO rimuovere in release
    }
    $conn = null;
    header("Location: ../pageBanUser.php?message=".$message);
?>

