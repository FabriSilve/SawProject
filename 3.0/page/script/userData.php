<?php
    require("dbAccess.php");
    require("accessControl.php");
    if(empty($username)) {
        header("Location: ../../");
    }
    $userData = null;
    $message = "";
    $numEvents = 0;
    $numFans = 0;
    $numFollowed = 0;
    $numSignaled = 0;

    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT username FROM Users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        if ($stmt->rowCount() !== 1) {
            $message = "Utente non trovato";
            throw  new Exception();
        }

        $stmt = $conn->prepare("SELECT id FROM Events WHERE owner = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $numEvents = $stmt->rowCount();

        $stmt = $conn->prepare("SELECT * FROM Followed NATURAL JOIN Events WHERE owner = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $numFans = $stmt->rowCount();

        $stmt = $conn->prepare("SELECT id FROM Followed WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $numFollowed = $stmt->rowCount();

        $stmt = $conn->prepare("SELECT Signaled.id FROM Signaled NATURAL JOIN Events WHERE owner = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $numSignaled = $stmt->rowCount();

        $stmt = $conn->prepare("SELECT username, name, surname, residence, link, description FROM Profiles WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        if ($stmt->rowCount() !== 1) {
            $message = "Utente non trovato";
            throw  new Exception();
        }

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $userData= array(
            "username" => $row["username"],
            "name" => $row["name"],
            "surname" => $row["surname"],
            "residence" => $row["residence"],
            "link" => $row["link"],
            "description" => $row["description"],
            "events" => $numEvents,
            "fans" => $numFans,
            "followed" => $numFollowed,
            "signaled" => $numSignaled
        );

        echo json_encode($userData, JSON_PRETTY_PRINT);
        $conn->commit();
        $conn = null;
    }catch(PDOException $e) {
        echo "[]; //ERROR PDO:".$e->getMessage();
    } catch(Exception $e) {
        echo "[]; //ERROR ".$message;
    }
?>