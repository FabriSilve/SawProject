<?php
require("script/dbAccess.php");
require("shared/header.php");
require("shared/navbar.php");
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageUpdateUser.php">Back</a></p>
            </div>
            <?php if (isset($_GET["message"]) && $_GET["message"] !== "") {
                echo '<div class="well">' . $_GET["message"] . '</div>';
            }
            ?>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Edit User Data:</h1>
            <h3>Current user data:</h3>
            <div class="well">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <?php
                    $message = "";
                    try {
                        if (!empty(trim($_POST["username"]))) {
                            $username = htmlspecialchars(trim($_POST["username"]));
                        } else if (!empty(trim($_GET["username"]))) {
                            $username = $_GET["username"];
                        } else {
                            $message = "Invalid username";
                            throw new Exception();
                        }


                        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT username, email  FROM Users NATURAL JOIN Profiles WHERE username = :username;");
                        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr><td>' . $row['username'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                        }

                        if ($stmt->rowCount() !== 1) {
                            $message = "Utente non presente nel sistema";
                            throw new Exception();
                        }
                        $conn = null;
                    } catch (PDOException $e) {
                        $message = "Errore nel database" . " ERROR " . $e->getMessage(); //TODO rimuovere errore in release
                        header("Location: pageUpdateUser.php?message=" . $message);
                    } catch (Exception $e) {
                        header("Location: pageUpdateUser.php?message=" . $message);
                    }
                    ?>
                </table>
            </div>
            <hr>
            <div class="well">
                <h3>Enter the new data:</h3>
                <form method="post" action="script/userMod.php">
                    <input type="text" hidden name="username" id="username" placeholder="username"
                           class="radiusDiv padding5" value="<?php echo $username; ?>">
                    <input type="text" hidden name="email" id="email" placeholder="email"
                           class="radiusDiv padding5" value="<?php echo $email; ?>">
                    <input type="text" name="newUsername" id="newUsername" placeholder="New Username"
                           class="radiusDiv padding5" required>
                    <input type="text" name="newEmail" id="newEmail" placeholder="New Email" class="radiusDiv padding5"
                           required>
                    <p><br><input type="submit" value="Confirmation"></p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require("shared/footer.php");
?>


