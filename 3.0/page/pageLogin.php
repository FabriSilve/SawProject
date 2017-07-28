<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    if(isset($logged) && $logged)
        header("Location: pageMyProfile.php");

    //TODO se l'utente è stato bannato non deve poter accedere e visualizzare un messaggio "sei stato bannato contatta l'admin"
?>
<!--todo refactor div-->
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
                <span><input type="checkbox" name="keepme" id="keepme" value="keep" checked></span>
                <span>Remember Me</span>
                </p>
                <button type="submit" class="radiusDiv">
                    accedi
                </button>
                <?php if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                    echo '<h5>'.$_GET["message"].'</h5>';
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
