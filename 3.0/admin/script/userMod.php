<?php
require("../shared/accessManager.php");
require("dbAccess.php");

$message = "";
try {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $newUsername = trim($_POST['newUsername']);
    $newEmail = trim($_POST['newEmail']);

    /*if(!empty($username)){
        if(empty(new
    }*/

    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();

    $stmt = $conn->prepare("SELECT username, email FROM Users NATURAL JOIN Profiles WHERE username = :username;");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        $message = "User is not present in the system";
        throw new Exception();
    }

    $stmt = $conn->prepare("UPDATE Users SET  username = :newUsername WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(":newUsername", $newUsername);
    $stmt->execute();

    $stmt = $conn->prepare("UPDATE Profiles SET  username = :newUsername WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(":newUsername", $newUsername);
    $stmt->execute();

    $stmt = $conn->prepare("UPDATE Profiles SET  email = :newEmail WHERE username = :newUsername");
    $stmt->bindParam(':newUsername', $newUsername);
    $stmt->bindParam(":newEmail", $newEmail);
    $stmt->execute();

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
