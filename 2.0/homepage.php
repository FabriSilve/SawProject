<?php

	//variabili inizializzate
	$city = "Genova";
	$lat = 44.414165;
	$lon = 8.942184;
	$distance;
	$type = array();
	$logged = 0;
	include("header.php");
	include("coockieSessionChecker.php");



	if(isset($_GET['from']) && $_GET['from'] == "search") {
        include("checkSearch.php");
	} else {
		$city = "Genova";
	}

	include("mapDrawer.php");

	include("homePublic.php");


	if($logged) {
		include("homePrivate.php");
	}


	include("footer.php");
		
?>
