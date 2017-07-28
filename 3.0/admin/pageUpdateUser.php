<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    require("shared/navbar.php");
?>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p><a href="pageDashboard.php"> Backward</a></p>
                </div>
                <?php
                    if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                        echo '<div class="well">'.$_GET["message"].'</div>';
                    }
                ?>
            </div>
            <div class="col-sm-8 text-left">
                <h1><b>Users update</b></h1>
                <div class="well">
                    <form method="post" action="TrovaUpdateUser.php">
                        <p>Insert user to be modified:</p>
                        <input type="text" name="username" id="username" placeholder="Username"
                               class="radiusDiv padding5" required><span id="status"></span>
                        <p></p>
                        <p><input type="submit" value="Select"></p>
                    </form>
                </div>
                <hr>
                <div class="well">
                    <h4>List of current users:</h4><br>
                    <?php require("script/showUsers.php"); ?>
                </div>
        </div>
    </div>

<?php
    require("shared/footer.php");
?>