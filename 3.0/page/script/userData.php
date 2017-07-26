<?php
    require("dbAccess.php");
    require("accessControl.php");
    if(!isset($_SESSION["EAusername"]) || empty($_SESSION["EAusername"])) {
        header("Location: ../../");
    }
    $username = $_SESSION["EAusername"];
    $message = "";

    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
            "residence" => $row["description"],
            "link" => $row["link"],
            "description" => $row["description"]
        );

        /*header("Content-Type: application/json");*/
        echo json_encode($userData, JSON_PRETTY_PRINT);
        $conn = null;
    }catch(PDOException $e) {
        echo "[{}]; //ERROR PDO:".$e->getMessage();
    } catch(Exception $e) {
        echo "[{}]; //ERROR ".$message;
    }
?>