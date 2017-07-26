<?php
require("shared/accessManager.php");
require("shared/header.php");
if(!isset($logged)||!$logged)
    header("Location: pageHomepage.php");
?>
    <script> userData = <?php require("script/userInfo.php"); ?>; </script>
    <div class="container text-center liteOrange radiusDiv">
        <h1>Profile</h1>
        <h3><?php echo $_SESSION["EAusername"]; ?></h3>
    </div>
    <br>
    <div id="userData" class="container radiusDiv liteBackground">
        <script>drawUserData(userData);</script>

        <div class="row text-right">
            <div class="row">
                <div class="col-sm-3 text-right">

                </div>
                <div class="col-sm-3 text-right">

                </div>
                <div class="col-sm-6 text-right">

                </div>
            </div>
        </div>

    </div>
    <br>
<?php require("shared/footer.php"); ?>