<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 23/05/2017
 * Time: 16:14
 */
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
    include("pageStart.php");
    include("navbar.php");
?>

<div class="jumbotron">
    <div class="container text-center">
        <h1>Event Around</h1>
        <p>The events that surround you!</p>
    </div>
</div>

<?php include("mapDrawer.php"); ?>

<?php include("eventList.php"); ?>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>

</body>
</html>


