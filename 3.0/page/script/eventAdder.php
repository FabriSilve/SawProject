<?php
    require("accessControl.php");
    require("dbAccess.php");
    $message = "";
    $conn;
    $name = "";
    $description = "";
    $address = "";
    $day = "";
    $owner = "";


    try {
        if (isset($_POST['name']) && $_POST['name'] !== "") {
            $name = trim($_POST['name']);
        } else {
            $message = "Nome non inserito";
            throw new Exception();
        }

        if (isset($_POST['description']) && $_POST['description'] !== "") {
            $description = trim($_POST['description']);
        } else {
            $message = "Descrizione non inserita";
            throw new Exception();
        }

        if (isset($_POST['address']) && $_POST['address'] !== "") {
            $address = trim($_POST['address']);
        } else {
            $message = "Indirizzo non inserito";
            throw new Exception();
        }

        if (isset($_POST['day']) && $_POST['day'] !== "") {
            $day = trim($_POST['day']);
        } else {
            $message = "Data non inserita";
            throw new Exception();
        }

        if (!isset($_FILES['image']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
            $message = "Immagine non inserita";
            throw new Exception();
        }

        if (isset($_SESSION["EAusername"])) {
            $owner = $_SESSION["EAusername"];
        } else {
            $message = "Proprietario non definito";
            throw new Exception();
        }

        $lat = 0;
        $lon = 0;

        $position = urlencode($address);
        $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $position . "&sensor=true";
        if (!($xml = simplexml_load_file($request_url))) {
            $message = "Indirizzo non valido";
            throw new Exception();
        }
        $status = $xml->status;
        if ($status == "OK") {
            $lat = $xml->result->geometry->location->lat;
            $lon = $xml->result->geometry->location->lng;
        } else {
            $message = "Errore indirizzo";
            throw new Exception();
        }
    }catch(Exception $e) {
        echo $message;
        header("Location: ../pageAddEvent.php?message=".$message);
        die();
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
            $message="Giorno e luogo già utilizzati";
            throw new Exception();
        }

        $stmt = $conn->prepare("SELECT username FROM Users WHERE username = :username");
        $stmt->bindParam(":username",$owner);

        $stmt->execute();
        if($stmt->rowCount() !== 1) {
            $message="Utente ".$owner." non trovato";
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

        //upload image
        $image_path = "../../uploads/";
        $image_format = ".jpg";
        $image_tmp = $_FILES['image']['tmp_name'];
        $is_img = getimagesize($image_tmp);
        if (!$is_img) {
            $message="Puoi inviare solo immagini";
            throw new Exception();
        }

        if (move_uploaded_file($image_tmp, $image_path . $image_name . $image_format)) {
            $message = "Evento Inserito con successo";
        }else{
            $message = "Errore update";
            throw new Exception();
        }

        $conn->commit();
    } catch(PDOException $e) {
        $conn->rollBack();
        $message = "ERROR ".$e->getMessage();
    } catch (Exception $e) {
        $conn->rollBack();
    }
    $conn = null;
    header("Location: ../pageAddEvent.php?message=".$message);
?>