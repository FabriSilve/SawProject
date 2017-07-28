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
        </div>
        <div class="col-sm-8 text-left">
            <h1>Events</h1>
            <div class="well">
                <h4>Current events in the database:</h4><br>
                <?php require("script/showEvents.php"); ?>
            </div>
        </div>
    </div>
</div>

<?php
    require("shared/footer.php");
?>



