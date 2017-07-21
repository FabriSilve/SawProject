function drawEventsList() {
    //todo ottimizzare cicli
    text = '<div class="container-fluid bg-3 text-center">';
    text += '<div class="row">';
    numEvents = events.length;
    if(numEvents <= 1) {
        text += '<div class="col-sm-12 marginMin text-center">';
        text += '<div class="liteBackground radiusDiv">';
        text += '<h3>Nessun Evento</h3>';
        text += '</div></div>';
    }else{
        for (i = 1; i < 5; i++) {
            if (i >= numEvents) {
                break;
            }
            text += '<div class="col-sm-3 marginBottom" id="' + events[i].id + '">';
            text += '<div class="liteBackground radiusDiv">';
            text += '<p ><h2>' + events[i].name + '</h2>';
            text += '<h4>' + events[i].day + '</h4></p>';
            text += '<img src = "' + events[i].image + '" class="img-responsive eventImage"  alt ="Image">';
            text += '<p>' + events[i].description + '</p>';
            text += '<input id="'+events[i].id+'" type="checkbox" title="Follow" onchange="updateFollowed('+events[i].id+');">';
            text += '</div></div>';

        }
        text += '</div></div>';

        if (numEvents > 5) {
            text += '<div class="container-fluid bg-3 text-center">';
            text += '<div class="row">';
            for (i = 5; i < 9; i++) {
                if (i < numEvents) {
                    text += '<div class="col-sm-3 marginBottom" id="' + events[i].id + '">';
                    text += '<div class="liteBackground radiusDiv">';
                    text += '<p ><h2>' + events[i].name + '</h2>';
                    text += '<h4>' + events[i].day + '</h4></p>';
                    text += '<img src = "' + events[i].image + '" class="img-responsive eventImage" alt = "Image" >';
                    text += '<p>' + events[i].description + '</p>';
                    text += '<input id="'+events[i].id+'" class="star" type="checkbox" title="Follow" onchange="updateFollowed('+events[i].id+');">';
                    text += '</div></div>';
                }
            }
            text += '</div></div>';
        }
    }
    if (text !== null)
        document.getElementById('eventsList').innerHTML = text;
}

function updateFollowed(id) {
    var check = document.getElementById(""+id+"").value;
    console.info("check "+check);
    console.info("id "+id);
    urlSimple = "../script/updateFollowed.php";
    url = urlSimple+"?id="+id+"&check="+check+"&username="+owner;
    xhr = getXMLHttpRequestObject();
    xhr.onreadystatechange = updateCallback;
    xhr.open('GET',url,true);
    xhr.send(null);
}

function updateCallback() {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            if (xhr.responseText !== "") {
                console.info("respose is: " + xhr.responseText);
                if(xhr.responseText === "true")
                    console.info("followed")
                else
                    console.info("errore followed");
            }
            else {
                alert("Ajax error: no data received");
            }
        }
        else {
            alert("Ajax error: " + xhr.responseText);
        }
    }
}