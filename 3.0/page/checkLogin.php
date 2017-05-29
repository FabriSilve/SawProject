<?php
	//validare input
	$keepme = 0;
	if(isset($_POST['email']))
		$username = $_POST['email'];
	if(isset($_POST['password']))
		$password = $_POST['password'];
	if(isset($_POST['keepme'])) {
		$keepme = 1;
	}

    /*TODO
        aggiungere controllo dei dati di login nel database
    */
	echo "username: ".$username."\nPassword: ".$password."\nCheck: ".$keepme;

	//testare se presente e modificare la variabile $found;
	$found = 1;
	if($found) {
		session_start();
		$_SESSION["authorized"] = 1;
		if($keepme == 1) {
			setcookie('EAkeep', 'true', time()+86400);
		}
		header("Location: homepage.php");
	} else {
		header("Location: login.php");
	}
	
?>