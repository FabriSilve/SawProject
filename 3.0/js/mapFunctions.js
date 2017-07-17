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

        default:
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
        content:events[0].name
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

    for (var j = 1; j < events.length; j++) {
        var event = new google.maps.Marker({
            position: new google.maps.LatLng(events[j].lat, events[j].lon),
            map: map,
            icon: '../media/map-marker-orange.png',
            animation:google.maps.Animation.DROP,
        });

        google.maps.event.addListener(event, 'click', (function(event, j) {
            return function() {
                var eventName = new google.maps.InfoWindow({
                    content: events[j].name
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
                    document.getElementById(events[j].id).scrollIntoView();
                },5000);

            }
        })(event, j));
    }
}