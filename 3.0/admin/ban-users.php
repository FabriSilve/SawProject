<?php
/**
 * Created by PhpStorm.
 * User: vera
 * Date: 19/07/17
 * Time: 14.45
 */
    if(isset($_POST["username"])) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
    }
    require ("Access.php");
    try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username 
                                                            AND password = :password
                                                            AND banned !=1");
    $stmt = $conn->prepare("UPDATE Users SET  banned=1 WHERE username = :username AND password = :password");
    $stmt->execute();
    $conn = null;
    }
    catch(PDOException $e) {
        echo "ERROR ".$e->getMessage();
    }

?>
