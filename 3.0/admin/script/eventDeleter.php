<?php
require("../shared/accessManager.php");
require("dbAccess.php");

    $message = "";
    try {
        if(!isset($_POST['id']) || empty($_POST['id']) ) {
            $message = "Invalid ID";
            throw new Exception();
        }
        $id = trim($_POST['id']);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT id FROM Events WHERE id = :id;");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() !== 1) {
            $message = "Event not present in the system";
            throw new Exception();
        }

        $stmt = $conn->prepare("DELETE FROM Events WHERE id = :id;");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $conn = null;
        $message = "Event successfully deleted!";
    }
    catch(PDOException $e) {
        $message = "ERROR ".$e->getMessage();
    } catch (Exception $e) {
        header("Location: ../pageEventDelete.php?message=" . $message);
    }
header("Location: ../pageEventDelete.php?message=" . $message);
?>



