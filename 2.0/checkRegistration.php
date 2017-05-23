<?php 
	//validare input
	if(isset($_POST['regUsername']) && isset($_POST['mail1']) && isset($_POST['password1']))
		$username = $_POST['regUsername'];
		$password = $_POST['password1'];
		$mail = $_POST['mail1'];
	} else {
		header("Location: index.php");
	}

	//controllare nel database se presente o meno e modificare campo &accepted
	$accepted = 1;
	if($accepted) {
		//inserire dati nel database
		//redirect al login segnalando successo
		header("Location: index.php?#login");
	} else {
		//redirect al login segnalando errore
		header("Location: index.php");
	}
 ?>