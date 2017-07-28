/**
 * disegna all'interno del div 'eventList' le informazioni degli eventi
 * nella variabile globale events
 * @param check
 */
function drawEventsList(check) {
    if(events.length <= 1) {
        text  = '<div class="row">';
        text += '   <div class="col-sm-12 marginMin text-center liteBackground borderRadius">';
        text += '       <h3>Nessun Evento</h3>';
        text += '   </div>';
        text += '</div>';
    }else{
        text = '';
        for(j=1;j<events.length;j++)
        {
            text += drawSingleEvent(j, check);
        }
    }
    if (text !== null)
        document.getElementById('eventsList').innerHTML = text;
}

/**
 * disegna un singolo evento
 * @param j -> indice array events
 * @param check -> ne seguito o meno
 * @returns {string|*|string|string} -> stringa contenente l'html per disegnare un singolo evento
 */
function drawSingleEvent(j, check) {
    event = events[j];
    temp = '<div class="row liteBackground borderRadius marginBottom align-middle" id="' + event.id + '">';
    if(owner !== "0" && check !== null) {
        temp += '<div class="col-sm-1">';
        temp += '<input id="check' + event.id + '" type="checkbox" class="star marginMin" title="Follow" onchange="updateFollowed(\'' + event.id + '\');"';
        if(check) {
            temp += ' checked ';
        }
        temp += '></div>';
    }
    temp += '<div class="col-sm-3 text-center" id="divData">';
    temp += '<h2 class="eventTitle">' + event.name+'</h2>';
    temp += '<h3>' + event.day + '</h3>';
    temp += '<h3>' + event.address + '</h3>';
    if(owner !== "0" && check !== null) {
        temp += '<a href="pageOtherProfile.php?username=' + event.owner + '" target="blank" class="link"><h4>' + event.owner + '</h4></a>';
    }
    temp += '</div>';
    temp += '<div class="col-sm-3 text-center" id="divDesc'+j+'">';
    temp += '<h4>' + event.description + '</h4>';
    temp += '</div>';
    temp += '<div class="col-sm-4">';
    temp += '<img src = "' + event.image + '" class="img-responsive eventImage"  alt ="image">';
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
        temp += '<img src="../media/delete.png" id="delete' + event.id + '" onclick="eventDelete(' + j + ');">';
        temp += '</div>';
    }
    temp += '</div>';
    return temp;
}


