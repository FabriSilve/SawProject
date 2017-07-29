<?php
    require("../shared/accessManager.php");
    require("dbAccess.php");

    $message = "";
    try{
        if(!isset($_POST["username"]) || empty($_POST["username"])) {
            $message="Invalid username";
            throw new Exception();
        }
        $username = trim($_POST["username"]);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        if($stmt->rowCount() !== 1) {
            $message = "User not found";
            throw new Exception();
        }

        $stmt = $conn->prepare("UPDATE Users SET  banned=1 WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $conn->commit();
        $message = "User succesfully banned";
    }
    catch(PDOException $e) {
        $conn->rollBack();
        $message = "Database error";
    } catch (Exception $e) {
        $conn->rollBack();
    }
    $conn = null;
    header("Location: ../pageUserBan.php?message=".$message);
?>
