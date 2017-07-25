<?php

require("dbAccess.php");

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt_prof = $conn->prepare("INSERT INTO Profiles (username, nome, cognome, email, residenza, link_social, auto_descizione) VALUES (:nome, :cognome, :email, :residenza, :link_social, :auto_descizione);");

    $stmt_prof->bindParam(':username', $username);
    $stmt_prof->bindParam(':nome', $nome);
    $stmt_prof->bindParam(':cognome', $cognome);
    $stmt_prof->bindParam(':email', $email);
    $stmt_prof->bindParam(':residenza', $residenza);
    $stmt_prof->bindParam(':link_social', $link_social);
    $stmt_prof->bindParam(':auto_descizione', $auto_descizione);

    $username = $_SESSION["EAusername"];
    $nome = trim($_POST["nome"]);
    $cognome = trim($_POST["cognome"]);
    if (!empty($_POST["email1"])  && preg_match("/[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]/", $_POST["email1"]) && ($_POST["email1"] == $_POST["email2"])) {
        $email = trim($_POST["email1"]);
    } else {
        $error = "Email non valida";
        throw new Exception();
    }
    $residenza = trim($_POST["residenza"]);
    $link_social = trim($_POST["link_social"]);
    $auto_descizione = trim($_POST["auto_descizione"]);


    $profile_arr = array($nome, $cognome, $residenza);

    foreach ($profilo_arr as $i) {

        if (!preg_match("/^[ -~]*$/",$i)){
            $error = $i + " : invalid format.";
            throw new Exception();
        }
    }

    if (!filter_var($link_social, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED)){
        $error = "Link_social invalid format.";
        throw new Exception();
    }

    $stmt_prof->execute();
    $conn = null;

    //header("Location: ../MyProfile.php");

}
catch(PDOException $e){
    //$error=  "Error: " . $e->getMessage(); //for debug only ****TO BE REMOVED****
    $error = "k";
    header("Location: ../pageProfile.php?profileError=".$error);
}
catch(Exception $e) {
    header("Location: ../pageProfile.php?profileError=".$error);
}
?>
