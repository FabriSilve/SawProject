<?php
    require("shared/header.php");
    //require("navbar.php");
?>
<div class="container container-table">
    <div class="row vertical-center-row marginMin">
        <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
            <h1>Login</h1>
            <form name="login-form" method="post" action="script/checkLogin.php" onsubmit="return checkLogin()">
                <p>
                    <input type="name" name="username" id="username" placeholder="Username" class="radiusDiv padding5" required>
                </p>
                <p>
                    <input type="password" name="password" id="password" placeholder="Password" class="radiusDiv padding5" required>
                </p>
                <p>
                <span><label for="keepme"></label><input type="checkbox" name="keepme" id="keepme" value="1" checked></span>
                <span>Remember Me</span>
                </p>
                <button type="submit" class="radiusDiv">
                    accedi
                </button>
                <?php if(isset($_GET["loginError"]) && $_GET["loginError"] !== "" ) {
                    echo '<h5>'.$_GET["loginError"].'</h5>';
                }
                ?>
                <hr>
                <p>
                    <a class="link" href="pageRegistration.php">registrati</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?php //require("shared/footer.php"); ?>
