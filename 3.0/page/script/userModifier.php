<?php
require("accessControl.php");
require("dbAccess.php");

$username = "";
$name = "";
$surname = "";
$residence = "";
$description = "";
$link = "";

$message = "";

try {
    if (empty(trim($_GET['username']))) {
        $message = "username not valid";
        echo $message;
        die();
    }
    $username = $_GET['username' ];

    if (!empty(trim($_GET['name']))) {
        $name = trim($_GET['name']);
    }

    if (!empty(trim($_GET['surname']))) {
        $surname = trim($_GET['surname']);
    }

    if (!empty(trim($_GET['residence']))) {
        $residence = trim($_GET['residence']);
    }

    if (!empty(trim($_GET['description']))) {
        $description = trim($_GET['description']);
    }

    if (!empty(trim($_GET['link']))) {
        $link = trim($_GET['link']);
    }


    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();

    $stmt = $conn->prepare("SELECT username FROM Profiles WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    if ($stmt->rowCount() !== 1) {
        $message = "Username not found";
        throw new Exception();
    }

    $stmt = $conn->prepare("UPDATE Profiles SET name = :name, surname = :surname, residence = :residence, description = :description, link = :link WHERE username = :username");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":surname", $surname);
    $stmt->bindParam(":residence", $residence);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":link", $link);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $conn->commit();
    $message = "true";
} catch(PDOException $e) {
    $message = "ERROR ".$e->getMessage();
    $conn->rollBack();
} catch(Exception $e) {
    $conn->rollBack();
}
$conn = null;
echo $message;
?>