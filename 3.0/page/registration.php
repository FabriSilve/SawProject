<?php
    require("header.php");
    //require("navbar.php");
?>

<div class="container container-table">
    <div class="row vertical-center-row margin5">
        <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
            <h1>Registration</h1>
            <form name="register-form" onsubmit="return checkReg()" method="post" action="../script/checkReg.php">
                <p>
                    <input type="text" name="username" id="username" placeholder="Username" class="radiusDiv padding5" required>
                </p>
                <p>
                    <input type="email" name="email1" id="email1" placeholder="Mail" class="radiusDiv padding5" required>
                </p>
                <p>
                    <input type="email" name="email2" id="email2" placeholder="Repeat Mail" class="radiusDiv padding5" required>
                </p>
                <p>
                    <input type="password" name="password1" id="password1" placeholder="Password" class="radiusDiv padding5" required>
                </p>
                <p>
                    <input type="password" name="password2" id="password2" placeholder="Repeat Password" class="radiusDiv padding5" required>
                </p>
                <br>
                <p>
                    <button type="submit" class="radiusDiv">
                        Register
                    </button>
                </p>
            </form>
        </div>
    </div>
</div>

<?php require("footer.php"); ?>
