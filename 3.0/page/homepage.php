<?php
    require("accessManager.php");
    require("header.php");
    //require("navbar.php");
?>

<!--<div class="liteOrange jumbotron">-->
    <div class="container text-center liteOrange">
        <h1>Event Around</h1>
        <p>The events that surround you!</p>
        <?php
            if(isset($logged) && $logged)
                echo "<p>Ciao ".$_SESSION["EAusername"]."!</p>";
        ?>
    </div>
<!--</div>-->
<br>
<div class="container container-table">
    <div class="row vertical-center-row">
        <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
            <?php require("formSearch.php") ?> <!--TODO necessario altro file? -->
        </div>
    </div>
</div>
<br>
    <div class="container-fluid bg-3 text-center">
        <div id="googleMap" class="container map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQO1FBU7ngY0Wv20d3-gPI1sj5_ApCZ3M&callback=myMap"></script>
    </div>
<br>
    <div id="eventsList" class="container"></div>
    <script>drawEventsList();</script>
<br>

<?php require("footer.php"); ?>




