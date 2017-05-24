<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 23/05/2017
 * Time: 16:19
 */
?>
<!--<section style="width:100%; height:100%;">-->

    <div id="googleMap" style="width:100%;height: 400px;"></div>

    <script>
        function myMap() {
            //chiedo permesso per ricevere posizione
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showMap, error);
            } else {
                alert("geolocalizetion not supported");
            }
        }

        function showMap (position) {
            var lat= position.coords.latitude;
            var lon= position.coords.longitude;

            var mapCenter = new google.maps.LatLng(lat,lon);
            var mapZoom = 15;

            alert(lon+" "+lat);
            //specifico proprietà mappa e creo oggetto google.maps.Map
            var mapProp= {
                center: mapCenter,
                zoom:mapZoom,
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

            //specifico proprietà marker e creo oggetto google.maps.Marker
            var marker = new google.maps.Marker({
                position: mapCenter,
                //animation:google.maps.Animation.BOUNCE
                //icon: '../media/map-marker-orange.png',
            });

            marker.setMap(map);

            //creo infowindow su marker
            var infowindow = new google.maps.InfoWindow({
                content:"tu sei qui"
            });

            infowindow.open(map,marker);

            //definisco un listener sul marker
            google.maps.event.addListener(marker,'click',function() {
                var pos = map.getZoom();
                map.setZoom(18);
                map.setCenter(marker.getPosition());

                //dopo tre secondi faccio tornare lo zoom della mappa normale
                window.setTimeout(function() {map.setZoom(pos);},3000);
            });
        }

        function error(msg) {
            alert('error in geolocation');
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQO1FBU7ngY0Wv20d3-gPI1sj5_ApCZ3M&callback=myMap"></script>



<!--</section>-->
