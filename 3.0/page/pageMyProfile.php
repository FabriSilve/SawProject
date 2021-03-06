<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");
    $username = $_SESSION["EAusername"];
?>
    <script> userData = <?php require("script/userData.php"); ?>; </script>
    <div class="container text-center liteOrange borderRadius">
        <h1>Profile</h1>
        <h3>About you..</h3>
    </div>
    <br>
    <form method="post" action="script/userModifier.php">
        <div class="container borderRadius liteBackground">
            <div class="row">
                <div class="col-sm-11 text-right">
                    <h1 id="username"></h1>
                </div>
                <div class="col-sm-1 text-center">
                    <div class="row">
                        <div id="link"></div>
                    </div>
                    <br/>
                    <div class="row" id="modifyUser">
                        <img src="../media/modify.png" id="modify" onclick="userModify();">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" id="userData">
                <div class="row text-center">
                    <div class="col-sm-4" id="name"></div>
                    <div class="col-sm-4" id="surname"></div>
                    <div class="col-sm-4" id="residence"></div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-sm-6" id="description"></div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6" id="events"></div>
                            <div class="col-sm-6" id="fans"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6" id="followed"></div>
                            <div class="col-sm-6" id="signaled"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>drawUserData(userData);</script>
    <br>
<?php require("shared/footer.php"); ?>