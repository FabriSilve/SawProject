<?php 
	/*CREDENZIALI DATABASE*/
	include("db_credentials.php");

	$con = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

	if($con->connect_error) die ("connection faild: ".$con->connect_error);

	$email = $_POST['email'];  //nome campo passato
	$pass = $_POST['pass'];		//nome campo passato
	/*$salt = "qwertyuiopasdfghjklzxc"*/

	$stmt = $con->prepare("SELECT * FROM Accounts WHERE email=? AND password=SHA(?)");
	$stmt->bind_param("ss", $email, $pass);
	$stmt->execute();
	$result = $stmt->get_result();

	if($result->num_rows>0) {
		$row = $result->fetch_assoc();
		$name = $row["name"];
		$surname = $row["surname"];
		echo "login successful. welcome $name $surname!";
	} else {
		echo "wrong username o password";
	}

	$con->close();
?>
