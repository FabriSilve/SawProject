<?php
    require("accessControl.php");
    require("dbAccess.php");
    $message = "";
    $conn = null;
    $sender = "";
    $receiver = "";
    $text = "";

    try {
        if (empty(trim($_POST['sender']))) {
            $message = "Sender not valid";
            throw new Exception();
        }
        $sender = $_POST["sender"];

        if (empty(trim($_POST['receiver']))) {
            $message = "receiver not valid";
            throw new Exception();
        }
        $receiver = $_POST["receiver"];

        if (empty(trim($_POST['text']))) { //TODO inserire controllo lunghezza testo
            $message = "text not valid";
            throw new Exception();
        }
        $text = $_POST["text"];
        echo "input acquisiti";

    }catch(Exception $e) {
        echo $message;
        //header("Location: ../pageAddEvent.php?message=".$message);
        exit;
    }

    try{

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT username FROM Users WHERE username = :sender");
        $stmt->bindParam(":sender",$sender);

        $stmt->execute();
        if($stmt->rowCount() !== 1) {
            $message="users ".$sender." not found";
            throw new Exception();
        }

        $stmt = $conn->prepare("SELECT username FROM Users WHERE username = :receiver");
        $stmt->bindParam(":receiver",$receiver);

        $stmt->execute();
        if($stmt->rowCount() !== 1) {
            $message="users ".$receiver." not found";
            throw new Exception();
        }

        $stmt = $conn->prepare("INSERT INTO Messages ( sender, receiver, day, time, text) VALUES ( :sender, :receiver, CURDATE(), CURTIME(), :text)");
        $stmt->bindParam(":sender", $sender);
        $stmt->bindParam(":receiver",$receiver);
        $stmt->bindParam(":text",$text);
        $stmt->execute();

        $conn->commit();
        $message ="Sended";
    } catch(PDOException $e) {
        $conn->rollBack();
        $message = "ERROR ".$e->getMessage();
    } catch (Exception $e) {
        $conn->rollBack();
    }
    $conn = null;
    echo $message;
    //header("Location: ../pageAddEvent.php?message=".$message);
?>