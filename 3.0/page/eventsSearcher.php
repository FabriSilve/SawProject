<?php
    $position = "genova";
    $distance = 0.01;
    $days = 2;
    $lat;
    $lon;

    $eventDB = [];
    $count = 0;

    if(isset($_POST['position']) && $_POST['position'] !== "default")
        $position = trim($_POST['position']);

    if(isset($_POST['distance']))
        $distance = trim($_POST['distance'])*0.005;

    if(isset($_POST['days']))
        $days = trim($_POST['days']);

    $Address = urlencode($position);

    set_time_limit(10);
    $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
    if(!($xml = simplexml_load_file($request_url))) {
        //TODO inserire output
        die("not valid address");
    }
    $status = $xml->status;
    if ($status=="OK") {
        $lat = $xml->result->geometry->location->lat;
        $lon = $xml->result->geometry->location->lng;
    } else {
        //TODO INSERIRE OUTPUT
        die("xml status faild: ".$status);
    }
    set_time_limit(15);

    $where_position = "lat BETWEEN (".$lat."-".$distance.") AND (".$lat."+".$distance.") AND ".
        "lon BETWEEN (".$lon."-".$distance.") AND (".$lon."+".$distance.")";
    $where_days = "day BETWEEN CURDATE() AND (CURDATE() + INTERVAL ".$days." DAY) ";

    $sql = "SELECT * FROM Events WHERE (".$where_position.") AND (".$where_days."); ";
    //------------------------

    require("dbAccess.php");
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $eventDB[$count++] = [$row["id"],$row["name"],$row["description"],$row["day"], $row["lat"],$row["lon"], "../uploads/".$row["image"]];
        }
        $conn = null;
    } catch(PDOException $e) {
        //TODO inserire output
        echo "ERROR ".$e->getMessage();
    }
    //-------------------

//TODO RIMASTO QUI


    echo "[";
    echo '{"id":"000",';
    echo '"name":"Your Search",';
    echo '"description":"",';
    echo '"day":"2017-06-06",';
    echo '"address":"word",';
    echo '"image":"default.jpg",';
    echo '"lat":"'.$lat.'",';
    echo '"lon": "'.$lon.'",';
    echo '"owner": "null"}';
    while($row = mysqli_fetch_assoc($result)) {
        echo ',{"id":"'.$row["id"].'",';
        echo '"name":"'.$row["name"].'",';
        echo '"description":"'.$row["description"].'",';
        echo '"day":"'.$row["day"].'",';
        echo '"address":"'.$row["address"].'",';
        echo '"image":'.$row["image"].'",';
        echo '"lat":"'.$row["lat"].'",';
        echo '"lon":"'.$row["lon"].'",';
        echo '"owner":"'.$row["owner"].'"}';
    }
    echo "]";

    $conn->close();

?>