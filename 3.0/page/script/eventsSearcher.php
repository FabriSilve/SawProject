<?php
    require("dbAccess.php");
    header("Content-Type: application/json");

    $position = "genova";
    $distance = 0.01;
    $days = 2;
    $lat = 0;
    $lon = 0;

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
        die("not valid address");
    }
    $status = $xml->status;

    if ($status=="OK") {
        $lat = $xml->result->geometry->location->lat;
        $lon = $xml->result->geometry->location->lng;
    } else {
        //TODO INSERIRE OUTPUT
        die("xml status faild");
    }


    $where_position = "lat BETWEEN (".$lat."-".$distance.") AND (".$lat."+".$distance.") AND ".
        "lon BETWEEN (".$lon."-".$distance.") AND (".$lon."+".$distance.")";
    $where_days = "day BETWEEN CURDATE() AND (CURDATE() + INTERVAL ".$days." DAY) ";

    $sql = "SELECT id, name, description, address, day, lat, lon, owner FROM Events WHERE (".$where_position.") AND (".$where_days."); ";
    //------------------------


    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $count = 0;
        $eventDB[$count++] = array(
            "id" => "000",
            "name" => "You",
            "description" => "",
            "address" => "",
            "day" => "",
            "lat" => "".$lat."",
            "lon" => "".$lon."",
            "image" => "",
            "owner" => ""
        );
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $image_file = "../uploads/default.jpg";
            if(file_exists("../../uploads/".$row["id"].".jpg"))
                $image_file = "../uploads/".$row["id"].".jpg";
            $eventDB[$count++] = array(
                "id" => $row["id"],
                "name" => $row["name"],
                "description" => $row["description"],
                "address" => $row["address"],
                "day" => $row["day"],
                "lat" => $row["lat"],
                "lon" => $row["lon"],
                "image" => $image_file,
                "owner" => $row["owner"]
            );
        }
        echo json_encode($eventDB, JSON_PRETTY_PRINT);
        $conn = null;
    } catch(PDOException $e) {
        echo "ERROR ".$e->getMessage();
    }
?>