<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 23/05/2017
 * Time: 16:19
 */

?>

<div class="container-fluid bg-3 text-center">
    <div id="googleMap" style="width:100%;height: 400px; border-radius: 20px; overflow: hidden;" ></div>

    <script language="javascript">

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

            //specifico proprietà mappa e creo oggetto google.maps.Map
            var mapProp= {
                center: mapCenter,
                zoom:mapZoom,
                disableDefaultUI: true
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

            //specifico proprietà marker e creo oggetto google.maps.Marker
            var marker = new google.maps.Marker({
                position: mapCenter,
                animation:google.maps.Animation.DROP,
                icon: '../media/map-marker-red.png',
            });

            marker.setMap(map);

            //creo infowindow su marker
            var infowindow = new google.maps.InfoWindow({
                content:"you are here"
            });

            //definisco un listener sul marker
            google.maps.event.addListener(marker,'click',function() {
                var pos = map.getZoom();
                map.setZoom(18);
                map.setCenter(marker.getPosition());
                infowindow.open(map,marker);

                //dopo tre secondi faccio tornare lo zoom della mappa normale
                window.setTimeout(function() {
                    map.setZoom(pos);
                    infowindow.close();
                },3000);
            });

            var locations = new Array();
            var i = 0;

            <?php
                for($i = 0; $i < $count; $i++) {
                    echo "locations[i++] = ['".$eventDB[$i][0]."','".$eventDB[$i][1]."',lat+".$eventDB[$i][2].",lon+".$eventDB[$i][3].",'".$eventDB[$i][4]."'];\r\n";
                }
            ?>

            for (var j = 0; j < locations.length; j++) {
                var event = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[j][2], locations[j][3]),
                    map: map,
                    icon: '../media/map-marker-orange.png',
                    animation:google.maps.Animation.DROP,
                });

                google.maps.event.addListener(event, 'click', (function(event, j) {
                    return function() {
                        var eventName = new google.maps.InfoWindow({
                            content: locations[j][0]
                        });
                        eventName.open(map, event);
                        var center = map.getCenter();
                        var zoom = map.getZoom();
                        map.setZoom(18);
                        map.setCenter(event.getPosition());
                        window.setTimeout(function() {
                            map.setZoom(zoom);
                            map.setCenter(center);
                            //infowindow.close();
                        },3000);
                        window.setTimeout(function() {
                            eventName.close();
                            document.getElementById(locations[j][0]).scrollIntoView();
                        },5000);

                    }
                })(event, j));
            }
        }

        function error(msg) {
            alert('error in geolocation');
        }
    </script>

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQO1FBU7ngY0Wv20d3-gPI1sj5_ApCZ3M&callback=myMap"></script>

</div>

