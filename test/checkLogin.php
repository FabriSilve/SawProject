<?php
	//validare input
	$keepme = 0;
	if(isset($_POST['loginUsername']))
		$username = $_POST['loginUsername'];
	if(isset($_POST['loginPassword']))
		$password = $_POST['loginPassword'];
	if(isset($_POST['loginkeep'])) {
		$keepme = 1;
	}

	echo "username: ".$username."\nPassword: ".$password."\nCheck: ".$keepme;

	//testare se presente e modificare la variabile $found;
	$found = 1;
	if($found) {
		session_start();
		$_SESSION["authorized"] = 1;
		if($keepme == 1) {
			setcookie('myCookie', 'true', time()+86400);
		}
		header("Location: homepage.php");
	} else {
		header("Location: index.php");
	}
	
?>