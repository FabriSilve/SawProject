<?php
	include("header.php");
	include("coockieSessionChecker.php");

	if(isset($_GET['from']) && $_GET['from'] == "search") {
		//INSERIRE VALIDAZIONE E CONTROLLO INPUT
	    /*if(isset($_POST['position'])) {
	        if($_POST['position'] == '') {
	            $city = "Defautl";
	        } else {
	            $city = $_POST['position'];
	        }
	        echo "city: ".$city;
	    } else {
	        echo "position Unset";
	    }
	    if(isset($_POST['lat']) and isset($_POST['lon'])) {
	        $cordinate = $_POST['lat'].";".$_POST['lon'];
	        echo "cordinate: ".$cordinate;
	    }

	    if(isset($_POST['distance'])) {
	        $distance = $_POST['distance'];
	        echo "distanza: ".$distance;
	    }
	    $type = array();
	    $i = 0;
	    if(isset($_POST['party'])) {
	        if($_POST['party'] == 1) {
	            $type[$i++] = "party";
	        }
	    }
	    if(isset($_POST['show'])) {
	        if($_POST['show'] == 1) {
	            $type[$i++] = "show";
	        }
	    }
	    if(isset($_POST['art'])) {
	        if($_POST['art'] == 1) {
	            $type[$i++] = "art";
	        }
	    }
	    if(isset($_POST['sport'])) {
	        if($_POST['sport'] == 1) {
	            $type[$i++] = "sport";
	        }
	    }

	    foreach ($type as $t) {
	        echo "type: " . $t;
	    }*/
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
