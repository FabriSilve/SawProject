    function searchEvents() {
       if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(setLatLon, err);
       } else {
           console.error("geolocalizetion not supported");
           sendSearch(null,null);
       }
    }

    /**
    * esegue send message con valori lat e lon di geolocalization
    * @param position
    */
    function setLatLon(position) {
       lat = position.coords.latitude;
       lon = position.coords.longitude;
       sendSearch(lat, lon);
    }

    /**
    * gestisce errori di getCurrentPosition()
    * @param error
    */
    function err(error) {
       console.error("geolocalization error");
       sendSearch(null,null);
    }

    /**
     * invia la richiesta di ricerca con i parametri forniti dall'utente
     * @param lat
     * @param lon
     */
    function sendSearch(lat, lon) {
        urlSimple = "script/eventsSearcher.php";

        position = document.getElementById('position').value;
        distance = document.getElementById('distance').value;
        days = document.getElementById('days').value;

        url = urlSimple+"?position="+position+"&distance="+distance+"&days="+days+"&lat="+lat+"&lon="+lon;
        xhr = getXMLHttpRequestObject();
        xhr.onreadystatechange = searchCallback;
        xhr.open('GET',url,true);
        xhr.send(null);
        if(!hider){
            showFilter();
        }
    }

    /**
     * callback della ricerca degli eventi
     *  - inserisce gli eventi ricevuti in una variabile globale events
     *  - avvia scrittura mappa ed eventi
     */
    function searchCallback() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                if (xhr.responseText !== "") {
                    events = JSON.parse(xhr.responseText);
                    showMap(events[0].lat, events[0].lon);
                    drawEventsList();
                    document.getElementById("searchForm").scrollIntoView();
                }
                else {
                    console.error("Ajax error: no data received");
                    events = [];
                }
            }
            else {
                console.error("Ajax error: " + xhr.responseText);
                events = [];
            }
        }
    }

