<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 29/05/2017
 * Time: 22:37
 */

    /*TODO
      correggere div filtri ricerca e responsiv dei bottoni
        sostituire testo bottoni con icone
    */
?>

<form name="search-form" onsubmit="return checkSearch()" method="post" action="homepage.php">
    <p>
        <input type="text" name="position" id="position" placeholder="Città" class="radiusDiv padding5">
        <button type="submit" class="radiusDiv">
            <img src="../media/search.png">
        </button>
        <img src="../media/filter.png" onclick="showFilter()" alt="filter">
    </p>
    <div style="display: none;" id="filter">
        <input type="hidden" name="lat" id="lat" value="" >
        <input type="hidden" name="lon" id="lon" value="" >
        <h2>
            distance
        </h2>
        <input name="distance" type="range" min="5" max="50" value="10" step="5" onchange="showValue(this.value)" />
        <span id="range">10 km</span>

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
    </div>
</form>
