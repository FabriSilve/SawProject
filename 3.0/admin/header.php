<!DOCTYPE html>
<html lang="it">

<head>
    <title>Event Around - Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="../vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="../css/styles.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]>
    <script language="javascript" type="text/javascript" src="../vendors/flot/excanvas.min.js"></script><![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="../http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <style>
          .navbar {
              margin-bottom: 0;
              border-radius: 0;
          }
          .row.content {
                height: 450px
          }
          .sidenav {
                padding-top: 0px;
                background-color: #f1f1f1;
                height: 100%;
          }
        }


            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {
                    height: auto;
                }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="pageDashboard.php">Dashboard</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Utenti
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="pageUsers.php">Utenti</a></li>
                    <li><a href="pageUpdateUser.php">ModUser</a></li>
                    <li><a href="pageDeleteUser.php">DeleteUser</a></li>
                    <li><a href="pageBanUser.php">BanUser</a></li>
                    <li><a href="pageAddAdmin.php">AddAdmin</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Eventi
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="pageEvents.php"> Eventi</a></li>
                    <li><a href="pageDeleteEvent.php"> DeleteEvento</a></li>
                    </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <!--TODO inserire passaggio intermedio per pulire la sessione-->
            <li><a href="../page/pageHomepage.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
        </ul>
    </div>
</nav>


