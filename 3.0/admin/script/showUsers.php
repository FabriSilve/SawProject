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
            $stmt = $conn->prepare("SELECT username, email FROM Users NATURAL JOIN Profiles");
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr><td>'.$row['username'].'</td>';
                echo '<td>'.$row['email'].'</td>';
            }
            $conn = null;
        }
        catch(PDOException $e) {
            $error = "An Error has occurred, please retry";
        }

        echo "</table>";

        if(!empty($error)) {
            echo '<hr><div class="well">'.$error.'</div>';
        }
    ?>
</table>

