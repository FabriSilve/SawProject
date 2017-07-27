<?php
require("script/dbAccess.php");
require("shared/header.php");
require("shared/navbar.php");
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageUpdateUser.php"> Torna indietro</a></p>
            </div>
            <?php if (isset($_GET["message"]) && $_GET["message"] !== "") {
                echo '<div class="well">' . $_GET["message"] . '</div>';
            }
            ?>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Modifica i dati utente:</h1>
            <h3>Dati attuali:</h3>
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
                            $message = "Username non valido";
                            throw new Exception();
                        }


                        $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT username, email  FROM Users NATURAL JOIN Profiles WHERE username = :username;");
                        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                        $stmt->execute();

                        if ($stmt->rowCount() !== 1) {
                            $message = "Utente non presente nel sistema";
                            throw new Exception();
                        }

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr><td>' . $row['username'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
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
                <h3>Inserisci i nuovi dati:</h3>
                <form method="post" action="userUpdater.php">
                    <input type="text" hidden name="oldUsername" id="username" placeholder="Old Username"
                           class="radiusDiv padding5" value="<?php echo $username; ?>">
                    <input type="text" name="username" id="username" placeholder="New Username"
                           class="radiusDiv padding5" required>
                    <input type="text" name="email" id="email" placeholder="email" class="radiusDiv padding5" required>
                    <input type="password" name="password" id="password" placeholder="Password"
                           class="radiusDiv padding5" required>
                    <h4><br>Conferma il cambiamento:</h4>
                    <p><input type="submit" value="Conferma"></p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require("shared/footer.php");
?>


