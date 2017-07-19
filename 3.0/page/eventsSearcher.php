<?php
    header("Content-Type: application/json");

    $position = "genova";
    $distance = 0.01;
    $days = 2;
    $lat;
    $lon;

    $eventDB = [];
    $count = 0;

    if(isset($_GET['position']) && $_GET['position'] !== "default")
        $position = trim($_GET['position']);

    if(isset($_GET['distance']))
        $distance = trim($_GET['distance'])*0.005;

    if(isset($_GET['days']))
        $days = trim($_GET['days']);

    $Address = urlencode($position);


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
        $count = 0;
        $eventDB[$count++] = array(
            "id" => "000",
            "name" => "You",
            "descriptione" => "",
            "address" => "",
            "day" => "",
            "lat" => "".$lat."",
            "lon" => "".$lon."",
            "image" => ""
        );
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $eventDB[$count++] = array(
                "id" => $row["id"],
                "name" => $row["name"],
                "description" => $row["description"],
                "address" => $row["address"],
                "day" => $row["day"],
                "lat" => $row["lat"],
                "lon" => $row["lon"],
                "image" => "../uploads/".$row["image"]
            );
        }
        echo json_encode($eventDB, JSON_PRETTY_PRINT);

        /*echo "[";
        echo '{"id":"000",';
        echo '"name":"Your Search",';
        echo '"description":"",';
        echo '"day":"2017-06-06",';
        echo '"address":"word",';
        echo '"image":"default.jpg",';
        echo '"lat": "'.$lat.'",';
        echo '"lon": "'.$lon.'",';
        echo '"owner": "null"}';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $eventDB[$count++] = [$row["id"],$row["name"],$row["description"],$row["day"], $row["lat"],$row["lon"], "../uploads/".$row["image"]];
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
        echo "]";*/
        $conn = null;
    } catch(PDOException $e) {
        //TODO inserire output
        echo "ERROR ".$e->getMessage();
    }
?>