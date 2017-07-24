<?php
    require("accessControl.php");
    require("dbAccess.php");
    $id = "";
    $check = "";
    $username = "";
    echo "ciao";
    try {
        echo "controllo id";
        if (!isset($_GET['id']) || empty(trim($_GET['id']))) {
            $id="id non valido";
            throw new Exception();
        }
        $id = trim($_GET('id'));

        echo "controllo check";
        if (!isset($_GET['check']) || empty(trim($_GET['check']))) {
            $id="check non valido";
            throw new Exception();
        }
        $check = trim($_GET('check'));
    //TODO sono rimasto qui: provare solo la pagina e capire perche non gli pace id
        echo "controllo username";
        if (!isset($_GET['username']) || empty(trim($_GET['username']))) {
            $username="username non valido";
            throw new Exception();
        }
        $username = $_GET('username');

        echo $username."\r\n";
        echo $id."\r\n";
        echo $check."\r\n";

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
    } catch(Exception $e) {
        echo "Error ".$e->getMessage();
    }
?>