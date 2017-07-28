<?php
require("../shared/accessManager.php");
require("dbAccess.php");

$message = "";
try {
    if (!isset($_POST["newEmail"]) || !isset($_POST["newUsername"]) || !isset($_POST["newPassword"])){
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

    /*$stmt = $conn->prepare("SELECT username, email FROM Users NATURAL JOIN Profiles WHERE username = :username;");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        $message = "User is not present in the system";
        throw new Exception();
    }*/

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

    if(!empty($newPassword)){
        $newPassword_hash = password_hash($newPassword, PASSWORD_BCRYPT);
        if (preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/", $newPassword)) {
            if (empty($newUsername)) {
                $stmt = $conn->prepare("DELETE FROM Users WHERE username = :username");
                $stmt->bindParam(":username", $username);
                $stmt->execute();

                $stmt = $conn->prepare("INSERT INTO Users (username, password) VALUES (:username, :newPassword);");
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":newPassword", $newPassword_hash);
            } else {
                $stmt = $conn->prepare("DELETE FROM Users WHERE username = newUsername");
                $stmt->bindParam(":newUsername", $newUsername);
                $stmt->execute();

                $stmt = $conn->prepare("INSERT INTO Users (username, password) VALUES (:newUsername, :newPassword);");
                $stmt->bindParam(":newUsername", $newUsername);
                $stmt->bindParam(":newPassword", $newPassword_hash);
                $stmt->execute();
            }
        }else{
            $message = "New password is invalid";
            throw new Exception();
        }
    }

    $conn->commit();
    $message = "User was successfully modified";

} catch (PDOException $e) {
    $conn->rollBack();
    $message = "Error in database" . " ERROR " . $e->getMessage(); //TODO rimuovere in release
} catch (Exception $e) {
    $conn->rollBack();
}
$conn = null;
header("Location: ../pageUpdateUser.php?message=" . $message);

?>
