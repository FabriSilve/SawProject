<?php
    require("accessControl.php");
    require("dbAccess.php");

    $username = "";
    $name = "";
    $surname = "";
    $residence = "";
    $description = "";
    $link = "";

    $message = "";

    try {
        if (empty(trim($_SESSION['EAusername']))) {
            $message = "username not valid";
            echo $message;
            exit;
        }
        $username = trim($_SESSION['EAusername' ]);

        if (!empty(trim($_POST['name']))) {
            $name = trim($_POST['name']);
        }

        if (!empty(trim($_POST['surname']))) {
            $surname = trim($_POST['surname']);
        }

        if (!empty(trim($_POST['residence']))) {
            $residence = trim($_POST['residence']);
        }

        if (!empty(trim($_POST['description']))) {
            $description = trim($_POST['description']);
        }

        if (!empty(trim($_POST['link']))) {
            if (filter_var(trim($_POST['link']), FILTER_VALIDATE_URL)) {
                $link = trim($_POST['link']);
            }
        }


        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT username FROM Profiles WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        if ($stmt->rowCount() !== 1) {
            $message = "Username not found";
            throw new Exception();
        }

        $stmt = $conn->prepare("UPDATE Profiles SET name = :name, surname = :surname, residence = :residence, description = :description, link = :link WHERE username = :username");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":residence", $residence);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":link", $link);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $conn->commit();
        $message = "true";
    } catch(PDOException $e) {
        $message = "ERROR ".$e->getMessage();
        $conn->rollBack();
    } catch(Exception $e) {
        $conn->rollBack();
    }
    $conn = null;
    header("location: ../pageMyProfile.php?message=".$message);
?>