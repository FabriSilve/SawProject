<?php
	if(isset($_COOKIE["myCookie"])) {
		if($_COOKIE["myCookie"] ==true) {
			session_start();
			$_SESSION["authorized"] = 1;
			header("Location: pageHomepage.php");
			exit;
		}
	}
	include("header.php");
?>

<?php include("formSearch.php"); ?>

<?php include("formLogin.php"); ?>

<?php include("formRegistration.php"); ?>

<?php
    include("footer.php");
?>