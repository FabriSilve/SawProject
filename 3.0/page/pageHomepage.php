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
        <?php
            if(isset($logged) && $logged)
                echo "<p>Ciao ".$username."!</p>";
        ?>
    </div>

<br>
<div class="container container-table">
    <div class="container row borderRadius liteBackground text-center" id="searchForm">
        <p>
            <input name="position" id="position" placeholder="Position" class="borderRadius padding5">
            <img src="../media/search.png" onclick="searchEvents()" alt="search">
            <img src="../media/filter.png" onclick="showFilter()" alt="filter">
        </p>
        <div id="filter">
            <h2>Distance</h2>
            <input id="distance" name="distance" type="range" min="5" max="50" value="10" step="5" onchange="showValue('distanceRange', this.value)"  title="distance"/>
            <span id="distanceRange">10</span><span> km</span>

            <h2>Days</h2>
            <input id="days" name="days" type="range" min="1" max="7" value="3" step="1" onchange="showValue('daysRange',this.value)"  title="days"/>
            <span id="daysRange">3</span><span> day(s)</span>
        </div>
    </div>
</div>
<br>
    <div class="container-fluid bg-3 text-center">
        <div id="googleMap" class="container map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQO1FBU7ngY0Wv20d3-gPI1sj5_ApCZ3M&callback=myMap"></script>
    </div>
<br>
    <div id="eventsList" class="container"></div>
    <script>drawEventsList(false);</script>
<br>

<?php require("shared/footer.php"); ?>




