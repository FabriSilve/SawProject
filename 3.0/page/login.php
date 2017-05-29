<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 29/05/2017
 * Time: 21:40
 */
    require("pageStart.php");
    require("navbar.php");
?>

<div class="container container-table">
    <div class="row vertical-center-row margin5">
        <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
            <h1>Login</h1>
            <form name="login-form" onsubmit="return checkLogin()" method="post" action="homepage.php">
                <p>
                    <input type="text" name="loginUsername" id="loginUsername" placeholder="Username" class="radiusDiv padding5">
                </p>
                <p>
                    <input type="password" name="loginPassword" id="loginPassword" placeholder="Password" class="radiusDiv padding5">
                </p>
                <p>
                <span><input type="checkbox" name="loginkeep" id="loginkeep" value="1"></span>
                <span>Remember Me</span>
                </p>
                <button type="submit" class="radiusDiv">
                    accedi
                </button>
                <hr>
                <p>
                    <a class="link" href="registration.php">registrati</a>
                </p>
            </form>
        </div>
    </div>
</div>

</body>
</html>
