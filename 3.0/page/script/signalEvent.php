<?php
    require("accessControl.php");
    require("dbAccess.php");

    $id = "";
    $username = "";
    $message = "";

    try {
        if (!isset($_GET['id']) || empty(trim($_GET['id']))) {
            $message="id non valido";
            throw new Exception();
        }
        $id = $_GET["id"];

        if (!isset($_GET['username']) || empty(trim($_GET['username']))) {
            $message="username non valido";
            throw new Exception();
        }
        $username = $_GET['username' ];

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT id FROM Events WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount() === 0) {
            $message = "Event not found";
            throw new Exception();
        }
        if ($stmt->rowCount() > 1) {
            $message = "More than one found";
            throw new Exception();
        }

        $stmt = $conn->prepare("SELECT * FROM Signaled WHERE id = :id AND username = :username");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            $stmt = $conn->prepare("INSERT INTO Signaled ( id, username) VALUES ( :id, :username)");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
        }
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