<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>The marked event</th>
        <th>User</th>
        <th>Image</th>
        <th>Email</th>
    </tr>
    </thead>
<?php
require("shared/accessManager.php");
require("script/dbAccess.php");
$error = "";
try {
    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, username, email FROM Signaled NATURAL JOIN  Users NATURAL JOIN Profiles");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $image_file = "../uploads/default.jpg";
        if(file_exists("../uploads/".$row["id"].".jpg"))
            $image_file = "../uploads/".$row["id"].".jpg";

        echo '<tr>';
        echo '<td>'.$row["id"].'</td>';
        echo '<td>'.$row["username"].'</td>';
        echo '<td><img src="'.$image_file.'" style="height:100px;"></td>';
        echo '<td>'.$row["email"].'</td>';
        echo '</tr>';
    }
    $conn = null;
}
catch(PDOException $e) {
    $error = "ERROR ".$e->getMessage();
}

echo '</table>';
echo '<hr>';

if(!empty($error)) {
    echo '<div class="well">'.$error.'</div>';
}
?>