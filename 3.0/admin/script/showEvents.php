<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>description</th>
        <th>day</th>
        <th>address</th>
        <th>image</th>
        <!--<th>lat</th>
        <th>lon</th>-->
    </tr>
    </thead>
    <?php
    require("dbAccess.php");
    $error = "";
    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Events");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $image_file = "../uploads/default.jpg";
            if(file_exists("../uploads/".$row["id"].".jpg"))
                $image_file = "../uploads/".$row["id"].".jpg";

            echo '<tr>';
            echo '<td>'.$row["id"].'</td>';
            echo '<td>'.$row["name"].'</td>';
            echo '<td>'.$row["description"].'</td>';
            echo '<td>'.$row["day"].'</td>';
            echo '<td>'.$row["address"].'</td>';
            echo '<td><img src="'.$image_file.'" style="height:100px;"></td>';
            /*echo '<td>'.$row["lat"].'</td>';
            echo '<td>'.$row["lon"].'</td>';*/
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