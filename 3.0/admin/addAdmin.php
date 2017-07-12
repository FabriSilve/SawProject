<?php
/**
 * Created by PhpStorm.
 * User: vera
 * Date: 12/07/17
 * Time: 19.40
 */
require ("Access.php");

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbName", $dbUser, $dbPass);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepared statements
    $stmt_acc = $dbh->prepare("INSERT INTO Users (username, email, password) VALUES (:username, :email, :password);");

    $dbh->beginTransaction();

    /****** accounts BLOCK ******/
    {
        $stmt_acc->bindParam(':username', $username);
        $stmt_acc->bindParam(':email', $email);
        $stmt_acc->bindParam(':password', $password);

        $username = trim($_POST["username"]);

        if ((empty($username)) || (!preg_match("/^[ -~]*$/",$username))) {
            $userErr = "Username error";
            echo "username";
            throw new Exception();
        }

        $email = trim($_POST["email1"]);

        if ((empty($email))) { /*|| (!preg_match("/[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]/",$email))) {*/
            $emailErr = "email error";
            echo "email";
            throw new Exception();
        }

        $pass_pre_hash = trim($_POST["password1"]);

        if(empty($pass_pre_hash)){
            $passErr = "Password is required";
            echo "pass empty";
            throw new Exception();
        }

        $password = password_hash($pass_pre_hash, PASSWORD_BCRYPT);

        $stmt_acc->execute();
    }


    $dbh->commit();
    echo '<h2> L`utente admin e` agguinto con successo!<h2>';


}
catch(PDOException $e){
    $dbh->rollback();
    echo "Error: " . $e->getMessage(); //for debug only ****TO BE REMOVED****
    echo '<h2> E` verificato un errore. Riprova<h2>';

}
catch(Exception $k){
    $dbh->rollback();
    if (isset($userErr))
        echo $userErr;
    if (isset($passErr))
        echo $passErr;
    if (isset($profileErr))
        echo $profileErr;
    echo "expeption";
}
$dbh = null;  //termino la connessione.

?>