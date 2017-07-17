<?php
    require("coockieSessionChecker.php");
    require("header.php");
    require("navbar.php");




?>

<!--<div class="liteOrange jumbotron">-->
    <div class="container text-center liteOrange">
        <h1>Event Around</h1>
        <p>The events that surround you!</p>
        <?php
            if(isset($logged) && $logged)
                echo "<p>Ciao ".$username."!</p>";
        ?>
    </div>
<!--</div>-->
<br>
<div class="container container-table">
    <div class="row vertical-center-row">
        <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
            <?php require("formSearch.php") ?>
        </div>
    </div>
</div>
<br>
<?php include("mapDrawer.php"); ?>
<br>
    <div id="eventsList" onload="drawEventsList()">
    </div>
<br>

<?php require("footer.php"); ?>




