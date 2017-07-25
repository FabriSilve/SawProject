<?php

require("dbAccess.php");

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO Users (username, password) VALUES (:username, :password);");

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    $username = trim($_POST["username"]);
    $pass_pre_hash = trim($_POST["password1"]);

    if ((empty($username)) || (!preg_match("/^[ -~]*$/",$username))){
        throw new Exception();
    }

    if(empty($pass_pre_hash)){
        throw new Exception();
    }

    if (!preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/", $pass_pre_hash)){
        throw new Exception();
    }
    $password = password_hash($pass_pre_hash, PASSWORD_BCRYPT);
    //libsodium extension from paragon.
    /*$password = \Sodium\crypto_pwhash_str(
                                            $pass_pre_hash,
                                            \Sodium\CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
                                            \Sodium\CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
                                            );*/

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
    $conn = null;
    //$error =  "Error: " . $e->getMessage(); //for debug only ****TO BE REMOVED****
    $error = "k";
    header("Location: ../pageRegistration.php?registerError=".$error);
}
catch(Exception $e) {
    $conn = null;
    $error = "error";
    header("Location: ../pageRegistration.php?registerError=".$error);
}
?>
