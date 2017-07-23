<?php
    require("../shared/accessManager.php");
	require("dbAccess.php");
	$username = "";
	$password = "";

	$message = "";
	try {
        if (!isset($_POST["username"]) || empty(trim($_POST["username"]))) {
            $message="Username non valido";
            throw new Exception();
        }
        $username = trim($_POST["username"]);

        if (!isset($_POST["password"]) || empty(trim($_POST["password"]))) {
            $message="Password non valida";
            throw new Exception();
        }
        $password = trim($_POST["password"]);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT password FROM Admin WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password, $result['password'])) {
            session_start();
            $_SESSION["EAadmin"] = 1;
            header("Location: ../pageDashboard.php");

        } else {
            $message = "Credenziali non valide";
            throw new Exception();
        }
        $conn = null;

    }catch(PDOException $e){
	    $message = "Errore Database!"."Error: " . $e->getMessage(); //TODO rimuovere errore in release
        header("Location: ../index.php?message=".$message);
    }
    catch(Exception $f){
        header("Location: ../index.php?message=".$message);
    }


?>
