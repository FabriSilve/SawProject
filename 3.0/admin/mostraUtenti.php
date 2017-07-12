<?php
/**
 * Created by PhpStorm.
 * User: vera
 * Date: 12/07/17
 * Time: 17.21
 */
require("../page/dbAccess.php");
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
    $query = "SELECT * FROM Users";
    $stmt = $dbh->prepare($query);
    $stmt->execute();


}
?>