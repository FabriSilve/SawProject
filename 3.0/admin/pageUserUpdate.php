<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    require("shared/navbar.php");
?>


    <div class="row container-fluid text-center">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageDashboard.php">Back</a></p>
            </div>
            <?php
                if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                    echo '<div class="well">'.$_GET["message"].'</div>';
                }
            ?>
        </div>
        <div class="col-sm-8 text-left">
            <h1><b>Editing Users</b></h1>
            <div class="well">
                <form method="post" action="findUserUpdate.php">
                    <p>Search user to modify:</p>
                    <input type="text" name="username" id="username" placeholder="Username" class="radiusDiv padding5" required>
                    <br/>
                    <p><input type="submit" value="Search"></p>
                </form>
            </div>
            <hr>
            <div class="well">
                <h4>Current users in the database</h4><br>
                <?php require("script/showUsers.php"); ?>
            </div>
        </div>
    </div>

<?php
    require("shared/footer.php");
?>