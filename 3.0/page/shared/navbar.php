<?php
    /*
     * - menu di tutte le pagine con tutte le funzionalità se l'utente è autorizzato
     */
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="pageHomepage.php">Event Around</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php
                    if(isset($logged) && $logged) {
                        echo '<li class="active"><a href="pageAddEvent.php">Add Event</a></li>';
                        echo '<li class="active"><a href="pageFollowed.php">Followed</a></li>';
                        echo '<li class="active"><a href="pageMyEvents.php">My Events</a></li>';
                        echo '<li class="active"><a href="pageMyProfile.php">Profile</a></li>';
                        echo '<li class="active"><a href="pageMessages.php">Messages</a></li>';
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    if(isset($logged) && $logged)
                        echo '<a href="script/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>';
                    else
                        echo '<a href="pageLogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>';
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
