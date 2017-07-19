<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="icon" href="../../media/icon.png" type="image/png" />
    <title>Event Around</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../../js/inputChecker.js"></script>
    <script src="../../js/eventSearcher.js"></script>
    <script src="../../js/eventMap.js"></script>
    <script src="../../js/eventsList.js"></script>
    <script src="../../js/addEvent.js"></script>
    <script src="../../js/utils.js"></script>

    <link rel="stylesheet" href="../../css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- TODO portare in locale bootstrap -->
    <!--<script src="http://maps.google.com/maps/api/js?key=AIzaSyAQO1FBU7ngY0Wv20d3-gPI1sj5_ApCZ3M&sensor=true"></script>-->

    <script>
        var events = <?php include("../script/followedEvents.php"); ?>;
        var owner = "<?php if(isset($_SESSION["username"])) echo $_SESSION["username"]; else echo 0; ?>";
        console.info("events: "+events);
        console.info("owner: "+owner);
    </script>
</head>
<body>
    <?php require("navbar.php"); ?>
