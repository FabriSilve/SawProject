<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="pageDashboard.php">Dashboard</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Users
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="pageUsers.php">User List</a></li>
                        <li><a href="pageUpdateUser.php">Edit user</a></li>
                        <li><a href="pageDeleteUser.php">Delete User</a></li>
                        <li><a href="pageBanUser.php">Ban User</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Eventi
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="pageEvents.php">Event List</a></li>
                        <li><a href="pageDeleteEvent.php"> Delete Event</a></li>
                        <li><a href="pageSignaledEvent.php">Events Signed</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Admin
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="pageAddAdmin.php">Add Admin</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="script/logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

