<?php
require("shared/accessManager.php");
require("shared/header.php");
if(!isset($logged)||!$logged)
    header("Location: pageHomepage.php");
?>
    <!--TODO migliorare layout dati ed inserire i ruoli delle persone in base a crediti dati (neventi o nfans)-->
    <script> userData = <?php require("script/userData.php"); ?>; </script>
    <div class="container text-center liteOrange radiusDiv">
        <h1>Profile</h1>
        <!--<h3><?php echo $_SESSION["EAusername"]; ?></h3>-->
    </div>
    <br>
    <div id="userData" class="container radiusDiv liteBackground">
    </div>
    <script>drawUserData(userData);</script>
    <br>
<?php require("shared/footer.php"); ?>