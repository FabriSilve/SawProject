<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    require("shared/navbar.php");
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageDashboard.php"> Torna indietro</a></p>
            </div>
            <?php
                    if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                        echo '<hr><div class="well">'.$_GET["message"].'</div>';
                    }
                ?>
            </div>
            <div class="col-sm-8 text-left">
                <h1><b>Deleting Users</b></h1>
                <div class="well">
                    <form method="post" action="confUserDelete.php">
                        <p>Search user for delete:</p>
                        <input type="text" name="username" id="username" placeholder="Username" class="borderRadius padding5" required><span id="status"></span>
                        <p></p>
                        <p><input type="submit" value="Search"></p>
                </form>
                </div>
                <hr>
                <div class="well">
                    <h4>Users currently in the database:</h4><br>
                    <?php require("script/showUsers.php"); ?>
                </div>
            </div>
        </div>
    </div>

<?php
    require("shared/footer.php");
?>
