function drawEventsList(check) {
    //todo ottimizzare cicli
    numEvents = events.length;
    if(numEvents <= 1) {
        text = '<div class="container-fluid bg-3 text-center">';
        text += '<div class="row">';
        text += '<div class="col-sm-12 marginMin text-center">';
        text += '<div class="liteBackground radiusDiv">';
        text += '<h3>Nessun Evento</h3>';
        text += '</div></div>';
    }else{
        text = '<div class="container-fluid bg-3">';
        for(j=1;j<numEvents;j++)
        {
            text += drawSingleEvent(events[j++], check);
        }
        text += "</div>";


        /*if (numEvents > 5) {
            text += '<div class="container-fluid bg-3 text-center">';
            text += '<div class="row">';
            for (i = 5; i < 9; i++) {
                if (i >= numEvents) {
                    break;
                }
                text += drawSingleEvent(events[i], check);
            }
            text += '</div></div>';
        }*/
    }
    if (text !== null)
        document.getElementById('eventsList').innerHTML = text;
}

function drawSingleEvent(event, check) {

    temp = '<div class="row" id="\' + event.id + \'">';
    if(owner !== "0" && check !== null) {
        temp += '<div class="marginLeftMiddle">';
        temp += '<input id="check' + event.id + '" type="checkbox" class=" star marginMin" title="Follow" onchange="updateFollowed(\'' + event.id + '\');"';
        if(check) {
            temp += ' checked ';
        }
        temp += '></div>';
    }
    temp += '<div class="col-sm-3 marginBottom">';
    temp += '<div class="liteBackground radiusDiv">';

    temp += '<h2 class="eventTitle">' + event.name+'</h2>';
    temp += '<h5>' + event.day + '</h5>';
    temp += '<h5>' + event.address + '</h5>';
    temp += '<img src = "' + event.image + '" class="img-responsive eventImage"  alt ="Image">';
    temp += '<p>' + event.description + '</p>';
    if(owner !== "0" && check !== null) {
        temp += '<p class="signaler marginMin" id="signal' + event.id + '" onclick="signalEvent(\'' + event.id + '\');">segnala</p>';
    }
    temp += '</div></div>';
    return temp;
}


