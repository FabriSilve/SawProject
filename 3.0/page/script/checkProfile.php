<?php

require("dbAccess.php");
$error = "";
$username = "";
$password = "";

try {
    $username = trim($_POST["username"]);
    if ((empty($username)) || (!preg_match("/^[ -~]*$/",$username))) {
        $error = "Username error";
        echo "user";
        throw new Exception();
    }

    /*if (!preg_match("/[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]/", $email)) {
        $error = "Email non valida";
        throw new Exception();
    }*/

    if (isset($_POST["email1"]) && $_POST["email1"] !== "") {
        $email = trim($_POST["email1"]);
    } else {
        $error = "Email non inserita";
        throw new Exception();
    }

    //TODO testare espressione regolare
    /*if (!preg_match("/[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]/", $email)) {
        $error = "Email non valida";
        throw new Exception();
    }*/

    if (isset($_POST["password1"]) && $_POST["password1"] !== "") {
        $pass_pre_hash = trim($_POST["password1"]);
    } else {
        $error = "Username non inserito!";
        throw new Exception();
    }

    //TODO controllare espressione regolare
    /*if (!preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/", $pass_pre_hash)) {
        $error = "Password non valida";
        throw new Exception();
    }*/

    $password = password_hash($pass_pre_hash, PASSWORD_BCRYPT);

} catch(Exception $e) {
    header("Location: ../pageRegistration.php?registerError=".$error);
}
try{
    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt_prof = $dbh->prepare("INSERT INTO Profiles (nome, cognome, email, residenza, link_social, auto_descizione) VALUES (:nome, :cognome, :email, :residenza, :link_social, :auto_descizione);");

    {
        $stmt_prof->bindParam(':nome', $nome);
        $stmt_prof->bindParam(':cognome', $cognome);
        $stmt_prof->bindParam(':email', $email);
        $stmt_prof->bindParam(':residenza', $residenza);
        $stmt_prof->bindParam(':link_social', $link_social);
        $stmt_prof->bindParam(':auto_descizione', $auto_descizione);

        $nome = trim($_POST["nome"]);
        $cognome = trim($_POST["cognome"]);
        $email = trim($_POST["email"]);
        $residenza = trim($_POST["residenza"]);
        $link_social = trim($_POST["link_social"]);
        $auto_descizione = trim($_POST["auto_descizione"]);

        $profile_arr = array($nome, $cognome, $email, $residenza);

        foreach ($profilo_arr as $i) {
            if (empty($i)){
                $profileErr = "Empty field found.";
                throw new Exception();
            }
            if (!preg_match("/^[ -~]*$/",$i)){
                $profileErr = $i + " : invalid format.";
                throw new Exception();
            }
        }

        if (!filter_var($link_social, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED)){
            $profileErr = $link_social + " : invalid format.";
            throw new Exception();
        }

        $stmt_prof->execute();
    }

    $conn = null;

    if(isset($_COOKIE['EAkeep'])) {
        setcookie('EAkeep',null);
    }
    if(isset($_COOKIE['EAusername'])) {
        setcookie('EAusername',null);
    }
    session_unset();
    session_destroy();
    session_start();
    $_SESSION["EAauthorized"] = 1;
    $_SESSION["EAusername"] = $username;
    header("Location: ../pageHomepage.php");

}
catch(PDOException $e){
    $error=  "Error: " . $e->getMessage(); //for debug only ****TO BE REMOVED****
    header("Location: ../pageRegistration.php?registerError=".$error);
}
?>
