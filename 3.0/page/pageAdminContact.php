<?php
    require("shared/accessManager.php");
    require("shared/header.php");

    $sender = !empty($_SESSION['EAusername']) ? $_SESSION['EAusername'] : 'ospite';
?>

    <div class="container text-center liteOrange borderRadius">
        <h1>Admin's contact</h1>
        <p>How can I help you</p>
    </div>
    <br/>
    <div class="container borderRadius liteBackground padding20">
        <h3 class="text-center">Send me a message!</h3>
        <form name="sendMessage" method="post" onsubmit="return checkMessage();" action="script/messageToAdmin.php">
            <input type="text" id="sender" name="sender"  value="<?php echo $sender; ?>" hidden>
            <input type="text" id="receiver" name="receiver" value="admin"  hidden>
            <p>
                <textarea class="mailMessageBox" cols="25" rows="8" id="text" name="text" placeholder="Message"></textarea>
            </p>
            <p class="text-center">
                <input type="submit" class="borderRadius" value="send">
            </p>
            <h4 id="error" class="text-center"></h4>
            <?php
            if(!empty($_GET["message"])) {
                echo '<h5 class="error text-center">'.$_GET["message"].'</h5>';
            }
            ?>
        </form>
    </div>
    <br/>
    <div class="container">
        <div class="text-center liteOrange borderRadius row">
            <div class="col-sm-4">
                <h3>Tel: 010-1234567</h3>
            </div>
            <div class="col-sm-4">
                <h3>Email: admin@earound.it</h3>
            </div>
            <div class="col-sm-4">
                <h3>Company: unige.spa</h3>
            </div>
        </div>
    </div>