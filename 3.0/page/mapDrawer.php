<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 23/05/2017
 * Time: 16:19
 */
?>
<section style="width:100%; height:100%;">

    <div id="map" style="width:100%;height:100%;">

    </div>
    <script>
        map = new OpenLayers.Map("map");
        map.addLayer(new OpenLayers.Layer.OSM());
        map.zoomToMaxExtent();
    </script>
</section>
