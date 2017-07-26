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
            text += drawSingleEvent(j, check);
        }
        text += "</div>";
    }
    if (text !== null)
        document.getElementById('eventsList').innerHTML = text;
}

function drawSingleEvent(j, check) {
    event = events[j]
    temp = '<div class="row liteBackground radiusDiv marginBottom align-middle" id="' + event.id + '">';
    if(owner !== "0" && check !== null) {
        temp += '<div class="col-sm-1 vertical-middle">';
        temp += '<input id="check' + event.id + '" type="checkbox" class=" star marginMin" title="Follow" onchange="updateFollowed(\'' + event.id + '\');"';
        if(check) {
            temp += ' checked ';
        }
        temp += '></div>';
    }
    temp += '<div class="col-sm-3 text-center">';
    temp += '<h2 class="eventTitle">' + event.name+'</h2>';
    temp += '<h5>' + event.day + '</h5>';
    temp += '<h5>' + event.address + '</h5>';
    temp += '</div>';
    temp += '<div class="col-sm-3 text-center" id="divDesc'+j+'">';
    temp += '<h5>' + event.description + '</h5>';
    temp += '</div>';
    temp += '<div class="col-sm-4">';
    temp += '<img src = "' + event.image + '" class="img-responsive eventImage"  alt ="Image">';
    temp += '</div>';
    if(owner !== "0" && check !== null) {
        temp += '<div class="col-sm-1">';
        temp += '<img src="../media/segnala.png" id="signal' + event.id + '" onclick="signalEvent(\'' + event.id + '\');">';
        temp += '</div>';
    } else if(owner !== "0" && check === null) {
        temp += '<div class="col-sm-1 text-right"></div>';
        temp += '<div class="col-sm-1 text-right">';
        temp += '<span id="modifySave'+j+'">';
        temp += '<img src="../media/modify.png" id="modify' + event.id + '" onclick="eventModify(' + j + ');">';
        temp += '</span>';
        temp += '<br><br>';
        temp += '<img src="../media/delete.png" id="delete' + event.id + '" onclick="alert(\'' + event.id + '\');">';
        temp += '</div>';
    }
    temp += '</div>';
    return temp;
}


