<!DOCTYPE html>
<head>
	<title>
		Progetto saw
	</title>
	<!--META=======-->

	<!--CSS========-->
	<link href="../css/style.css" rel="stylesheet" type="text/css">	
	<link href="../css/slideshow.css" rel="stylesheet" type="text/css">
	<link href="../css/siderrange.css" rel="stylesheet" type="text/css">
	<!--JS=========-->
	<script src="../js/function.js"></script>
	
	<!--FONTS======-->
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

	<!--ICONS======-->
		
</head>
<body class="homepage-body index-body-size">

	<nav class="nav-menu">
		<h4>Menu</h4>
		<div class="mobile-menu-container">
			<ul class="mobile-menu-list">
				<li class="menu-item">
					<img src="../image/icon/AddEvent.png" alt="Add Event">
					<a class="menu-item-link" href="##">Add Event</a>
				</li>
				<li class="menu-item">
					<img src="../image/icon/PreferEvent.png" alt="Prefered">
					<a class="menu-item-link" href="##">Prefered</a>
				</li>
				<li class="menu-item">
					<img src="../image/icon/MyEvent.png" alt="My Event">
					<a class="menu-item-link" href="##">My Event</a>
				</li>
				<li class="menu-item">
					<img src="../image/icon/Message.png" alt="Messages">
					<a class="menu-item-link" href="##">Messages</a>
				</li>
				<li class="menu-item">
					<img src="../image/icon/Logut.png" alt="Logout">
					<a class="menu-item-link" href="##">Logout</a>
				</li>
				<li>
					<img src="../image/logo.png" alt="logo" class="nav-logo">
			</ul>
		</div>
	</nav>
	<form class="header-search-form" metod="get" action="homepage.php" onsubmit="index_check_cityname()">
		<header class="header-menu">
			<img src="../image/logo.png" alt="logo" class="header-logo">
			<div class="header-search">				
				<input type="name" name="city" id="city" class="header-search-city">
				<botton type="submit" onclick="hide_filter_panel()">
					<img src="../image/cerca.png" alt="search" class="header-icon">
				</botton>
				<img src="../image/filter.png" alt="filter" class="header-icon" onclick="show_filter_panel();">
				</div>
				
			</div>
			
		</header>
		<!--rifare con AJAX-->
		<div class="header-filter-panel">
			<h4 class="home-h4">
				distanza
			</h4>
			<input type="range" min="0" max="50" value="0" step="5" onchange="showValue(this.value)" value="15" class="home-input slider-input"/>
			<span id="range">0 km</span>
			<hr>
			<h4 class="home-h4">
				eventi
			</h4>
			<table class="check-table">
				<tr>
					<td>
						<input type="checkbox" class="check-input">
						festa
					</td>
					<td>
						<input type="checkbox" class="check-input">
						spettacolo
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" class="check-input">
						mostra
					</td>
					<td>
						<input type="checkbox" class="check-input">
						sport
				</td>
				</tr>
			</table>
		</div>
	</form>
			
<!--
	<div class="header home-up">
	


	<div class="filter">
		<h3 class="index-title index-title-size">
			Filtri
		</h3>
		<hr>
		<form name="hompage-filter"  onsubmit="index_check_cityname()" action="hompage.php">
			<input type="name" id="city" name="city" placeholder="Citt&agrave;" class="home-input">
			<botton type="submit">
				<img src="../image/cerca.png" class="cerca-icon display-inline">
			</botton>
			<hr>
			<h4 class="home-h4">
				distanza
			</h4>
			<input type="range" min="0" max="50" value="0" step="5" onchange="showValue(this.value)" value="15" class="home-input slider-input"/>
			<span id="range">0 km</span>
			<hr>
			<h4 class="home-h4">
				eventi
			</h4>
			<table class="check-table">
				<tr>
					<td>
						<input type="checkbox" class="check-input">
						festa
					</td>
					<td>
						<input type="checkbox" class="check-input">
						spettacolo
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" class="check-input">
						mostra
					</td>
					<td>
						<input type="checkbox" class="check-input">
						sport
					</td>
				</tr>
			</table>

		</form>

	</div>
	

	<div class="event home-center">
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	ciao<br>
	ciao<br>
	cioa<br>
	</div>-->

	<div class="image-scroll home-bottom">
		<img class="slide scroll-slide animated-fading" src="../image/slide1.jpg">
		<img class="slide scroll-slide animated-fading" src="../image/slide2.jpg">
		<img class="slide scroll-slide animated-fading" src="../image/slide3.jpg">
		<img class="slide scroll-slide animated-fading" src="../image/slide4.jpg">
	</div>
	





<script src="../js/slideshow.js"></script>
<script src="../js/sliderrange.js"></script>

</body>
</html>