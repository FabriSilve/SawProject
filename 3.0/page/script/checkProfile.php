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
        $username = trim($_SESSION["EAusername"]);

        $email1 = trim($_POST['email1']);
        $email2 = trim($_POST['email2']);
        if (empty($email1) || !filter_var($email1, FILTER_VALIDATE_EMAIL)) {
            $message = "email non valida";
            throw new Exception();
        }
        if ($email1 !== $email2) {
            $message = "emails are different";
            throw new Exception();
        }

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
            if (!filter_var($link, FILTER_VALIDATE_URL)) {
                $message = "Link format is invalid.";
                throw new Exception();
            }
        }

        if (!empty($_POST['description'])) {
            $description = trim($_POST['description']);
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
            $message = "User not found";
            throw new Exception();
        }

        $stmt = $conn->prepare("SELECT * FROM Profiles WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if($stmt->rowCount() !== 0) {
            $message = "Profile is already in use";
            throw new Exception();
        }

        $stmt = $conn->prepare("SELECT * FROM Profiles WHERE email = :email");
        $stmt->bindParam(":email", $email1);
        $stmt->execute();

        if($stmt->rowCount() !== 0) {
            $message = "email already in use";
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
        $message = "An ERROR has occurred, try again. If this error persists, contact the administrator.";
        header("Location: ../pageRegisterProfile.php?message=".$message);
    }
    catch(Exception $e) {
        $conn->rollBack();
        header("Location: ../pageRegisterProfile.php?message=".$message);
    }
    $conn = null;
?>
