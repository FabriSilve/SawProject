<!DOCTYPE html>
<html lang="it">

<head>
    <title>Mostra Utenti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../page/homepage.php">Home</a></li>
                <li class="active"><a href="admin.php">Torna indietro</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../page/homepage.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p></p>
            <p></p>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Utenti</h1>
            <p><?php
                /**
                 * Created by PhpStorm.
                 * User: vera
                 * Date: 12/07/17
                 * Time: 17.21
                 */


                $DB = [];
                $count = 0;
                require("Access.php");

                $conn = new mysqli($servername, $dbUser, $dbPass, $dbName);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $query = "SELECT * FROM Users";
                $res = $conn->query($query);
                //echo "Utenti: nome\t, email\t, password\n";
                if($res->num_rows > 0) {
                    while($row = $res->fetch_row()) {
                        //$DB[$count++] = [$row[0],$row[1],$row[2]];
                        echo "\n['".$row[0]."',\r\n'".$row[1]."',\t\r\n'".$row[2]."'];\t\r\n";
                    }
                }
                $conn->close();
                ?></p>
            <hr>
        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p></p>
            </div>
            <div class="well">
                <p></p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>

</body>
</html>

