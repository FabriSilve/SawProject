<?php
    require("shared/accessManager.php");
    require("script/dbAccess.php");

    $message = "";
    $usernameGet = "";
    try {

        $oldUsername = trim($_POST["oldUsername"]);
        $newUsername = trim($_POST["newUsername"]);
        /*$email = trim($_POST["email"]);
        $password = trim($_POST["password"]);*/


        if (empty($newUsername) || (!preg_match("/^[A-Za-z][A-Za-z0-9]{3,}$/",$newUsername))) {
            $message = "New username is invalid<br>characters admitted:<br>- upper case<br>- lower case<br> decimal numbers.";
            throw new Exception();
        }

        //TODO aggiungere controllo mail con espressione regolare
       /* if (empty($email) || (!preg_match("/[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]/", $email))) {
            $message = "Invalid email";
            throw new Exception();
        }*/

        //TODO controllare con espressione regolare
  /*      if(empty($password)){
            $message = "Password non valida";
            throw new Exception();
        }
        $password = password_hash($password, PASSWORD_BCRYPT);*/
    } catch (Exception $e) {
        echo $message;
    }
    try {



        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("UPDATE Users SET username = :newUsername
                                                WHERE username = :oldUsername");

        $stmt->bindParam(":oldUsername", $oldUsername);
        $stmt->bindParam("newUsername", $newUsername);
        $stmt->execute();
        $conn = null;
    }
    catch (PDOException $e){
        $conn->rollBack();
        echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
    }

    ?>