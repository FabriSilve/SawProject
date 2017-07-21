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
        if (isset($_POST["username"])) {
            if ($_POST["username"] !== "" ) {
                $username = trim($_POST["username"]);
            } else {
                $error="Username vuoto";
                throw new Exception();
            }
        } else {
            $error="Username non inserito";
            throw new Exception();
        }

        if (isset($_POST["password"])) {
            if ($_POST["password"] !== "") {
                $password = trim($_POST["password"]);
            } else {
                $error="Password vuota";
                throw new Exception();
            }
        } else {
            $error="Password non inserita";
            throw new Exception();
        }
    } catch(Exception $e) {
        header("Location: ../page/pageLogin.php?loginError=".$error);
	}

	try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT password FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $result['password'])) {
            session_start();
            $_SESSION["EAauthorized"] = 1;
            $_SESSION["EAusername"] = $username;
            if ($keep == 1) {
                setcookie('EAkeep', 'true', time() + 86400);
                setcookie("EAusername", $username, time() + 86400);
            }
            header("Location: ../page/pageHomepage.php");  //automatically redirect to homepage on login success.
        } else {
            $error = "Credenziali non valide";
            throw new Exception();
        }

    }catch(PDOException $e){
        header ("Location: ../page/pageLogin.php?loginErr="."Error: " . $e->getMessage());
	}
	catch(Exception $f){
        header("Location: ../page/pageLogin.php?loginError=".$error);
	}
	$conn = null;

?>
