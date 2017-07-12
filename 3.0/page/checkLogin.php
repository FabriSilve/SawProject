<?php

	if(isset($_POST["keepme"]))
		$keep = $_POST["keepme"];
	else
		$keep = 0;
	if(isset($_POST["username"]))
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);

require ("dbAccess.php");

	try {
	    $dbh = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
	    //$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    // prepared statements
	    $stmt = $dbh->prepare("SELECT password FROM Users WHERE username = :username;");

	    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

	    $stmt->execute();

	    $passw = $stmt->fetch(PDO::FETCH_ASSOC);

		//var_dump($passw);   //debugging print
		if($passw != null) {
            //$pass_corr = password_verify($password, $passw['password']);
            if ($passw = password_hash($pass_corr, PASSWORD_BCRYPT)) {
                session_start();
                $_SESSION["authorized"] = 1;
                if ($keep == 1) {
                    setcookie('EAkeep', 'true', time() + 86400);
                    setcookie("EAusername", $username, time() + 86400);
                }
                header("Location: homepage.php");  //automatically redirect to homepage on login success.
            } else {
                throw new Exception();
            }
        }
	}
	catch(PDOException $e){
	    echo "Error: " . $e->getMessage(); //for debug only ****TO BE REMOVED****
	}
	catch(Exception $f){
        echo "Error: " . $f->getMessage(); //for debug only ****TO BE REMOVED****
	}
	header ("Location: login.php");
	$dbh = null;  //termino la connessione.

?>
