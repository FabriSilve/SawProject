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
<body class="index-body index-body-size text"  id="search">
	<div id="index-p1">	
		<!--SEARCH=====-->
		<div class="index-search">
			<h1 class="index-title index-title-size">Event Around</h1>
			<form name="index-search-form" onsubmit="return index_check_cityname();" method="get" action="homepage.php">
				<p>
					<input type="name" id="city" name="city" placeholder="Citt&agrave;" class="index-form-input" focus="true">
				</p> 
				<p>
					<button type="submit" class="index-form-submit">
						cerca eventi
					</button>
				</p>
				<div class="custom-hr">
					.
				</div>
				<p>
					<a class="index-form-signin text-center" href="javascript: index_signin();">
						accedi
					</a>
				</p>
			</form>
		</div>

		<div class="index-signin" id="sign">
			<h1 class="index-title index-title-size">Login</h1>
			<form name="index-login-form" onsubmit="return index_check_login();" method="post" action="check_login.php">
				<p>
					<input type="text" name="username" placeholder="Username" class="index-form-input">
				</p>
				<p>
					<input type="password" name="password" placeholder="Password" class="index-form-input">
				</p>
				<p>
					<button type="submit" class="index-form-submit">
						accedi
					</button>
				</p>
				<div class="custom-hr">
					.
				</div>
				<p>
					<a class="index-form-signin" href="registration.php">
						registrati
					</a>
				</p>
			</form>
		</div>

		<div class="index-demon" id="demon" onclick="index_return()">
		</div>
		
		<!--<div class="index-down" onclick="index_p2()">-->
			<img src="../image/arrow-down.png" class="index-down" onclick="index_p2()"> <!--class arrow-->
		<!--</div>-->
	</div>

	<div id="index-p2">
		<!--<div class="index-up"  onclick="index_p1()">-->
			<img src="../image/arrow-up.png" class="index-up" onclick="index_p1()">
		<!--</div>-->

		<div class="index-info" id="info">
			<h1 class="index-title index-title-size">
				informazioni sito
			</h1>
			
			<p class="info-justify">
				<img src="../image/temp.jpg" class="img-align-left">
				<h2> 
					fa questo 
				</h2>
				un po di bla bla sul sito e cose carine sulle sue funzionalità bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla blablabla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla blablabla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla blablabla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla 
			</p>
			
			<p class="info-justify">
				<img src="../image/temp.jpg" class="img-align-right">
				<h2 class="info-right"> 
					e anche questo
				</h2>
				la bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla blablabla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
				altre cose carine che descrivano il sito bla bla
				
			</p>
		</div>
	</div>

</body>
</html>