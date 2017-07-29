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
                        <li><a href="pageUserUpdate.php">Edit user</a></li>
                        <li><a href="pageUserDelete.php">Delete User</a></li>
                        <li><a href="pageUserBan.php">Ban User</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Eventi
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="pageEvents.php">Event List</a></li>
                        <li><a href="pageEventDelete.php"> Delete Event</a></li>
                        <li><a href="pageEventSignaled.php">Events Signed</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Admin
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="pageAdminAdd.php">Add Admin</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="script/logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

