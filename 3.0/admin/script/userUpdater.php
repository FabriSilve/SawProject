<?php
require("dbAccess.php");
//TODO trasformare in script


if(isset($_POST['oldUsername']) && isset($_POST['newUsername']) && isset($_POST['email']) && isset($_POST['password'])) {
    $oldUsername = trim($_POST['oldUsername']);
    $newUsername = trim($_POST['newUsername']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
} else {
    header("Location: formUpdateUser.php");
}

try {
        if ((empty($oldUsername)) || (!preg_match("/^[ -~]*$/",$oldUsername))) {
            $userErr = "Username error";
            echo "username";
            throw new Exception();
        }

        if ((empty($newUsername)) || (!preg_match("/^[ -~]*$/",$newUsername))) {
            $userErr = "Username error";
            echo "username";
            throw new Exception();
        }

        $email = trim($_POST['email']); //TODO aggiungere controllo mail con espressione regolare
        if ((empty($email))) {
            $emailErr = "email error";
            echo "email";
            throw new Exception();
        }

        $pass_pre_hash = trim($_POST['password']); //TODO controllare con espressione regolare
        if(empty($pass_pre_hash)){
            $passErr = "Password is required";
            echo "pass empty";
            throw new Exception();
        }
        $password = password_hash($pass_pre_hash, PASSWORD_BCRYPT);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $oldUsername, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt -> rowCount() !== 1) {
            //TODO utente non presente
            throw new Exception();
        }

        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $newUsername, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt -> rowCount() > 0) {
            //TODO nuovo username già utilizzato
            throw new Exception();
        }


        $stmt = $conn->prepare("UPDATE Users 
                                          SET username = :newUsername, email = :email,password = :password
                                          WHERE username = :oldUsername;");
        $stmt->bindParam(':newUsername', $newUsername);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':oldUsername', $oldUsername);

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

    //TODO trasformare risposta positiva in messaggio mandato alla pagina chiamante
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="../pageDashboard.php"> Torna indietro</a></p>
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

