<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");
?>
    <div class="container text-center liteOrange borderRadius">
        <h1>Messages</h1>
        <h3>Read your mail!</h3>
    </div>
    <br>
    <a href="pageMessages.php">
        <div class="container text-center liteBackground borderRadius">
            <img src="../media/update.png">
        </div>
    </a>
    <br>
    <div id="messages" class="container liteBackground borderRadius padding5">
        <?php
            require("script/userMessages.php");
            if(empty($messages)) {
                echo '<div class="row">';
                echo '   <div class="col-sm-12 marginMin text-center">';
                echo '       <h3 class="liteBackground borderRadius">MailBox Empty</h3>';
                echo '   </div>';
                echo '</div>';
            }else {
                echo '<div class="row text-right">';
                echo '   <div class="col-sm-12">';
                echo '       <h4>' . count($messages) . ' mail</h4>';
                echo '   </div>';
                echo '</div>';
                for ($j = 0; $j < count($messages); $j++) {
                    $message = $messages[$j];

                    echo '<div class=" marginMin liteBackground borderRadius" onclick="showMessage(\''.$message["id"].'\',\''.$message["read"].'\')">'; //
                    echo '<div class="row">';
                    echo '   <div class="col-sm-4">Message From: <a href="pageOtherProfile.php?username='.$message["sender"].'" target="_blanck" class="link">'.$message["sender"].'</a></div>';
                    echo '   <div class="col-sm-2">';
                    echo '       <div class=row">'.$message["day"].'</div>';
                    echo '   </div>';
                    echo '   <div class="col-sm-2">';
                    echo '       <div class=row">'.$message["time"].'</div>';
                    echo '   </div>';
                    echo '   <div class="col-sm-3"></div>';
                    echo '   <div class="col-sm-1" id="read'.$message["id"].'">';
                    if($message["read"] === '0') {
                        echo '<img src="../media/unread.png" alt="unread">';
                    } else {
                        echo '<img src="../media/read.png" alt="read">';
                    }
                    echo '    </div>';
                    echo '</div>';
                    echo '  <div id="'.$message["id"].'"  class="message text-center marginMin liteBackground">'.$message["text"].'</div>'; //
                    echo '</div>';
                }
            }
        ?>
    </div>
    <br>

<?php require("shared/footer.php"); ?>




