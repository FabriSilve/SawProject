<?php
require("script/dbAccess.php");
require("shared/header.php");
require("shared/navbar.php");
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageDashboard.php"> Torna indietro</a></p>
            </div>
            <?php if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                echo '<div class="well">'.$_GET["message"].'</div>';
            }
            ?>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Modifica i dati utente:</h1>
            <form method="post" action="script/userUpdater.php"> <!--TODO inserire richiesta di conferma operazione-->
                <h3>Dati attuali:</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                    <?php
                        $username = "";
                        if(isset($_GET["message"]) && isset($_GET["username"])) {
                            $username = $_GET['username'];
                        }
                        $message = "";
                        try {
                            if($username == "") {
                                if (!isset($_POST["username"]) || empty(trim($_POST["username"]))) {
                                    $message = "Username non valido";
                                    throw new Exception();
                                }
                                $username = trim($_POST["username"]);
                            }

                            $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username;");
                            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                            $stmt->execute();
                            if($stmt->rowCount() !== 1) {
                                $message = "utente non presente";
                                throw new Exception();
                            }
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            echo '<tr>';
                            echo '<td>'.$row["username"].'</td>';
                            echo '<td>'.$row["email"].'</td>';
                            echo '<td>******** </td>';
                            echo '</tr>';
                            echo '<input type="text" name="oldUsername" value="'.$row["username"].'" hidden>';

                            $conn = null;
                        }
                        catch(PDOException $e) {
                            $message = "Errore nel database". " ERROR ".$e->getMessage(); //TODO rimuovere errore in release
                            header("Location: pageUpdateUser.php?message=".$message);
                        } catch(Exception $e) {
                            header("Location: pageUpdateUser.php?message=".$message);
                        }
                    ?>
                </table>
                <h3>Inserisci i nuovi dati:</h3>
                <p>
                    <input type="text" name="newUsername" id="username" placeholder="Username" class="radiusDiv padding5" required>
                    <input type="email" name="email" id="email" placeholder="Email" class="radiusDiv padding5" required>
                    <input type="password" name="password" id="password" placeholder="Password" class="radiusDiv padding5" required>
                    <input type="submit" value="Modificare">
                </p>
            </form>
            <hr>
        </div>
    </div>
</div>

<?php
    require("shared/footer.php");
?>


