<?php
require("accessControl.php");
require("dbAccess.php");
$message = "";
$conn = null;
$sender = "";
$text = "";

try {
    if (empty(trim($_POST['sender']))) {
        $message = "Sender not valid";
        throw new Exception();
    }
    $sender = $_POST["sender"];

    if (empty(trim($_POST['text']))) {
        $message = "text not valid";
        throw new Exception();
    }
    $text = $_POST["text"];
    if(strlen($text) <20) {
        $message = "text too short, at least 20 chars";
        throw new Exception();
    }
    if(strlen($text) >300) {
        $message = "text too long, mex 300 chars";
        throw new Exception();
    }

}catch(Exception $e) {
    header("Location: ../pageAdminContact.php?message=".$message);
    exit;
}

try{

    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();

    $stmt = $conn->prepare("INSERT INTO Messages ( sender, receiver, day, time, text) VALUES ( :sender, 'admin', CURDATE(), CURTIME(), :text)");
    $stmt->bindParam(":sender", $sender);
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
header("Location: ../pageAdminContact.php?message=".$message);
?>