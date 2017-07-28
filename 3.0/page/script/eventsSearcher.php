<?php
    /*
     * script che restituisce un json contenente le informazioni degli eventi risultati
     * da una ricerca con determinati parametri
     */

    require("dbAccess.php");
    header("Content-Type: application/json");

    $position = "";
    $distance = 0.01;
    $days = 2;
    $lat = 0;
    $lon = 0;

    $eventDB = [];
    $count = 0;

    if(!empty(trim($_GET['position'])))
        if(preg_match("^[a-zA-Z0-9]+$^",trim($_GET['position'])))
            $position = trim($_GET['position']);

    if(!empty(trim($_GET['distance'])))
        $distance = trim($_GET['distance'])*0.005;

    if(!empty(trim($_GET['days'])))
        $days = trim($_GET['days']);

    if($position === "" && !empty(trim($_GET['lat'])) && !empty(trim($_GET['lon']))) {
        $lat = trim($_GET['lat']);
        $lon = trim($_GET['lon']);
    } else {
        if ($position === "") {
            $position = "genova";
        }
        $address = urlencode($position);
        $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $address . "&sensor=true";
        if (!($xml = simplexml_load_file($request_url))) {
            echo '[]';
            exit;
        }
        $status = $xml->status;
        if ($status == "OK") {
            $lat = $xml->result->geometry->location->lat;
            $lon = $xml->result->geometry->location->lng;
        } else {
            echo '[]';
            exit;
        }
    }

    $sql = "SELECT id, name, description, address, day, lat, lon, owner FROM Events WHERE 
            (lat BETWEEN (:lat-:distance) AND (:lat+:distance) AND lon BETWEEN (:lon-:distance) AND (:lon+:distance)) AND
            (day BETWEEN CURDATE() AND (CURDATE() + INTERVAL :days DAY)); ";

    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":lat", $lat);
        $stmt->bindParam(":lon", $lon);
        $stmt->bindParam(":distance", $distance);
        $stmt->bindParam(":days", $days);
        $stmt->execute();

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
        echo "[]";
    }
?>