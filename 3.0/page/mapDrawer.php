<div class="container-fluid bg-3 text-center">
    <div id="googleMap" style="width:100%;height: 400px; border-radius: 20px; overflow: hidden;" ></div>

    <script language="javascript">

       function myMap() {
            //chiedo permesso per ricevere posizione
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(setPosition, error);
            } else {
                alert("geolocalizetion not supported");
            }
        }

        function error(error) {
            alert('error in geolocation: '+error);
            switch(error.code) {

                case error.PERMISSION_DENIED:
                    console.log("Permesso negato dall'utente");
                    break;

                case error.POSITION_UNAVAILABLE:
                    console.log("Impossibile determinare la posizione corrente");
                    break;

                case error.TIMEOUT:
                    console.log("Il rilevamento della posizione impiega troppo tempo");
                    break;

                case error.UNKNOWN_ERROR:
                    console.log("Si è verificato un errore sconosciuto");
                    break;
            }
            showMap(44.402547, 8.972054);
        }

        function setPosition(position) {
            showMap(position.coords.latitude, position.coords.longitude );
        }

        function showMap (latitude, longitude) {
            var lat= latitude;
            var lon= longitude;

            var mapCenter = new google.maps.LatLng(lat,lon);
            var mapZoom = 12;

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
                map.setZoom(14);
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
                //TODO selezionare da ecent solo le informazioni utilizzate
                for($i = 0; $i < $count; $i++) {
                    echo "locations[i++] = [
                        '".$eventDB[$i][0]."',
                        '".$eventDB[$i][1]."',
                        '".$eventDB[$i][2]."',
                        '".$eventDB[$i][3]."',
                        ".$eventDB[$i][4].",
                        ".$eventDB[$i][5].",
                        '".$eventDB[$i][6]."',
                        ];\r\n";
                }
            ?>

            for (var j = 0; j < locations.length; j++) {
                var event = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[j][4], locations[j][5]),
                    map: map,
                    icon: '../media/map-marker-orange.png',
                    animation:google.maps.Animation.DROP,
                });

                google.maps.event.addListener(event, 'click', (function(event, j) {
                    return function() {
                        var eventName = new google.maps.InfoWindow({
                            content: locations[j][1]
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

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQO1FBU7ngY0Wv20d3-gPI1sj5_ApCZ3M&callback=myMap"></script>

</div>

