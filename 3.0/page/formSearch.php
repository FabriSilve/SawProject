<?php
    /*TODO
      correggere div filtri ricerca e responsiv dei bottoni
        sostituire testo bottoni con icone
    */
?>

<!--<form name="search-form" onsubmit="searchEvents()" method="post">-->
    <p>
        <!-- todo implementare ricerca nei dintorni partendo da posizione utente-->
        <input type="text" name="position" id="position" placeholder="Position" class="radiusDiv padding5" required>
        <button class="radiusDiv" onclick="searchEvents()">
            <img src="../media/search.png">
        </button>
        <img src="../media/filter.png" onclick="showFilter()" alt="filter">
    </p>
    <div style="display: none;" id="filter">
        <h2>
            Distance
        </h2>
        <input id="distance" name="distance" type="range" min="5" max="50" value="10" step="5" onchange="showValue('distanceRange', this.value)" />
        <span id="distanceRange">10</span><span> km</span>

        <h2>
            Days
        </h2>
        <input id="days" name="days" type="range" min="1" max="7" value="3" step="1" onchange="showValue('daysRange',this.value)" />
        <span id="daysRange">3</span><span> day(s)</span>

        <!--todo implementare o rimuovere
        <h2>
            eventi
        </h2>
        <table class="table">
            <tr>
                <td>
                    <input type="checkbox" name="party" id="party" value="1">
                </td>
                <td class="leftAlign">
                    festa
                </td>
                <td>
                    <input type="checkbox" name="show" id="show" value="1">
                </td>
                <td class="leftAlign">
                    spettacolo
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="art" id="art" value="1">
                </td>
                <td class="leftAlign">
                    mostra
                </td>
                <td>
                    <input type="checkbox" name="sport" id="sport" value="1">
                </td>
                <td class="leftAlign">
                    sport
                </td>
            </tr>
        </table>
        -->
    </div>
<!--</form>-->
