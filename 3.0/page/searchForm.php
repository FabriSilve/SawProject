
    <p>
        <input type="text" name="position" id="position" placeholder="Position" class="radiusDiv padding5">
        <button class="radiusDiv" onclick="searchEvents()">
            <img src="../media/search.png">
        </button>
        <img src="../media/filter.png" onclick="showFilter()" alt="filter">
    </p>
    <div style="display: none;" id="filter">
        <h2>
            Distance
        </h2>
        <input id="distance" name="distance" type="range" min="5" max="50" value="10" step="5" onchange="showValue('distanceRange', this.value)"  title="distance"/>
        <span id="distanceRange">10</span><span> km</span>

        <h2>
            Days
        </h2>
        <input id="days" name="days" type="range" min="1" max="7" value="3" step="1" onchange="showValue('daysRange',this.value)"  title="days"/>
        <span id="daysRange">3</span><span> day(s)</span>
    </div>
