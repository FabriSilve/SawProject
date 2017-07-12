<?php
/**
 * Created by PhpStorm.
 * User: vera
 * Date: 12/07/17
 * Time: 16.57
 */
//come togliare header senza perdere
require("Access.php");
require("../page/pageStart.php");
require("../page/navbar.php");
?>

<html>
<body>
<div class="container container-table">
    <div class="row vertical-center-row margin5">
        <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
           <!-- <form name="login-form" method="post" action="addAdmin.php"> <!--onsubmit="return checkLogin()"-->
             <form name="login-form" method="post"> <!--onsubmit="return checkLogin()"-->
                 <!--<p><input type="nome" name="nome" id="nome" placeholder="Nome" class="radiusDiv padding5" required></p>-->

                <p><input type="email" name="email" id="email" placeholder="Email" class="radiusDiv padding5" required></p>
                <p><input type="password" name="password" id="password" placeholder="Password" class="radiusDiv padding5" required></p>
                <button type="submit" class="radiusDiv">
                    Add
                </button>
                 <p>
                     <a class="link" href="admin.php">torna indietro</a>
                 </p>
                <hr>
             </form>
        </div>
    </div>
</div>

</body>
</html>
