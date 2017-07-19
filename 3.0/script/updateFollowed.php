<?php
    require ("dbAccess.php");
    $lat = $_GET['id'];
    $check = $_GET['check'];
    $user = $_GET['username'];
    //TODO inserire controlli input

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($check === "true") {

            $stmt = $conn->prepare("SELECT * FROM Followed WHERE id = :id AND user = :user");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":user", $user);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                die("true");
            }

            $stmt = $conn->prepare("INSERT INTO Followed ( id, user) VALUES ( :id, :user)");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":user", $user);
            $stmt->execute();

            die("true");
        } else if($check === "false") {
            $stmt = $conn->prepare("DELETE FROM Followed WHERE id = :id AND user = :user");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":user", $user);
            $stmt->execute();

            die("delete");

        }
        echo "error";
        $conn = null;
    } catch(PDOException $e) {
        echo "ERROR ".$e->getMessage();
    }
?>