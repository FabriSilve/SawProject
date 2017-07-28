<?php
    require("accessControl.php");
    require("dbAccess.php");

    $message = "";
    $conn = null;
    $name = "";
    $description = "";
    $address = "";
    $lat = 0;
    $lon = 0;
    $day = "";
    $owner = "";

    try {
        if (!empty(trim($_POST['name']))) {
            $name = trim($_POST['name']);
        } else {
            $message = "Name not valid";
            throw new Exception();
        }
        if (!empty(trim($_POST['description']))) {
            $description = htmlspecialchars(trim($_POST['description']));
        } else {
            $message = "Description not valid";
            throw new Exception();
        }
        if (!empty(trim($_POST['address']))) {
            $address = trim($_POST['address']);
        } else {
            $message = "Address not valid";
            throw new Exception();
        }
        if (!empty(trim($_POST['day']))) {
            $day = trim($_POST['day']);
        } else {
            $message = "Date not valid";
            throw new Exception();
        }

        if (!isset($_FILES['image']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
            $message = "image not valid";
            throw new Exception();
        }

        if (isset($_SESSION["EAusername"])) {
            $owner = $_SESSION["EAusername"];
        } else {
            $message = "Owner not define";
            throw new Exception();
        }

        $position = urlencode($address);
        $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $position . "&sensor=true";
        if (!($xml = simplexml_load_file($request_url))) {
            $message = "Address not valid";
            throw new Exception();
        }
        $status = $xml->status;
        if ($status == "OK") {
            $lat = $xml->result->geometry->location->lat;
            $lon = $xml->result->geometry->location->lng;
        } else {
            $message = "Address error";
            throw new Exception();
        }
    }catch(Exception $e) {
        header("Location: ../pageAddEvent.php?message=".$message);
        exit;
    }

    try{

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT id FROM Events WHERE day = :day AND lat = :lat AND lon = :lon");
        $stmt->bindParam(":day",$day);
        $stmt->bindParam(":lat",$lat);
        $stmt->bindParam(":lon",$lon);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $message="Day and place already used";
            throw new Exception();
        }

        $stmt = $conn->prepare("SELECT username FROM Users WHERE username = :username");
        $stmt->bindParam(":username",$owner);

        $stmt->execute();
        if($stmt->rowCount() !== 1) {
            $message="User ".$owner." not valid";
            throw new Exception();
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

        $image_path = "../../uploads/";
        $image_format = ".jpg";
        $image_tmp = $_FILES['image']['tmp_name'];
        $is_img = getimagesize($image_tmp);
        if (!$is_img) {
            $message="You can send only image";
            throw new Exception();
        }
        if (move_uploaded_file($image_tmp, $image_path . $image_name . $image_format)) {
            $message = "Event added successfully";
        }else{
            $message = "Update error";
            throw new Exception();
        }

        $conn->commit();
    } catch(PDOException $e) {
        $conn->rollBack();
        $message = "Database error";
    } catch (Exception $e) {
        $conn->rollBack();
    }
    $conn = null;
    header("Location: ../pageAddEvent.php?message=".$message);
?>