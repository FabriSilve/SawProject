<?php
    require("../shared/accessManager.php");
    require("dbAccess.php");

    $message = "";
    try {
        if(!isset($_POST["username"]) || !isset($_POST["email"]) || !isset($_POST["password"])) {
            $message = "Error sending fields";
            throw new Exception();
        }

        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        if ((empty($username)) || !preg_match("/^[A-Za-z][A-Za-z0-9]{3,}$/",$username)) {
            $message = "Invalid username";
            throw new Exception();
        }

        if ((empty($email)) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Invalid email";
            throw new Exception();
        }

        if(empty($password) || !preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/", $pass_pre_hash)){ //TODO inserire controllo con espressione regolare
            $message = "Invalid password";
            throw new Exception();
        }
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $dbh = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt_acc = $dbh->prepare("INSERT INTO Admin (username, email, password) VALUES (:username, :email, :password);");

        $stmt_acc->bindParam(':username', $username);
        $stmt_acc->bindParam(':email', $email);
        $stmt_acc->bindParam(':password', $password_hash);

        $stmt_acc->execute();
        $message = "Admin was inserted successfully";
    }
    catch(PDOException $e){
        $message = "Database error, try a different username/email.";
    }
    catch(Exception $k){
    }
    $dbh = null;
    header("Location: ../pageAdminAdd.php?message=".$message);
?>



