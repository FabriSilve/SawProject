<?php
    $eventDB = array();
    $count = 0;
    require("dbAccess.php");
    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT id, name, description, address, day, lat, lon, owner FROM Events NATURAL JOIN Followed WHERE day > CURDATE() GROUP BY(id) ORDER BY Count(username) ASC LIMIT 10");
        $stmt->execute();
        $eventDB[$count++] = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $image_file = "../uploads/default.jpg";
            if(file_exists("../uploads/".$row["id"].".jpg"))
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
        /*header("Content-Type: application/json");*/
        echo json_encode($eventDB, JSON_PRETTY_PRINT);
        $conn = null;
    } catch(Exception $e) {
        echo "[{}]; //ERROR ".$e->getMessage();
    }
?>