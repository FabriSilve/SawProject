<?php
    require("accessControl.php");
    require("dbAccess.php");
    $id = "";
    $username = "";
    $message = "";
    try {
        if (empty(trim($_GET['id']))) {
            $message="id not valid";
            throw new Exception();
        }
        $id = $_GET["id"];

        if (empty(trim($_SESSION['EAusername']))) {
            $message="username not valid";
            throw new Exception();
        }
        $username = $_SESSION['EAusername' ];


        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare("UPDATE Messages SET readed = 1 WHERE id = :id AND receiver = :username");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        echo "true";
        $conn = null;
    } catch(PDOException $e) {
        echo "ERROR ".$e->getMessage();
    } catch(Exception $e) {
        echo $message;
    }
?>