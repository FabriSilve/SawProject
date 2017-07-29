<?php
require("../shared/accessManager.php");
require("dbAccess.php");

$message = "";
try {
    if (!isset($_POST["newEmail"]) && !isset($_POST["newUsername"]) && !isset($_POST["newPassword"])){
        $message = "No fields were changed.";
        throw new Exception();
    }
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $newUsername = trim($_POST['newUsername']);
    $newEmail = trim($_POST['newEmail']);
    $newPassword = trim($_POST["newPassword"]);

    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();

    if(!empty($newUsername)){
        if (preg_match("/^[A-Za-z][A-Za-z0-9]{3,}$/", $newUsername)) {
            $stmt = $conn->prepare("UPDATE Users SET  username = :newUsername WHERE username = :username");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":newUsername", $newUsername);
            $stmt->execute();

            $stmt = $conn->prepare("UPDATE Profiles SET  username = :newUsername WHERE username = :username");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":newUsername", $newUsername);
            $stmt->execute();
        }
        else{
            $message = "New username is invalid";
            throw new Exception();
        }
    }

    if(!empty($newEmail)) {
        if (filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            if (empty($newUsername)) {//TODO controllare presenza mail da sistema
                $stmt = $conn->prepare("UPDATE Profiles SET email = :newEmail WHERE username = :username");
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":newEmail", $newEmail);
                $stmt->execute();
            } else {
                $stmt = $conn->prepare("UPDATE Profiles SET email = :newEmail WHERE username = :newUsername");
                $stmt->bindParam(":newUsername", $newUsername);
                $stmt->bindParam(":newEmail", $newEmail);
                $stmt->execute();
            }
        } else {
            $message = "New email is invalid";
            throw new Exception();
        }
    }

    if(!empty($newPassword)){ //TODO AGGIORNARE STATEMENTS TO UPDATE
        $newPassword_hash = password_hash($newPassword, PASSWORD_BCRYPT);
        if (preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/", $newPassword)) {
            if (empty($newUsername)) {
                $stmt = $conn->prepare("UPDATE Users SET password = :newPassword_hash WHERE username = :username");
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":newPassword_hash", $newPassword_hash);
                $stmt->execute();

            } else {
                $stmt = $conn->prepare("UPDATE Users SET password = :newPassword_hash WHERE username = :newUsername");
                $stmt->bindParam(":newUsername", $newUsername);
                $stmt->bindParam(":newPassword_hash", $newPassword_hash);
                $stmt->execute();
            }
        }else{
            $message = "New password is invalid";
            throw new Exception();
        }
    }

    $conn->commit();

} catch (PDOException $e) {
    $conn->rollBack();
    $message = "Error in database";
} catch (Exception $e) {
    $conn->rollBack();
}
$conn = null;
$message = "User successfully modified";
header("Location: ../pageUserUpdate.php?message=" . $message);
?>