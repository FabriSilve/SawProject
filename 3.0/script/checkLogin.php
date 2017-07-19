<?php
	require("dbAccess.php");

	if(isset($_POST["keepme"])) {
        $keep = $_POST["keepme"];
    } else {
        $keep = 0;
    }

	if(isset($_POST["username"]) && isset($_POST["password"])) {
		if($_POST["username"] !== "" && $_POST["password"] !== "" ) {
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
        } else {
			die("username or password empty");
		}
    } else {
		die("username or password unset");
	}

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
	    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    // prepared statements
	    $query = "SELECT password FROM Users WHERE username = :username;";
	    $stmt = $conn->prepare($query);	//parameterized queries

	    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

	    $stmt->execute();

	    $result = $stmt->fetch(PDO::FETCH_ASSOC);

		//var_dump($passw);   //debugging print

            //$pass_corr = password_verify($password, $passw['password']);
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
	    	}
            else
                throw new Exception();
            }

	catch(PDOException $e){
	    echo "Error: " . $e->getMessage(); //for debug only ****TO BE REMOVED****
        header ("Location: ../page/pageLogin.php");
	
	}
	catch(Exception $f){
		header ("Location: ../page/pageLogin.php");
	}
	$conn = null;  //termino la connessione.

?>
