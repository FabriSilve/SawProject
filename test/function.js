/**
 * Created by Fabrizio on 21/05/2017.
 */
function checkLogin() {
    alert("check login");
    if(document.getElementById("loginUsername").value == "") {
        document.getElementById("loginUsername").focus();
        return false;
    }
    if(document.getElementById("loginPassword").value == "") {
        document.getElementById("loginPassword").focus();
        return false;
    }
    return true;
}

function checkReg() {
    alert("check reg");
    //non funziona test mail valida
    var pattern = new RegExp("[^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]]");

    if(document.getElementById("regUsername").value == "") {
        document.getElementById("regUsername").focus();
        return false;
    }
    if(document.getElementById("mail1").value == "" || /[^[a-z0-9_]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$]]/.test(document.getElementById("mail1").value)) {
        document.getElementById("mail1").focus();
        return false;
    }
    if(document.getElementById("mail2").value == "" || document.getElementById("mail1").value != document.getElementById("mail2").value) {
        document.getElementById("mail2").focus();
        return false;
    }
    if(document.getElementById("password1").value == "") {
        document.getElementById("password1").focus();
        return false;
    }

    if(document.getElementById("password2").value == "" || document.getElementById("password1").value != document.getElementById("password2").value) {
        document.getElementById("password2").focus();
        return false;
    }
    return true;
}

function showValue(newValue)
{
    document.getElementById("range").innerHTML=newValue+" km";
}

function checkSearch() {
    alert("check search");
    getLocation();
    return true;
}

//var x = document.getElementById("test");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(sendPosition);
    } else {
        alert("Geolocation non available!");
    }
}

function sendPosition(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    // document.getElementById("test").innerHTML="#"+lat+";"+lon;
    document.getElementById("lat").value = lat;
    document.getElementById("lon").value = lon;

}

function showPosition(lat, lon) {
    //test
    var locations = [
        ['You Are Here', lat, lon, 1],
        ['Bondi Beach', lat, lon+0.0001, 4],
        ['Coogee Beach', lat+0.0002, lon, 5],
        ['Cronulla Beach', lat-0.0001, lon-0.0001, 3],
        ['Manly Beach', lat-0.0002, lon-0.0002, 2]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: new google.maps.LatLng(lat, lon),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    var sog = new google.maps.Marker({
        position: new google.maps.LatLng(locations[0][1], locations[0][2]),
        animation:google.maps.Animation.BOUNCE,
        map: map
    });
    google.maps.event.addListener(sog, 'click', (function(sog, i) {
        return function() {
            infowindow.setContent(locations[0][0]);
            infowindow.open(map, sog);
        }
    })(sog, i));

    for (i = 1; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }

    //funge
    /*var myCenter = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
     var mapCanvas = document.getElementById("map");
     var mapOptions = {center: myCenter, zoom: 15};
     var map = new google.maps.Map(mapCanvas, mapOptions);
     var marker = new google.maps.Marker({
     position:myCenter,
     animation:google.maps.Animation.BOUNCE
     });
     marker.setMap(map);*/
}