<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../pageHomepage.php">Event Around</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php
                    if(isset($logged) && $logged)
                        echo '<li class="active"><a href="../pageAddEvent.php">Add Event</a></li>';
                ?>
                <!--<li class="active"><a href="#">Eventi</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Contact</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    if(isset($logged) && $logged)
                        echo '<a href="../../script/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>';
                    else
                        echo '<a href="../pageLogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>';
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>