<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="icon" href="../media/icon.png" type="image/png" />
    <title>Event Around</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../js/inputChecker.js"></script>
    <script src="../js/eventSearcher.js"></script>
    <script src="../js/eventMap.js"></script>
    <script src="../js/eventsList.js"></script>
    <script src="../js/addEvent.js"></script>
    <script src="../js/utils.js"></script>

    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!--<script src="http://maps.google.com/maps/api/js?key=AIzaSyAQO1FBU7ngY0Wv20d3-gPI1sj5_ApCZ3M&sensor=true"></script>-->

    <script>
        var events = <?php require("../script/followedEvents.php"); ?>;
        var owner = "<?php if(isset($_SESSION["EAusername"])) echo $_SESSION["EAusername"]; else echo 0; ?>";
        console.info("events: "+JSON.stringify(events));
        console.info("owner: "+owner);
    </script>
</head>
<body>
    <?php require("navbar.php"); ?>
