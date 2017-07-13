    function showValue(id, newValue)
    {
        document.getElementById(id).innerHTML=newValue+" ";
    }

    function searchEvents() {
        alert("search");
        urlSimple = "eventsSearcher.php";
        if(document.getElementById('position').value === "")
            position = "default";
        else
            position = document.getElementById('position').value;
        distance = document.getElementById('distance').value;
        days = document.getElementById('days').value;
        console.info("distance "+distance+" days "+days+" position= "+position);
        url = urlSimple+"?position="+position+"&distance="+distance+"&days="+days;
        console.info(url);
        xhr = getXMLHttpRequestObject();
        xhr.onreadystatechange = ajaxCallback;
        xhr.open('GET',url,true);
        xhr.send(null);
    }

    function ajaxCallback() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                if (xhr.responseText != null) {
                    console.info("respose is: " + xhr.responseText);
                    document.getElementById('googleMaps').innerText = xhr.responseText;
                }
                else
                    alert("Ajax error: no data received");
            }
            else
                alert("Ajax error: " + xhr.statusText);
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

