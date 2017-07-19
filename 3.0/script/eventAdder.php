<?php
    require("dbAccess.php");

    if(isset($_POST['name']) && $_POST['name'] !== "")
        $name = trim($_POST['name']);
    else
        die("name unset");

    if(isset($_POST['description']) && $_POST['description'] !== "")
        $description = trim($_POST['description']);
    else
        die("description unset");

    if(isset($_POST['address']) && $_POST['address'] !== "")
        $address = trim($_POST['address']);
    else
        die("address unset");

    if(isset($_POST['day']) && $_POST['day'] !== "")
        $day = trim($_POST['day']);
    else
        die("day unset");

    if (!isset($_FILES['image']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
        die("file error");
    }

    if(isset($_POST['owner']) && $_POST['owner'] !== "")
        $owner =$_POST['owner'];
    else
        die("owner unset");

    $lat;
    $lon;

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

        $stmt = $conn->prepare("SELECT id FROM Events WHERE day = :day AND lat = :lat AND lon = :lon");
        $stmt->bindParam(":day",$day);
        $stmt->bindParam(":lat",$lat);
        $stmt->bindParam(":lon",$lon);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            die("Day and position already used");
        }

        $stmt = $conn->prepare("INSERT INTO Events ( name, description, day, address, lat, lon, owner) VALUES ( :name, :description, :day, :address, :lat, :lon, :owner)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description",$description);
        $stmt->bindParam(":day",$day);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":lat",$lat);
        $stmt->bindParam(":lon",$lon);
        $stmt->bindParam(":owner",$owner);
        $stmt->execute();

        $stmt = $conn->prepare("SELECT id FROM Events WHERE day = :day AND lat = :lat AND lon = :lon");
        $stmt->bindParam(":day",$day);
        $stmt->bindParam(":lat",$lat);
        $stmt->bindParam(":lon",$lon);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $image_name = $row['id'];

        $conn = null;


        //upload image
        $image_path = "../uploads/";
        $image_format = ".jpg";
        $image_tmp = $_FILES['image']['tmp_name'];
        $is_img = getimagesize($image_tmp);
        if (!$is_img) {
            die('Puoi inviare solo immagini');
        }
        echo "true";

        /*TODO Farsi dare permessi dalla prof
       if (move_uploaded_file($image_tmp, $image_path . $image_name . $image_format)) {
           echo 'true';
       }else{
           echo 'Upload error!';
       }*/
    } catch(Exception $e) {
        echo "ERROR ".$e->getMessage();
    }
?>