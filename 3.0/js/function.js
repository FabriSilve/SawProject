/**
 * Created by Fabrizio on 23/05/2017.
 */
function checkLogin() {
    alert("check login");
    if(document.getElementById("loginUsername").value === "") {
        document.getElementById("loginUsername").focus();
        return false;
    }
    if(document.getElementById("loginPassword").value === "") {
        document.getElementById("loginPassword").focus();
        return false;
    }
    return true;
}

function checkReg() {
    alert("check reg");
    //non funziona 2.0 mail valida
    var pattern = new RegExp("[^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]]");

    if(document.getElementById("username").value === "") {
        document.getElementById("username").focus();
        return false;
    }
    if(document.getElementById("mail1").value === "" ) {
        document.getElementById("mail1").focus();
        return false;
    }
    if(document.getElementById("mail2").value === "" || document.getElementById("mail1").value !== document.getElementById("mail2").value) {
        document.getElementById("mail2").focus();
        return false;
    }
    if(document.getElementById("password1").value === "") {
        document.getElementById("password1").focus();
        return false;
    }

    if(document.getElementById("password2").value === "" || document.getElementById("password1").value !== document.getElementById("password2").value) {
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
    var geocoder = new google.maps.Geocoder();
    var address = document.getElementById("position").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status === 'OK') {
            showMap(results[0].geometry.location);
            /*var marker = new google.maps.Marker({
             map: map,
             position: results[0].geometry.location*/
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });

}

function codeAddress(address) {
    geocoder.geocode( { 'address': address}, function(results, status){
        if(status === google.maps.GeocoderStatus.OK){
            map.setCenter(results[0].geometry.location);
            marker.setPosition(results[0].geometry.location);
            lat =  results[0].geometry.location.lat();
            lon = results[0].geometry.location.lng();
        }else{
            alert("Geocode ha rilevato questo errore: " + status);
        }
    });
}

var hider = true;
function showFilter() {
    if(hider) {
        document.getElementById("filter").style.display = "block";
        hider = false;
    } else {
        document.getElementById("filter").style.display = "none";
        hider = true;
    }
}