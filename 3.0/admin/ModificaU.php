<?php
require("header.php");
require("Access.php");

if(isset($_POST['username'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
}

try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        if(empty($username)){
            $userErr = "Username error";
            echo "username";
            throw new Exception();
        }

        $stmt = $conn->prepare("UPDATE Users 
                                          SET username = :username, email = :email,password = :password
                                          WHERE username = :username;");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        $username = trim($_POST['username']);

        if ((empty($username)) || (!preg_match("/^[ -~]*$/",$username))) {
            $userErr = "Username error";
            echo "username";
            throw new Exception();
        }

        $email = trim($_POST['email']);
        if ((empty($email))) {
            $emailErr = "email error";
            echo "email";
            throw new Exception();
        }

        $pass_pre_hash = trim($_POST['password']);
        if(empty($pass_pre_hash)){
            $passErr = "Password is required";
            echo "pass empty";
            throw new Exception();
        }
        $password = password_hash($pass_pre_hash, PASSWORD_BCRYPT);
        $stmt->execute();

    }
    catch(PDOException $e){
        $dbh->rollback();
        echo "Error: " . $e->getMessage();
        echo '<h2> Si è verificato un errore. <h2>';
    }

    catch(Exception $k){
        $dbh->rollback();
        if (isset($userErr))
            echo $userErr;
        if (isset($passErr))
            echo $passErr;
        if (isset($profileErr))
            echo $profileErr;
        echo "expeption";
    }
$dbh = null;

?>


<!DOCTYPE html>
<html lang="it">
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="admin.php"> Torna indietro</a></p>
        </div>
        <div class="col-sm-8 text-left">
            <h1><b>Modifica i dati utente:</b></h1>
            <p></p>
            <div class="well">
                <p>I dati stati modificati con successo!</p>
            </div>
            <hr>
        </div>
    </div>
</div>

</html>

