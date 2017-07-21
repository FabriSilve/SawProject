<?php
    require("dbAccess.php");

    $message = "";
    try {
        if(!isset($_POST["username"]) || !isset($_POST["email"]) || !isset($_POST["password"])) {
            $message = "errore invio campi";
            throw new Exception();
        }

        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        if ((empty($username)) || (!preg_match("/^[ -~]*$/",$username))) {
            $message = "username non valido";
            throw new Exception();
        }

        if ((empty($email))) { /*TODO (!preg_match("/[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]/",$email))) {*/
            $message = "email non valida";
            throw new Exception();
        }

        if(empty($password)){ //TODO inserire controllo con espressione regolare
            $message = "password non valida";
            throw new Exception();
        }
        $password_hash = password_hash($pass_pre_hash, PASSWORD_BCRYPT);

        $dbh = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt_acc = $dbh->prepare("INSERT INTO Admin (username, email, password) VALUES (:username, :email, :password);");

        $stmt_acc->bindParam(':username', $username);
        $stmt_acc->bindParam(':email', $email);
        $stmt_acc->bindParam(':password', $password_hash);

        $stmt_acc->execute();
    }
    catch(PDOException $e){
        $message = "Username già utilizzato <br> Error: " . $e->getMessage(); //for debug only ****TO BE REMOVED****
        header("Location: ../pageAddAdmin.php?message=".$message);
    }
    catch(Exception $k){
        header("Location: ../pageAddAdmin.php?message=".$message);
    }
    $dbh = null;  //termino la connessione.
    $message = "Admin inserito con successo";
    header("Location: ../pageAddAdmin.php?message=".$message);
?>



