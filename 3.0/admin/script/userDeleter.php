<?php
require("../shared/accessManager.php");
require("dbAccess.php");
    $conn = null;
    $message = "";
    try {
        if(!isset($_POST['username']) || empty($_POST['username'])) {
            $message = "Username mancante";
            throw new Exception();
        }
        $username = trim($_POST['username']);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT username FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() !== 1) {
            $message = "Utente non presente";
            throw new Exception();
        }

        $stmt = $conn->prepare("DELETE FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $conn->commit();
        $conn = null;
        $message = "User was deleted successfully";

    }
    catch(PDOException $e) {
        $conn->rollBack();
        $message = "Error in database" . " ERROR " . $e->getMessage(); //TODO rimuovere in release
    } catch (Exception $e) {
        $conn->rollBack();
        header("Location: ../pageDeleteUser.php?message=" . $message);
    }
header("Location: ../pageDeleteUser.php?message=" . $message);
?>

