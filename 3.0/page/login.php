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
<html>

<body>
<div class="container container-table">
    <div class="row vertical-center-row margin5">
        <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
            <h1>Login</h1>
            <form name="login-form" method="post" action="checkLogin.php"> <!--onsubmit="return checkLogin()"-->
                <p>
                    <input type="email" name="email" id="email" placeholder="Email" class="radiusDiv padding5" required>
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
