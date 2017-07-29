<?php
    /*
     * HOMEPAGE
     *      - visualizza eventi più seguiti del sistema
     *      - ricerca eventi con filti
     *      - se autorizzati:
     *          + seguire un evento
     *          + segnalare un evento
     *          + accedere al profilo del proprietario dell'evvento
     */

    require("shared/accessManager.php");
    require("shared/header.php");
?>
    <script>
        var events = <?php require("script/mainEvents.php"); ?>;
    </script>

    <div class="container text-center liteOrange borderRadius">
        <h1>Event Around</h1>
        <p>The events that surround you!</p>
    </div>

<br>
<div class="container container-table">

</div>


<br>

<?php require("shared/footer.php"); ?>




