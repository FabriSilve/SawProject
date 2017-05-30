<?php

	$keep = $_POST["loginkeeping"];
	$servername = "localhost";
	$user = "S4095697";
	$pass = "sawforthewin666";
	$dbname = "S4095697";

	try {
	    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
	 
	    //$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);	//force to not emulate
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    // prepared statements
	    $query = "SELECT password FROM accounts WHERE username = :username;";
	    $stmt = $dbh->prepare($query);	//parameterized queries

	    $username = trim($_POST["username"]);
	    $password = trim($_POST["password"]);

	    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

	    $stmt->execute();

	    $passw = $stmt->fetch(PDO::FETCH_ASSOC);

		//var_dump($passw);   //debugging print
	    if ($passw){
	    	$pass_corr = password_verify($password, $passw['password']);
	    	if ($pass_corr){
		    	session_start();
				$_SESSION["authorized"] = 1;
				if($keep == 1) {
					setcookie('cname', 'true', time()+86400);
				}
				header("Location: homepage.php");  //automatically redirect to homepage on login success.
			}
			else
				throw new Exception();
		}
		else
			throw new Exception();
	}
	catch(PDOException $e){
	    echo "Error: " . $e->getMessage(); //for debug only ****TO BE REMOVED****
	    //header("Location: login.php");
	
	}
	catch(Exception $f){
		echo "Invalid username and/or password.";
	}
	$dbh = null;  //termino la connessione.

?>
