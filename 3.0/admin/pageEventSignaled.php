<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    require("shared/navbar.php");
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageDashboard.php"> back</a></p>
            </div>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Signaled Events</h1>
            <div class="well">
                <?php require("script/showSignaled.php"); ?>
            </div>
        </div>
    </div>
</div>

<?php
    require("shared/footer.php");
?>



