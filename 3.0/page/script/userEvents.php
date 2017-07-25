<?php
    require("accessControl.php");
    $eventDB = array();
    $count = 0;
    $message = "";
    require("dbAccess.php");
    try {
        if(!isset($_SESSION["EAusername"])) {
            $message = "username non valido";
            throw new Exception();
        }
        $username = $_SESSION["EAusername"];

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT id, name, description, address, day, lat, lon FROM Events WHERE owner = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $eventDB[$count++] = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $image_file = "../uploads/default.jpg";
            if (file_exists("../uploads/" . $row["id"] . ".jpg"))
                $image_file = "../uploads/" . $row["id"] . ".jpg";
            $eventDB[$count++] = array(
                "id" => $row["id"],
                "name" => $row["name"],
                "description" => $row["description"],
                "address" => $row["address"],
                "day" => $row["day"],
                "lat" => $row["lat"],
                "lon" => $row["lon"],
                "image" => $image_file
            );
        }
        echo json_encode($eventDB, JSON_PRETTY_PRINT);
        $conn = null;
    } catch(PDOException $e) {
        $message = "ERROR ".$e->getMessage();
    } catch(Exception $e) {
        echo "[{}]; /*".$message."*/";
    }
?>