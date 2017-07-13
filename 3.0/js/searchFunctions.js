    function showValue(id, newValue)
    {
        document.getElementById(id).innerHTML=newValue+" ";
    }

    function searchEvents() {
        alert("search");
        var urlSimple = "eventsSearcher.php";
        var position = document.getElementById('position').value;
        var distance = document.getElementById('distance').value;
        var days = document.getElementById('days').value;
        console.info("distance "+distance+" days "+days+" position= "+position);
        var request = getXMLHttpRequestObject();
        var url = urlSimple+"?position="+position+"&distance="+distance+"&days="+days;
        request.open('GET',url,true);
        request.onreadystatechange = ajaxCallback;
        request.send();

        /*var geocoder = new google.maps.Geocoder();
         var address = document.getElementById("position").value;
         geocoder.geocode( { 'address': address}, function(results, status) {
         if (status === 'OK') {
         showMap(results[0].geometry.location);
         /*var marker = new google.maps.Marker({
         map: map,
         position: results[0].geometry.location
         } else {
         alert('Geocode was not successful for the following reason: ' + status);
         }
         });
         */
    }

    function ajaxCallback() {
        if (request.readyState == 4) {
            if (request.status == 200) {
                if (request.responseText != null)
                    res.innerHTML = request.responseText;
                else alert("Ajax error: no data received");
            }
        else
            alert("Ajax error: " + request.statusText);
        }
    }

    function getXMLHttpRequestObject() {
        var request = null;
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // Older IE.
            request = new ActiveXObject("MSXML2.XMLHTTP.3.0");
        }
        return request;
    }

    /*function codeAddress(address) {
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
     }*/

