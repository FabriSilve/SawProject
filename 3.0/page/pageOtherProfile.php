<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");
    if(empty($_GET["username"])) {
        header("location: ../");
    }
    $username = $_GET["username"];
    if($username === $_SESSION["EAusername"]) {
        header("location: pageMyProfile.php");
    }
?>

    <script> userData = <?php require("script/userData.php"); ?>; </script>

    <div class="container text-center liteOrange radiusDiv">
        <h1>Profile</h1>
        <h3>Have you met..?</h3>
    </div>
    <br>
    <div class="container radiusDiv liteBackground">
        <div class="row">
            <div class="col-sm-11 text-right">
                <h1 id="username"></h1>
            </div>
            <div class="col-sm-1 text-center">
                <div class="row">
                    <div id="link"></div>
                </div>
                <br/>
                <div class="row" id="messageUser">
                    <img src="../media/mex.png" id="mex" onclick="showForm('mailForm');">
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
    <br>
    <script>drawUserData(userData);</script>

    <!--TODO esportare file?-->
    <div id="mailForm" class="mailForm radiusDiv">
        <img onclick="hideForm('mailForm')" class="text-left padding5" src="../media/delete.png">
        <form name="sendMessage" method="post" onsubmit="return checkMessage();" action="script/messageSender.php">
            <input type="text" id="sender" name="sender"  value="<?php echo $_SESSION["EAusername"]; ?>" hidden>
            <input type="text" id="receiver" name="receiver" value="<?php echo $userData["username"]; ?>"  hidden>
            <p class="sendMailItem" >
                <textarea class="mailMessageBox" cols="25" rows="8" id="text" name="text" placeholder="Message"></textarea>
            </p>
            <p class="text-center">
                <input type="submit" class="radiusDiv" value="send">
            </p>
            <h4 id="error" class="text-center"></h4>
        </form>
    </div>

<?php require("shared/footer.php"); ?>