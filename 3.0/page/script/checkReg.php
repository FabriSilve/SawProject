<?php

    require("dbAccess.php");
    $error = "";
    $username = "";
    $password = "";

    try {
        $username = trim($_POST["username"]);
        $pass_pre_hash = trim($_POST["password1"]);

        if ((empty($username)) || (!preg_match("/^[ -~]*$/",$username))) {
            throw new Exception();
        }

        if(empty($pass_pre_hash)){
            throw new Exception();
        }
        //TODO controllare espressione regolare
        /*if (!preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/", $pass_pre_hash)) {
            $error = "Password non valida";
            throw new Exception();
        }*/

        $password = password_hash($pass_pre_hash, PASSWORD_BCRYPT);

    } catch(Exception $e) {
        $error = "Username or password error.";
        header("Location: ../pageRegistration.php?registerError=".$error);
    }
    try{
        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO Users (username, password) VALUES (:username, :password);");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        $conn = null;

        if(isset($_COOKIE['EAkeep'])) {
            setcookie('EAkeep',null);
        }
        if(isset($_COOKIE['EAusername'])) {
            setcookie('EAusername',null);
        }
        session_unset();
        session_destroy();
        session_start();
        $_SESSION["EAauthorized"] = 1;
        $_SESSION["EAusername"] = $username;
        header("Location: ../pageHomepage.php");

    }
    catch(PDOException $e){
        $error=  "Error: " . $e->getMessage(); //for debug only ****TO BE REMOVED****
        header("Location: ../pageRegistration.php?registerError=".$error);
    }
?>
