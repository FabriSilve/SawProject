<?php
    /*
     * - header di tutte le pagine in cui importo i file js, stile e bootstrap
     * - inizializzo variabile owner glogale js con username utente
     */
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="icon" href="../media/icon.png" type="image/png" />
    <title>Event Around</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../js/inputChecker.js"></script>
    <script src="../js/eventSearcher.js"></script>
    <script src="../js/eventMap.js"></script>
    <script src="../js/eventsList.js"></script>
    <script src="../js/addEvent.js"></script>
    <script src="../js/utils.js"></script>
    <script src="../js/updateFollowed.js"></script>
    <script src="../js/signalEvent.js"></script>
    <script src="../js/eventModify.js"></script>
    <script src="../js/eventDelete.js"></script>
    <script src="../js/drawUserData.js"></script>
    <script src="../js/messageForm.js"></script>

    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script>
        var owner = "<?php if(isset($_SESSION["EAusername"])) echo htmlspecialchars($_SESSION["EAusername"]); else echo 0; ?>";
    </script>
</head>
<body class="mainbody">
    <?php require("navbar.php"); ?>

