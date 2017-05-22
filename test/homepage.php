<?php
	include("header.php");
	include("coockieSessionChecker.php");

    //variabili inizializzate
    $city = "Genova";
    $lat;
    $lon;
    $distance;
    $type = array();

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
