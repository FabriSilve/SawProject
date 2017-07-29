<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    require("shared/navbar.php");
?>


    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p><a href="pageDashboard.php">Back</a></p>
                </div>
                <?php
                    if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                        echo '<hr><div class="well">'.$_GET["message"].'</div>';
                    }
                ?>
            </div>
            <div class="col-sm-8 text-left">
                <h1><b>Deleting events</b></h1>
                <div class="well">
                    <form method="post" action="confEventDelete.php">
                        <p>Enter event ID to be deleted:</p>
                    <input type="text" name="id" id="id" placeholder="Event id" class="borderRadius padding5" required>
                    <p></p>
                        <p><input type="submit" value="Search"></p>
                </form>
                </div>
                <hr>
                <div class="well">
                    <h2>Current events in the database:</h2><br>
                <?php
                    require("script/showEvents.php");
                ?>
                </div>
            </div>
        </div>
    </div>

