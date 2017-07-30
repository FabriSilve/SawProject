<?php
	require("dbAccess.php");
	$keep = 0;
	$username = "";
	$password = "";

    $keep = !empty($_POST['keepme']) ? $_POST['keepme'] : 'no';
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

        $stmt = $conn->prepare("SELECT password, banned FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() !== 1) {
            $error = "Error: Invalid credentials";
            throw new Exception();
        }
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result["banned"] == 1){
            $error = "You are banned! please contact the admin.";
            throw new Exception();
        }


        if(password_verify($password, $result["password"])) {
            session_start();
            $_SESSION["EAauthorized"] = 1;
            $_SESSION["EAusername"] = $username;
            if ($keep === "keep") {
                $cookie_username = "EAusernameC";
                /*$cookie_keep = "EAkeepC";
                setcookie($cookie_keep, $keep, time() + 86400, "/");*/
                setcookie($cookie_username, $username, time() + 86400, "/");
            }
            header("Location: ../pageHomepage.php");
        } else {
            $error = "Error: Invalid credentials";
            throw new Exception();
        }

    }catch(PDOException $e){
	    $error = "An error has occurred, please try again";
        header ("Location: ../pageLogin.php?message=".$error);
	}
	catch(Exception $f){

        header("Location: ../pageLogin.php?message=".$error);
	}
	$conn = null;   

?>
