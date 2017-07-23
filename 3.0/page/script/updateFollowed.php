<?php
    require("accessControl.php");
    require("dbAccess.php");
    $id = "";
    $check = "";
    $username = "";

    try {
        if (!isset($_GET["id"]) || empty(trim($_GET["id"]))) {
            $id="id non valido";
            throw new Exception();
        }
        $id = $_GET("id");

        if (!isset($_GET["check"]) || empty(trim($_GET["check"]))) {
            $id="check non valido";
            throw new Exception();
        }
        $check = $_GET("check");

        if (!isset($_GET["username"]) || empty(trim($_GET["username"]))) {
            $username="username non valido";
            throw new Exception();
        }
        $username = $_GET("username");

        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($check === "true") {

            $stmt = $conn->prepare("SELECT * FROM Followed WHERE id = :id AND user = :user");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":user", $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                die("true");
            }

            $stmt = $conn->prepare("INSERT INTO Followed ( id, user) VALUES ( :id, :user)");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":user", $username);
            $stmt->execute();

            die("true");
        } else if($check === "false") {
            $stmt = $conn->prepare("DELETE FROM Followed WHERE id = :id AND user = :user");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":user", $username);
            $stmt->execute();

            die("delete");

        }
        echo "error";
        $conn = null;
    } catch(PDOException $e) {
        echo "ERROR ".$e->getMessage();
    }
?>