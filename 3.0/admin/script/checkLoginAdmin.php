<?php
    require("../shared/accessManager.php");
	require("dbAccess.php");

	$message = "";
	try {

        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        if (empty(trim($_POST["username"])) || empty(trim($_POST["password"]))) {
            $message = "Invalid username and/or password";
            throw new Exception();
        }

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT password FROM Admin WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password, $result["password"])) {
            session_start();
            $_SESSION["EAadmin"] = 1;
            header("Location: ../pageDashboard.php");

        } else {
            $message = "Invalid credentials";
            throw new Exception();
        }
        $conn = null;

    }catch(PDOException $e){
        $message = "Database error";
        header("Location: ../index.php?message=".$message);
    }
    catch(Exception $f){
        header("Location: ../index.php?message=".$message);
    }
?>
