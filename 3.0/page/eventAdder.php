<?php
    require("dbAccess.php");

    $name = trim($_GET['name']);
    $description = trim($_GET['description']);
    $day = trim($_GET['day']);
    $address = trim($_GET['address']);
    $image = "default.jpg"; //trim($_GET['image']);
    $owner = trim($_GET['owner']);
    $lat;
    $lon;

    //TODO aggiungere controllo se settati o meno

    $position = urlencode($address);
    $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$position."&sensor=true";
    if(!($xml = simplexml_load_file($request_url))) {
        die("Not valid address");
    }
    $status = $xml->status;
    if ($status=="OK") {
        $lat = $xml->result->geometry->location->lat;
        $lon = $xml->result->geometry->location->lng;
    } else {
        die($status);
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT name FROM Events WHERE day = :day AND lat = :lat AND lon = :lon");
        $stmt->bindParam(":day",$day);
        $stmt->bindParam(":lat",$lat);
        $stmt->bindParam(":lon",$lon);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            die("Day and position already used");
        }

        $stmt = $conn->prepare("INSERT INTO Events ( name, description, image, day, address, lat, lon, owner) VALUES ( :name, :description, :image, :day, :address, :lat, :lon, :owner)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description",$description);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":day",$day);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":lat",$lat);
        $stmt->bindParam(":lon",$lon);
        $stmt->bindParam(":owner",$owner);
        $stmt->execute();

        echo "true";

        $conn = null;
    } catch(PDOException $e) {
        echo "ERROR ".$e->getMessage();
    }
?>