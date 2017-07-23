<?php
    require("dbAccess.php");
    $error = "";
    $username = "";
    $email = "";
    $password = "";

    try {
        if (isset($_POST["username"]) && !empty($_POST["username"])) {
            $username = trim($_POST["username"]);
        } else {
            $error = "Username non inserito!";
            throw new Exception();
        }
        if (!preg_match("/^[ -~]*$/", $username)) {
            $error = "Username non valido";
            throw new Exception();
        }

        if (isset($_POST["email1"]) && !empty($_POST["email1"])) {
            $email = trim($_POST["email1"]);
        } else {
            $error = "Email non inserita";
            throw new Exception();
        }

        /*if (!preg_match("/[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]/", $email)) {
            $error = "Email non valida";
            throw new Exception();
        }*/

        if (isset($_POST["password1"]) && !empty($_POST["password1"])) {
            $pass_pre_hash = trim($_POST["password1"]);
        } else {
            $error = "Username non inserito!";
            throw new Exception();
        }

        /*if (!preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/", $password)){
            $error = "La password deve contenere 8 blabla"; //TODO inserire commento corretto
            throw new Exception();
        }*/
        $password = password_hash($password, PASSWORD_BCRYPT);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO Users (username, email, password) VALUES (:username, :email, :password);");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
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
        $error=  "Error: " . $e->getMessage(); //TODO rimuovere in release
        header("Location: ../pageRegistration.php?registerError=".$error);
    } catch(Exception $e) {
        header("Location: ../pageRegistration.php?registerError=".$error);
    }
?>
