<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 23/05/2017
 * Time: 16:14
 */
    require("pageStart.php");
    require("navbar.php");


    $eventDB = [];
    $count = 0;
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "saw";
    $conn = new mysqli($servername, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM events ORDER BY day ASC LIMIT 8";
    $res = $conn->query($query);
    if($res->num_rows > 0) {
        while($row = $res->fetch_row()) {
            //echo "locations[i++] = ['".$row[0]."','".$row[1]."',lat+".$row[2].",lon+".$row[3].",'".$row[4]."'];\r\n";
            $eventDB[$count++] = [$row[0],$row[1],$row[2],$row[3],$row[4]];
        }
    }
    $conn->close();

?>

<div class="jumbotron liteOrange">
    <div class="container text-center">
        <h1>Event Around</h1>
        <p>The events that surround you!</p>
        <?php
            if(isset($logged) && $logged)
                echo "<p>Sai che sei anche loggato? ;)</p>";
        ?>
    </div>
</div>
<br>
<div class="container container-table">
    <div class="row vertical-center-row">
        <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
            <?php require("formSearch.php") ?>
        </div>
    </div>
</div>
<br>
<?php include("mapDrawer.php"); ?>
<br>
<?php include("eventList.php"); ?>
<br>

<?php require("footer.php"); ?>




