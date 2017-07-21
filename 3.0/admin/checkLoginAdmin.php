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
    } catch(Exception $e) {
        header("Location: ../page/pageLogin.php?loginError=".$message);
    }

	try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT password FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['password'] = password_hash($password, PASSWORD_BCRYPT)) {
            session_start();

            if ($_SESSION['type'] == 'admin') require("../admin/Checkadmin.php"); //QUI!!!!!!!!!!!!!!
            //TODO FABER: non capisco cosa serva questo if

            else {
                $_SESSION["EAauthorized"] = 1;
                $_SESSION["EAusername"] = $username;
                if ($keep == 1) {
                    setcookie('EAkeep', 'true', time() + 86400);
                    setcookie("EAusername", $username, time() + 86400);
                }
                header("Location: ../page/pageHomepage.php");  //automatically redirect to homepage on login success.
            }
        } else {
            $message = "Credenziali non valide";
            throw new Exception();
        }

    }catch(PDOException $e){
        header ("Location: ../page/pageLogin.php?loginErr="."Error: " . $e->getMessage());
    }
    catch(Exception $f){
        header("Location: ../page/pageLogin.php?loginError=".$message);
    }
	$conn = null;

?>
