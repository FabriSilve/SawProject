<?php
    require("accessManager.php");
    if($logged)
        header("Location: pageDashboard.php");

    require("header.php");
?>

<div class="container container-table marginMax">
    <div class="row vertical-center-row marginMin">
        <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
            <h2>Admin Login</h2>
            <form name="loginAdminForm" method="post" action="script/checkLoginAdmin.php" onsubmit="return checkLogin()">
                <p>
                    <input type="name" name="username" id="username" placeholder="Username" class="radiusDiv padding5" required>
                </p>
                <p>
                    <input type="password" name="password" id="password" placeholder="Password" class="radiusDiv padding5" required>
                </p>
                <button type="submit" class="radiusDiv">
                    accedi
                </button>
            </form>
                <?php if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                    echo '<hr><h5>'.$_GET["message"].'</h5>';
                }
                ?>
        </div>
    </div>
</div>
</body>
</html>