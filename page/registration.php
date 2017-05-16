<!DOCTYPE html>
<head>
	<title>
		Progetto saw
	</title>
	<!--META=======-->

	<!--CSS========-->
	<link href="../css/style.css" rel="stylesheet" type="text/css">	

	<!--JS=========-->
	<script src="../js/function.js"></script>

	<!--FONTS======-->
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

	<!--ICONS======-->
		
</head>
<body id="reg" class="reg-body index-body-size">
	<div class="reg-form" id="reg-form">
			<h1 class="index-title index-title-size">Registrazione</h1>
			<form name="reg-form" onsubmit="return check_reg();" method="post" action="check_registration.php">
				<p>
					<input type="text" name="username" placeholder="Username" class="index-form-input">
				</p>
				<p>
					<input type="mail" name="mail1" placeholder="Mail" class="index-form-input">
				</p>
				<p>
					<input type="mail" name="mail2" placeholder="Ripeti Mail" class="index-form-input">
				</p>
				<p>
					<input type="password" name="password1" placeholder="Password" class="index-form-input">
				</p>
				<p>
					<input type="password" name="password2" placeholder="Ripeti Password" class="index-form-input">
				</p>
				<p>
					<button type="submit" class="index-form-submit">
						registrati
					</button>
				</p>
				<div class="custom-hr">
					.
				</div>
				<p>
					<a class="index-form-signin" href="index.php">
						indietro
					</a>
				</p>
			</form>
		</div>
</body>
</html>