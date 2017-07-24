function drawEventsList(check) {
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
            text += drawSingleEvent(events[i], check);
        }
        text += '</div></div>';

        if (numEvents > 5) {
            text += '<div class="container-fluid bg-3 text-center">';
            text += '<div class="row">';
            for (i = 5; i < 9; i++) {
                if (i >= numEvents) {
                    break;
                }
                text += drawSingleEvent(events[i], check);
            }
            text += '</div></div>';
        }
    }
    if (text !== null)
        document.getElementById('eventsList').innerHTML = text;
}

function drawSingleEvent(event, check) {
    temp = '<div class="col-sm-3 marginBottom" id="' + event.id + '">';
    temp += '<div class="liteBackground radiusDiv">';
    if(owner !== "0") {
        temp += 'segui: <input id="check' + event.id + '" type="checkbox" class="marginMin" title="Follow" onchange="updateFollowed(\'' + event.id + '\');"';
        if(check) {
            temp += ' checked ';
        }
        temp += '></p>';
    }
    temp += '<h2 class="eventTitle">' + event.name+'</h2>';
    temp += '<h5>' + event.day + '</h5>';
    temp += '<h5>' + event.address + '</h5>';
    temp += '<img src = "' + event.image + '" class="img-responsive eventImage"  alt ="Image">';
    temp += '<p>' + event.description + '</p>';
    if(owner !== "0") {
        temp += '<p class="signaler marginMin" id="signal' + event.id + '" onclick="signalEvent(\'' + event.id + '\');">segnala</p>';
    }
    temp += '</div></div>';
    return temp;
}


