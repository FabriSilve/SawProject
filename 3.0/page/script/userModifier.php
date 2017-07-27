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
        $message="username non valido";
        throw new Exception();
    }
    $username = $_GET['username' ];

    if (!empty(trim($_GET['name']))) {
        $message="name non valido";
        throw new Exception();
    }
    $id = $_GET["id"];

    if (!isset($_GET['description']) || empty(trim($_GET['description']))) {
        $message="descrizione non valida";
        throw new Exception();
    }
    $description = $_GET["description"];

    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();

    $stmt = $conn->prepare("SELECT username FROM Users WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    if ($stmt->rowCount() !== 1) {
        $message = "Username not found";
        throw new Exception();
    }

    $stmt = $conn->prepare("SELECT * FROM Events WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    if ($stmt->rowCount() !== 1) {
        $message = "Event not found";
        throw new Exception();
    }


    $stmt = $conn->prepare("UPDATE Events SET description = :description WHERE id = :id AND owner = :owner");
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":owner", $username);
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