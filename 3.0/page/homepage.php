<?php
    require("coockieSessionChecker.php");
    require("header.php");
    require("navbar.php");

    //isolare accesso db
    $eventDB = [];
    $count = 0;
    require("dbAccess.php");
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //TODO trasformare in query per eventi più seguiti
        $stmt = $conn->prepare("SELECT id, name, description, day, lat, lon, image FROM Events ORDER BY day ASC LIMIT 8");
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $eventDB[$count++] = [$row["id"],$row["name"],$row["description"],$row["day"], $row["lat"],$row["lon"], "../uploads/".$row["image"]];
        }
        $conn = null;
    } catch(PDOException $e) {
        echo "ERROR ".$e->getMessage();
    }


?>

<div class="jumbotron liteOrange">
    <div class="container text-center">
        <h1>Event Around</h1>
        <p>The events that surround you!</p>
        <?php
            if(isset($logged) && $logged)
                echo "<p>Ciao ".$username."!</p>";
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




