<?php

    require("dbAccess.php");
    $message = "ERROR: Invalid username and/or password.<br>Remember that password must contain at least:<br>- 1 upper case letter<br>- 1 lower case letter<br>- 1 decimal number<br>- 1 special character<br>and must be at least 8 characters long.";

    try {
        $username = trim($_POST["username"]);
        $pass_pre_hash = trim($_POST["password1"]);

        if ((empty($username)) || (!preg_match("/^[A-Za-z][A-Za-z0-9]{3,}$/",$username))){
            $message = "username non valido";
            throw new Exception();
        }

        if(empty($pass_pre_hash)){
            $message = "Remember that password must contain at least:<br>- 1 upper case letter<br>- 1 lower case letter<br>- 1 decimal number<br>- 1 special character<br>and must be at least 8 characters long.";
            throw new Exception();
        }

        if (!preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/", $pass_pre_hash)){
            throw new Exception();
        }
        $password = password_hash($pass_pre_hash, PASSWORD_BCRYPT);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO Users (username, password) VALUES (:username, :password);");

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        //libsodium extension from paragon.
        /*$password = \Sodium\crypto_pwhash_str(
                                                $pass_pre_hash,
                                                \Sodium\CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
                                                \Sodium\CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
                                                );*/

        $stmt->execute();

        $conn = null;

        if(isset($_COOKIE['EAusername'])) {
            setcookie('EAusername',null);
        }
        session_unset();
        session_destroy();
        session_start();
        $_SESSION["EAusername"] = $username;
        header("Location: ../pageRegisterProfile.php");

    }
    catch(PDOException $e){
        $conn = null;
        $message = "An ERROR has occured, retry.";
        header("Location: ../pageRegistration.php?message=".$message);
    } catch(Exception $e) {
        $conn = null;
        header("Location: ../pageRegistration.php?message=".$message);
    }
?>
