<?php

    if(session_status() !== PHP_SESSION_ACTIVE ) {
        session_start();
    }
    if(!isset($_SESSION["EAusername"]) || empty($_SESSION["EAusername"])) {
        header("Location: ../../");
    }
    require("dbAccess.php");

    $message = "";
    $username = "";
    $email1 = "";
    $email2 = "";

    $name = "";
    $surname = "";
    $residence = "";
    $link = "";
    $description = "";

    try {
        if (empty(trim($_SESSION['EAusername']))) {
            $message = "username non valido";
            throw new Exception();
        }
        $username = $_SESSION["EAusername"];

        if (empty(trim($_POST['email1']))) {
            $message = "email_1 non valida";
            throw new Exception();
        }
        $email1 = $_POST['email1'];

        if (empty(trim($_POST['email2']))) {
            $message = "email_2 non valida";
            throw new Exception();
        }
        $email2 = $_POST['email2'];

        /*TODO controllo mail da controllare
        if (!preg_match("/[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]/", $email1) || ($email1 !== $email2)) {
            $error = "Email non valida";
            throw new Exception();
        }*/

        if (!empty($_POST['name'])) {
            $name = trim($_POST['name']);
        }

        if (!empty($_POST['surname'])) {
            $surname = trim($_POST['surname']);
        }

        if (!empty($_POST['residence'])) {
            $residence = trim($_POST['residence']);
        }

        if (!empty($_POST['link'])) {
            $link = trim($_POST['link']);
            if (!filter_var($link, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED)) {
                $error = "Link format is invalid.";
                throw new Exception();
            }
        }

        if (!empty($_POST['description'])) {
            $description = $_POST['description'];
        }

    } catch(Exception $e) {
        header("Location: ../pageRegisterProfile.php?message=".$message);
        die();
    }

    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if($stmt->rowCount() !== 1) {
            $message = "Utente non trovato";
            throw new Exception();
        }

        $stmt = $conn->prepare("SELECT * FROM Profiles WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if($stmt->rowCount() !== 0) {
            $message = "Profilo già presente";
            throw new Exception();
        }

        $stmt = $conn->prepare("SELECT * FROM Profiles WHERE email = :email");
        $stmt->bindParam(":email", $email1);
        $stmt->execute();

        if($stmt->rowCount() !== 0) {
            $message = "email gia utilizzata nel sistema";
            throw new Exception();
        }

        $stmt = $conn->prepare("INSERT INTO Profiles (username, name, surname, email, residence, link, description) VALUES (:username, :name, :surname, :email, :residence, :link, :description);");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email1);
        $stmt->bindParam(':residence', $residence);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':description', $description);

        $stmt->execute();

        $conn->commit();

        session_start();
        $_SESSION["EAauthorized"] = 1;
        $_SESSION["EAusername"] = $username;

        header("Location: ../pageMyProfile.php");

    }
    catch(PDOException $e){
        $conn->rollBack();
        $message = "Errore database, contatta admin"." Error: " . $e->getMessage(); //TODO for debug only ****TO BE REMOVED****
        header("Location: ../pageRegisterProfile.php?message=".$message);
    }
    catch(Exception $e) {
        $conn->rollBack();
        header("Location: ../pageRegisterProfile.php?message=".$message);
    }
    $conn = null;
?>
