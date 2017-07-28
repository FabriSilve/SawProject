<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Number of users</th>
        <th>Number of events</th>
        <th>Number of marked event</th>
        <th>ID of last event entered</th>
        <th>The last user entered</th>
         </tr>
    </thead>
<?php
require("shared/accessManager.php");
require("script/dbAccess.php");
$error = "";
try {
    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT COUNT(username) as username FROM Users");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>'.$row["username"].'</td>';
    }
    $stmt = $conn->prepare("SELECT COUNT(id) as id FROM Events");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<td>'.$row["id"].'</td>';
    }
    $stmt = $conn->prepare("SELECT COUNT(id) as id FROM Signaled");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<td>'.$row["id"].'</td>';
    }
    $stmt = $conn->prepare("SELECT MAX(id) as id FROM Events");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<td>' . $row["id"] . '</td>';
    }
    $stmt = $conn->prepare("SELECT MAX(username) as username FROM Users");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<td>'.$row["username"].'</td>';
        echo '</tr>';
    }
    $conn = null;
}
catch(PDOException $e) {
    $error = "ERROR ".$e->getMessage();
}

echo '</table>';

if(!empty($error)) {
    echo '<div class="well">'.$error.'</div>';
}
?>