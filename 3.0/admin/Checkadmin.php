<?php
    if(isset($_POST["keepme"]))
        $keep = $_POST["keepme"];
    else
        $keep = 0;
//$_SESSION['type'] = 'user';
//if ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'user'){
//echo 'действие только для пользователя или админа';

if(isset($_POST["username"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
}
require("dbAccess.php");

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT password FROM Users WHERE username = :username;";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $passw = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($passw = password_hash($pass_corr, PASSWORD_BCRYPT)) {
        session_start();
        $_SESSION['auth'] = true;
        if ($_SESSION[$username] == 'admin' && and $_SESSION['staus'] == 10) {
            $_SESSION["authorized"] = 2;
            if ($keep == 1) {
                setcookie('EAkeep', 'true', time() + 86400);
                setcookie("EAusername", $username, time() + 86400);
            }
        }
    }
    $dbh->commit();

    if(isset($_COOKIE['EAkeep'])) {
        setcookie('EAkeep',null);
    }
    if(isset($_COOKIE['EAusername'])) {
        setcookie('EAusername',null);
    }

    //session_unset();
    //session_destroy();
    //session_start();
    //$_SESSION["authorized"] = 2;

else
    throw new Exception();
}

catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
$dbh = null;
?>