<!DOCTYPE html>
<head>
	<title>Lab1 | Registrazione</title>
	<link rel="stylesheet" href="../style.css" type="text/css">
	<script type="text/javascript" src="../functions.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montez" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
</head>
<body>
<body>
	<header>
		<div class="menu">
			<div class="logo">
				<a href="../index.html">
					<img class="imglogo" src="../home2.png">
				</a>
			</div>
			<p class="titolo">
				Registrazione
			</p>
			<div class="login">
				<a class="link_menu" href="login.php">Login</a>
			</div>		
		</div>
	<header>
	<section>
		<div class="page">
			<div class="container form_text">
				<?php
					/*variabili*/
					$servername = "localhost";
					$user = "S4095697";
					$pass = "sawforthewin666";
					$dbname = "S4095697";

					try {
					    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
					 
					    //$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);	//force to not emulate
					    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					    // prepared statements
					    $stmt_acc = $dbh->prepare("INSERT INTO accounts (username, password) VALUES (:username, :password);");
					    $stmt_prof = $dbh->prepare("INSERT INTO profilo (nome, cognome, email, residenza, link_social, auto_descizione) VALUES (:nome, :cognome, :email, :residenza, :link_social, :auto_descizione);");

					    $dbh->beginTransaction();

					    /****** accounts BLOCK ******/
					    {
					    	$stmt_acc->bindParam(':username', $username); 
					    	$stmt_acc->bindParam(':password', $password);

					    	$username = trim($_POST["username"]);

						    if ((empty($username)) || (!preg_match("/^[ -~]*$/",$username))) {
								$userErr = "Username error";
								throw new Exception();
							}
							
							$pass_pre_hash = trim($_POST["password"]);

							if(empty($pass_pre_hash)){
								$passErr = "Password is required";
								throw new Exception();
							}
	  						if(!preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/", $pass_pre_hash)){
	  							$passErr = "Invalid password, it must contain at least: 1 lowercase, 1 uppercase, 1 decimal, 1 special char, and a min of 8 total characters.";
	  							throw new Exception();
	  						}

	  						$password = password_hash($pass_pre_hash, PASSWORD_BCRYPT);
	  						//libsodium extension from paragon.
	  						/*$password = \Sodium\crypto_pwhash_str(
	  																$pass_pre_hash,
    																\Sodium\CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
    																\Sodium\CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
																);*/
							$stmt_acc->execute();
					    }

					    /******* profilo BLOCK *******/
					    {
					    	$stmt_prof->bindParam(':nome', $nome); 
						    $stmt_prof->bindParam(':cognome', $cognome);
						    $stmt_prof->bindParam(':email', $email); 
						    $stmt_prof->bindParam(':residenza', $residenza);
						    $stmt_prof->bindParam(':link_social', $link_social); 
						    $stmt_prof->bindParam(':auto_descizione', $auto_descizione);
							
							$nome = trim($_POST["nome"]);
							$cognome = trim($_POST["cognome"]);
							$email = trim($_POST["email"]);
							$residenza = trim($_POST["residenza"]);
							$link_social = trim($_POST["link_social"]);
							$auto_descizione = trim($_POST["auto_descizione"]);

							$profile_arr = array($nome, $cognome, $email, $residenza);

							foreach ($profilo_arr as $i) {
								if (empty($i)){
									$profileErr = "Empty field found.";
									throw new Exception();
								}
								if (!preg_match("/^[ -~]*$/",$i)){
									$profileErr = $i + " : invalid format.";
									throw new Exception();
								}
							}
							
							if (!filter_var($link_social, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED)){
								$profileErr = $link_social + " : invalid format.";
								throw new Exception();
							}

						    $stmt_prof->execute();
					    }
		
					    $dbh->commit();
					    echo '<h2> Registrato con successo!<h2>';

					   
					}
					catch(PDOException $e){
						$dbh->rollback();
					    echo "Error: " . $e->getMessage(); //for debug only ****TO BE REMOVED****
					    echo '<h2> Si è verificato un errore. <h2>';
						echo '<h3><a href="../registrazione.html">torna indietro</a></h3>';
					}
					catch(Exception $k){
						$dbh->rollback();
						if (isset($userErr))
					    	echo $userErr;
					    if (isset($passErr))
					    	echo $passErr;
					    if (isset($profileErr))
					    	echo $profileErr;

					    echo '<h3><a href="../registrazione.html">torna indietro</a></h3>';
					}
					$dbh = null;  //termino la connessione.

				?>
			</div>
		</div>
	</section>
</body>
</html>