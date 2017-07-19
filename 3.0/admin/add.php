<?php
/**
 * Created by PhpStorm.
 * User: vera
 * Date: 12/07/17
 * Time: 16.57
 */
require("Access.php");
require("header.php");
?>

<!DOCTYPE html>
<html lang="it">
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="admin.php"> Torna indietro</a></p>
            </div>
        </div>
    <div class="col-sm-8 text-center">
        <div class="container container-table">
            <form method="post" action="addAdmin.php"> <!--onsubmit="return checkLogin()"-->
                <p>
                    <input type="username" name="username" id="username" placeholder="username" class="radiusDiv padding5" required>
                </p>
                <p>
                    <input type="email" name="email" id="email" placeholder="email" class="radiusDiv padding5" required>
                </p>
                <p>
                    <input type="password" name="password" id="password" placeholder="Password" class="radiusDiv padding5" required>
                </p>
                    <button type="submit" class="radiusDiv">Add</button>
            </form>
        </div>

        </div>
    </div>
</div>

</body>
</html>