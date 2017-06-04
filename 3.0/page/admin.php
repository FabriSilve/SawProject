<?php
/**
 * Created by PhpStorm.
 * User: vera
 * Date: 03/06/17
 * Time: 8.53
 */

require("pageStart.php");
require("navbar.php");
?>

<!DOCTYPE html>
<html lang="it">

<head>

    <title>Area amministrativa</title>

</head>


<body>

<div class="jumbotron liteOrange">
    <div class="container text-center">
        <h1>Area amministrativa</h1>
    </div>
</div>

<ul class="breadcrumb">
    <li>
        <a href="#">Vedere Tutti Utenti</a> <span class="divider"></span>
    </li>
    <li>
        <a href="#">AddUser</a> <span class="divider"></span>
    </li>
    <li>
        <a href="#">ModUser</a> <span class="divider"></span>
    </li>
    <li>
        <a href="#">DeleteUser</a> <span class="divider"></span>
    </li>
</ul>


<!--<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <div>Area amministrativa</div>
                <li><a href="#">HomePage</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="#">Spazio</a></li>
            <li class="active"><a href="#">Vedere Tutti Utenti</a></li>
            <li><a href="#">AddUser</a></li>
            <li><a href="#">ModUser</a></li>
            </ul>
        </div>


    </div>
</div>
-->
<?php
function init()
{
    $profileDB = [];
    $count = 0;
    $servername = "localhost";
    $user = "root";
    $pass = "root";
    $dbname = "sawdb";
    $conn = new mysqli($servername, $user, $pass, $dbname);
    if ($conn) {
        return true;
    }


       /** @var TYPE_NAME $conn */
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = 'SELECT * FROM profile';

    $res = $conn->query($query);
    if($res->num_rows > 0) {
        while($row = $res->fetch_row()) {
            $profileDB[$count++] = [$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]];
            echo '<tr>';
            echo '<th>NomeUtente</th>';
            echo '<th>CognomeUtente</th>';
            echo '<th>Email</th>';
            echo '<th>Residenza</th>';
            echo '<th>Auto_Descrizione</th>';
            echo '<th>Link_social</th>';
            echo '</tr>';
        }
    }

    $conn->close();
    return true;
}

?>
<div class="table table-responsive table-striped">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>NomeUtente</th>
            <th>CognomeUtente</th>
            <th>Email</th>
            <th>Residenza</th>
            <th>Auto_Descrizione</th>
            <th>Link_social</th>
        </tr>
        </thead>

        <tr>
            <td>Vera</td>
            <td>Maroz</td>
            <td>wieramoroz@gmail.com</td>
            <td>Genova</td>
            <td>Femmina</td>
            <td>tra la la</td>
        </tr>
</div>

           <!-- <h2 class="sub-header">Informazione degli utenti</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>NomeUtente</th>
                        <th>CognomeUtente</th>
                        <th>Email</th>
                        <th>Residenza</th>
                        <th>Auto_Descrizione</th>
                        <th>Link_social</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Vera</td>
                        <td>Maroz</td>
                        <td>wieramoroz@gmail.com</td>
                        <td>Genova</td>
                        <td>Femmina</td>
                        <td>tra la la</td>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<!--<script src="../../dist/js/bootstrap.min.js"></script>-->
<!--<script src="../../assets/js/docs.min.js"></script>-->
</body>
</html>