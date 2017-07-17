function drawEventsList() {
    alert("eventlist");
    //todo ottimizzare cicli
    text = '<div class="container-fluid bg-3 text-center">';
    text += '<div class="row">';
    max = events.length;
    for (i = 0; i < 4; i++) {
        if(i < max) {
            text += '<div class="col-sm-3 marginBottom" id="'+events[i].id+'">';
            text += '<div class="liteBackground radiusDiv">';
            text += '<p ><h2>'+events[i].name+'</h2>';
            text += '<h4>'+events[i].day+'</h4></p>';
            text += '<img src = "'+events[i].image+'" class="img-responsive" style = "width:100%" alt = "Image" >';
            text += '<p>'+events[i].description+'</p>';
            text += '</div></div>';
        }
    }
    text += '</div></div>';

    text = '<div class="container-fluid bg-3 text-center">';
    text += '<div class="row">';
    for (i = 4; i < 8; i++) {
        if(i < max) {
            text += '<div class="col-sm-3 marginBottom" id="'+events[i].id+'">';
            text += '<div class="liteBackground radiusDiv">';
            text += '<p ><h2>'+events[i].name+'</h2>';
            text += '<h4>'+events[i].day+'</h4></p>';
            text += '<img src = "'+events[i].image+'" class="img-responsive" style = "width:100%" alt = "Image" >';
            text += '<p>'+events[i].description+'</p>';
            text += '</div></div>';
        }
    }
    text += '</div></div>';
    console.info(text);
    document.getElementById('eventslist').innerHTML = text;
}
