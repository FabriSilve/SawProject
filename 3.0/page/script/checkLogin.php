<?php
	require("dbAccess.php");
	$keep = 0;
	$username = "";
	$password = "";


	if(isset($_POST["keepme"])) {
        $keep = $_POST["keepme"];
    } else {
        $keep = 0;
    }
	try {
        if (!isset($_POST["username"]) || empty(trim($_POST["username"]))) {
            throw new Exception();
        }
        $username = trim($_POST["username"]);

        if (!isset($_POST["password"]) || empty(trim($_POST["password"]))) {
            throw new Exception();
        }
        $password = trim($_POST["password"]);

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT password FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() == 0) {
            throw new Exception();
        }
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        //TODO non setta ne session ne coockie
        if(password_verify($password, $result["password"])) {
            session_start();
            $_SESSION["EAauthorized"] = 1;
            $_SESSION["EAusername"] = $username;
            if ($keep == 1) {
                setcookie('EAkeep', 'true', time() + 86400);
                setcookie("EAusername", $username, time() + 86400);
            }
            header("Location: ../pageHomepage.php");
        } else {
            throw new Exception();
        }

    }catch(PDOException $e){
        $error = "Error: an error has occured. Try again.";
        header ("Location: ../pageLogin.php?message=".$error);

        header ("Location: ../pageLogin.php?message="."Error: " . $e->getMessage());
	}
	catch(Exception $f){
        $error = "Error: Invalid credentials.";
        header("Location: ../pageLogin.php?message=".$error);
	}
	$conn = null;   

?>
