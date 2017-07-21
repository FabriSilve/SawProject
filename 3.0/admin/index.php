<?php
//TODO inserire start session
header("Location: pageDashboard.php");
?>
<!DOCTYPE html>
<head>
    <title>Event Around - Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../js/inputChecker.js"></script>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container container-table">
    <div class="row vertical-center-row margin5">
        <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
            <h1>Login</h1>
            <form name="loginAdminForm" method="post" action="checkLoginAdmin.php" onsubmit="return checkLogin()">
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
</body>
</html>