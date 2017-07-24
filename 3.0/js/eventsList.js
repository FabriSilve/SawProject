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
            text += '<p ><h2>' + events[i].name;
            console.info(owner);
            if(owner !== "0")
                text += '<input id="check'+events[i].id+'" type="checkbox" title="Follow" onchange="updateFollowed(\''+events[i].id+'\');">';
            text += '</h2><h4>' + events[i].day + '</h4></p>';
            text += '<img src = "' + events[i].image + '" class="img-responsive eventImage"  alt ="Image">';
            text += '<p>' + events[i].description + '</p>';
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
                    text += '<p ><h2>' + events[i].name;
                    // TODO text += '<input id="\'+events[i].id+\'" type="checkbox" title="Follow" onchange="updateFollowed("'+events[i].id+'");">';
                    text += '</h2><h4>' + events[i].day + '</h4></p>';
                    text += '<img src = "' + events[i].image + '" class="img-responsive eventImage" alt = "Image" >';
                    text += '<p>' + events[i].description + '</p>';
                    //text += '<input id="'+events[i].id+'" type="checkbox" title="Follow" onchange="updateFollowed("'+events[i].id+'");">';
                    text += '</div></div>';
                }
            }
            text += '</div></div>';
        }
    }
    if (text !== null)
        document.getElementById('eventsList').innerHTML = text;
}

//TODO spostare in file updateFollowed.js

function updateFollowed(num) {
    id = "check"+num;
    check = document.getElementById(id).checked;
    console.info("check "+check);
    console.info("id "+id);
    console.info(owner);
    urlSimple = "script/updateFollowed.php";
    url = urlSimple+"?id="+num+"&check="+check+"&username="+owner;
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
