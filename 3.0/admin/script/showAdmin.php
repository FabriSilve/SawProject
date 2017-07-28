<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            Username
        </th>
        <th>
            Email
        </th>
    </tr>
    </thead>
    <?php
    require("shared/accessManager.php");
    require("script/dbAccess.php");
    $error = "";
    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT username, email FROM Admin");
        $stmt->execute();
        echo '<h2>Administrators present in the System:</h2><br>';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr><td>'.$row['username'].'</td>';
            echo '<td>'.$row['email'].'</td>';
        }
        $conn = null;
    }
    catch(PDOException $e) {
        $error = "Error in database" . " ERROR " . $e->getMessage(); //TODO rimuovere in release
    }

    echo "</table>";

    if(!empty($error)) {
        echo '<hr><div class="well">'.$error.'</div>';
    }
    ?>
</table>

