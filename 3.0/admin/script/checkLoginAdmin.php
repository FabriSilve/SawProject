<?php
	require("dbAccess.php");
	$username = "";
	$password = "";

	$message = "";

	try {
        if (isset($_POST["username"])) {
            if ($_POST["username"] !== "" ) {
                $username = trim($_POST["username"]);
            } else {
                $message="Username vuoto";
                throw new Exception();
            }
        } else {
            $message="Username non inserito";
            throw new Exception();
        }

        if (isset($_POST["password"])) {
            if ($_POST["password"] !== "") {
                $password = trim($_POST["password"]);
            } else {
                $message="Password vuota";
                throw new Exception();
            }
        } else {
            $message="Password non inserita";
            throw new Exception();
        }

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT password FROM Admin WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $result['password'])) {
            session_start();

            $_SESSION["EAadmin"] = 1;
            header("Location: ../index.php");  //automatically redirect to homepage on login success.

        } else {
            $message = "Credenziali non valide";
            throw new Exception();
        }

    }catch(PDOException $e){
	    $message = "Errore Database!"."Error: " . $e->getMessage(); //TODO rimuovere errore in release
        header ("Location: ../index.php?message=".$message);
    }
    catch(Exception $f){
        header("Location: ../index.php?message=".$message);
    }
	$conn = null;

?>
