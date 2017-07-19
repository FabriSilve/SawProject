    function showValue(id, newValue)
    {
        document.getElementById(id).innerHTML=newValue+" ";
    }

    function searchEvents() {
        urlSimple = "../script/eventsSearcher.php";
        if(document.getElementById('position').value === "")
            position = "default";
        else
            position = document.getElementById('position').value;
        distance = document.getElementById('distance').value;
        days = document.getElementById('days').value;
        //console.info("distance "+distance+" days "+days+" position= "+position);
        url = urlSimple+"?position="+position+"&distance="+distance+"&days="+days;
        //console.info(url);
        xhr = getXMLHttpRequestObject();
        xhr.onreadystatechange = searchCallback;
        xhr.open('GET',url,true);
        xhr.send(null);
    }

    function searchCallback() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                if (xhr.responseText !== null) {
                    console.info("respose is: " + xhr.responseText);
                    events = JSON.parse(xhr.responseText);
                    console.info(events[0].lat+" "+events[0].lon);
                    showMap(events[0].lat, events[0].lon);
                    drawEventsList();
                }
                else
                    alert("Ajax error: no data received");
            }
            else
                alert("Ajax error: respose -> " + xhr.statusText);
        }
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

