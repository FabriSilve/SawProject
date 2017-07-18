<?php

    if(isset($_POST['username']))
        $username = trim($_POST['username']);

    require("Access.php");

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("DELETE FROM Users WHERE username = :username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $conn = null;
        echo "eliminato";
        require("admin.php");
    }
    catch(PDOException $e) {
        echo "ERROR ".$e->getMessage();
    }

?>