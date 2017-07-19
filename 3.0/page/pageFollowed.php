<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");
?>
    <script>
        var events = <?php require("../script/followedEvents.php"); ?>;
    </script>
    <div class="container text-center liteOrange radiusDiv">
        <h1>Followed Event</h1>
        <h3>What's the Next?</h3>
    </div>
<br>
    <div id="eventsList" class="container"></div>
    <script>drawEventsList();</script>
<br>
<?php require("shared/footer.php"); ?>