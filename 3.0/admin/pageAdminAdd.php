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
            <div class="well">
            <form method="post" action="script/adminAdder.php">
                <h1>Enter new Admin</h1>
                <div
                <p><b>Enter your credentials:</b></p>
                <p><input type="text" name="username" id="username" placeholder="Username" class="radiusDiv padding5" required></p>
                <p><input type="email" name="email" id="email" placeholder="Email" class="radiusDiv padding5" required></p>
                <p><input type="password" name="password" id="password" placeholder="Password" class="radiusDiv padding5" required></p>
                <p><input type="submit" class="radiusDiv" value="Add"></p>
            </form>
            </div>
        </div>
        <div class="well">
            <?php require("script/showAdmin.php");?>
        </div>
    </div>
</div>
<?php
    require("shared/footer.php");
?>