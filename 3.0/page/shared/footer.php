<footer class="container text-center liteOrange radiusDiv">
    <div class="row">
        <div class="col-sm-1 text-center">
            <a href="https://twitter.com" target="_blank"><img src="../media/twitter.png" alt="twitter"></a>
        </div>
        <div class="col-sm-1 text-center">
            <a href="https://plus.google.com" target="_blank"><img src="../media/googleplus.png" alt="googleplus"></a>
        </div>
        <div class="col-sm-1 text-center">
            <a href="https://facebook.com" target="_blank"><img src="../media/facebook.png" alt="facebook"></a>
        </div>
        <div class="col-sm-9 text-right">
            <img src="../media/mail.png" alt="admin" onclick="showAdmin()">
        </div>
    </div>

    <div id="admin" class="mailForm radiusDiv">
        <img onclick="hideAdmin()" class="text-left padding5" src="../media/delete.png">
        <form name="formAdmin" method="post" onsubmit="return checkMessage();" action="script/messageSender.php">
            <input type="text" id="sender" name="sender"  value="<?php echo $_SESSION["EAusername"]; ?>" hidden>
            <input type="text" id="receiver" name="receiver" value="admin"  hidden>
            <p>
                <textarea class="mailMessageBox" cols="25" rows="8" id="text" name="text" placeholder="Message"></textarea>
            </p>
            <p class="text-center">
                <input type="submit" class="radiusDiv " value="send">
            </p>
            <h4 id="error" class="text-center"></h4>
        </form>
    </div>

</footer>

</body>
</html>