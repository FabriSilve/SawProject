<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");
?>
    <script>
        var messages = <?php require("script/userMessages.php"); ?>
    </script>

    <div class="container text-center liteOrange radiusDiv">
        <h1>Messages</h1>
        <h3>Read your mail!</h3>
    </div>
    <br>
    <a href="pageMessages.php">
        <div class="container text-center liteBackground radiusDiv">
            <img src="../media/update.png">
        </div>
    </a>
    <br>
    <div id="messages" class="container liteBackground radiusDiv"></div>
    <script>drawMessages();</script>
    <br>

<?php require("shared/footer.php"); ?>




