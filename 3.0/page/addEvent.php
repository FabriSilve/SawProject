<?php
    require("coockieSessionChecker.php");
    require("header.php");
    require("navbar.php");
    if(!isset($logged)||!$logged)
        header("Location: homepage.php");
?>

<div class="container text-center liteOrange">
    <h1>Add Event</h1>
    <h3>What's New?</h3>
</div>
<br>
<div class="container-fluid bg-3 text-center">
    <div class="container container-table">
        <div class="row vertical-center-row">
            <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
                <?php require("formAddEvent.php") ?>
            </div>
        </div>
    </div>
</div>
<br>

<?php
    require("footer.php");
?>
