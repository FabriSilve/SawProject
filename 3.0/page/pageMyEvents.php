<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");
?>
    <script>
        var events = <?php require('script/userEvents.php'); ?> ;
    </script>
    <div class="container text-center liteOrange radiusDiv">
        <h1>My Event</h1>
        <h3>You remember their?</h3>
    </div>
    <br>
    <a href="pageMyEvents.php">
        <div class="container text-center liteBackground radiusDiv">
            <img src="../media/update.png">
        </div>
    </a>
    <br>
    <div id="eventsList" class="container"></div>
    <script>drawEventsList(null);</script>
    <br>
<?php require("shared/footer.php"); ?>