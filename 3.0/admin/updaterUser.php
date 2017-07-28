<?php
/*
    require("shared/accessManager.php");
    require("script/dbAccess.php");

    $message = "";

    $oldUsername = trim($_POST["oldUsername"]);
    $newUsername = trim($_POST["newUsername"]);
    $oldEmail = trim($_POST["oldEmail"]);
    $newEmail = trim($_POST["newEmail"]);
    $oldPassword = trim($_POST["oldPassword"]);
    $newPassword = trim($_POST["newPassword"]);

    try {

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();


        if (!empty($oldUsername)) {
            if (empty($newUsername) || (!preg_match("/^[A-Za-z][A-Za-z0-9]{3,}$/", $newUsername))) {
                $message = "New username is invalid<br>characters admitted:<br>- upper case<br>- lower case<br> decimal numbers.";
                throw new Exception();
            }
            else {
                $stmt = $conn->prepare("UPDATE Users SET username = :newUsername
                                                WHERE username = :oldUsername");
                $stmt->bindParam(":oldUsername", $oldUsername);
                $stmt->bindParam("newUsername", $newUsername);
                $stmt->execute();
            }
        }

        if (!empty($oldEmail)) {
            if (empty($newEmail) || (!preg_match("/[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]/", $newEmail))) {
                $message = "Invalid email";
                throw new Exception();
            }
            else{
                $stmt = $conn->prepare("UPDATE Profiles SET email = :newEmail
                                                WHERE email = :oldEmail");
                $stmt->bindParam(":oldEmail", $oldEmail);
                $stmt->bindParam("newEmail", $newEmail);
                $stmt->execute();
            }

        }

        if(!empty($oldPassword)){
            $message = "Password non valida";
            throw new Exception();
        }
        $password = password_hash($password, PASSWORD_BCRYPT);


        $conn = null;
    }
    catch (PDOException $e){
        $conn->rollBack();
        echo "DataBase Error: The user could not be added.<br>".$e->getMessage(); //TODO remove for release
    }
    catch (Exception $e1){
        echo $message;
    }*/

    ?>