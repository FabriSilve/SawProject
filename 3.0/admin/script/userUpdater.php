<?php
    require("dbAccess.php");

    $message = "";
    try {
        if(!isset($_POST['oldUsername']) || !isset($_POST['newUsername']) || !isset($_POST['email']) || !isset($_POST['password'])) {
            $message = "Mancano dei campi";
            throw new Exception();
        }
        $oldUsername = trim($_POST['oldUsername']);
        $newUsername = trim($_POST['newUsername']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if ((empty($oldUsername)) || (!preg_match("/^[ -~]*$/",$oldUsername))) {
            $message = "Vecchio username non valido";
            throw new Exception();
        }

        if ((empty($newUsername)) || (!preg_match("/^[ -~]*$/",$newUsername))) {
            $message = "Nuovo username non valido";
            throw new Exception();
        }

        //TODO aggiungere controllo mail con espressione regolare
        if ((empty($email))) {
            $message = "email non valida";
            throw new Exception();
        }

        //TODO controllare con espressione regolare
        if(empty($password)){
            $message = "Password non valida";
            throw new Exception();
        }
        $password_crypt = password_hash($password, PASSWORD_BCRYPT);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $oldUsername, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt -> rowCount() !== 1) {
            $message = "Utente non presente";
            throw new Exception();
        }

        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $newUsername, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt -> rowCount() > 0) {
            $message = "Nuovo username già utilizzato";
            throw new Exception();
        }


        $stmt = $conn->prepare("UPDATE Users SET username = :newUsername, email = :email,password = :password WHERE username = :oldUsername;");
        $stmt->bindParam(':newUsername', $newUsername);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':oldUsername', $oldUsername);

        $stmt->execute();
        $conn->commit();
        $message = "Modifica eseguita con successo";
        header("Location: ../pageUpdateUser.php?message=".$message);
    }
    catch(PDOException $e){
        $dbh->rollback();
        $message = "Si è verificato un errore."." Error: " . $e->getMessage(); //TODO rimuovere in release
        header("Location: ../pageUpdateUserForm.php?message=".$message);
    } catch(Exception $k){
        $dbh->rollback();
        header("Location: ../pageUpdateUserForm.php?message=".$message);
    }
    $dbh = null;
?>


