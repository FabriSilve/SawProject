    function showValue(id, newValue) //TODO spostare in utils
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
        if(!hider) showFilter();
    }

    function searchCallback() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                if (xhr.responseText !== "") {
                    console.info("respose is: " + xhr.responseText);
                    events = JSON.parse(xhr.responseText);
                    //console.info(events[0].lat+" "+events[0].lon);
                    showMap(events[0].lat, events[0].lon);
                    drawEventsList();
                }
                else {
                    alert("Ajax error: no data received");
                    events = [{}];
                }
            }
            else {
                alert("Ajax error: " + xhr.responseText);
                events = [{}];
            }
        }
    }

