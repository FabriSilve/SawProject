<?php

    require("dbAccess.php");
    $error = "";
    $username = "";
    $password = "";

    try {
        if (isset($_POST["username"]) && $_POST["username"] !== "") {
            $username = trim($_POST["username"]);
        } else {
            $error = "Username non inserito!";
            throw new Exception();
        }

        if (!preg_match("/^[ -~]*$/", $username)) {
            $error = "Username non valido";
            throw new Exception();
        }

        if (isset($_POST["email1"]) && $_POST["email1"] !== "") {
            $email = trim($_POST["email1"]);
        } else {
            $error = "Email non inserita";
             throw new Exception();
        }

        //TODO testare espressione regolare
        /*if (!preg_match("/[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]/", $email)) {
            $error = "Email non valida";
            throw new Exception();
        }*/

        if (isset($_POST["password1"]) && $_POST["password1"] !== "") {
            $pass_pre_hash = trim($_POST["password1"]);
        } else {
            $error = "Username non inserito!";
            throw new Exception();
        }

        //TODO controllare espressione regolare
        /*if (!preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/", $pass_pre_hash)) {
            $error = "Password non valida";
            throw new Exception();
        }*/

        $password = password_hash($pass_pre_hash, PASSWORD_BCRYPT);

    } catch(Exception $e) {
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
