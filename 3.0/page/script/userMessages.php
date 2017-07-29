<?php

    require("accessControl.php");
    require("dbAccess.php");
    $messages = array();
    $count = 0;
    $message = "";

    try {
        if(!isset($_SESSION["EAusername"])) {
            $message = "username non valido";
            throw new Exception();
        }
        $username = $_SESSION["EAusername"];

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT sender, day, time, text, readed FROM Messages WHERE receiver = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if($stmt->rowCount() <= 0) {
            $message = "No message";
            throw new Exception();
        }
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $messages[$count++] = array(
                "sender" => $row["sender"],
                "day" => $row["day"],
                "time" => $row["time"],
                "text" => $row["text"],
                "readed" => $row["readed"]
            );
        }
        //echo json_encode($messages, JSON_PRETTY_PRINT).";";
        $conn = null;
    } catch(PDOException $e) {
        $message = "ERROR ".$e->getMessage();
        //echo "[]; /*".$message."*/";
    } catch(Exception $e) {
        //echo "[]; /*".$message."*/";
    }
?>