function drawEventsList() {
    //todo ottimizzare cicli
    text = '<div class="container-fluid bg-3 text-center">';
    text += '<div class="row">';
    max = events.length;
    console.info(max);
    for (i = 1; i < 5; i++) {
        if(i >= max) {
            break;
        }
        text += '<div class="col-sm-3 marginBottom" id="'+events[i].id+'">';
        text += '<div class="liteBackground radiusDiv">';
        text += '<p ><h2>'+events[i].name+'</h2>';
        text += '<h4>'+events[i].day+'</h4></p>';
        text += '<img src = "'+events[i].image+'" class="img-responsive" style="width:100%" alt ="Image">';
        text += '<p>'+events[i].description+'</p>';
        text += '</div></div>';

    }
    text += '</div></div>';

    if(max > 5) {
        text += '<div class="container-fluid bg-3 text-center">';
        text += '<div class="row">';
        for (i = 5; i < 9; i++) {
            if (i < max) {
                text += '<div class="col-sm-3 marginBottom" id="' + events[i].id + '">';
                text += '<div class="liteBackground radiusDiv">';
                text += '<p ><h2>' + events[i].name + '</h2>';
                text += '<h4>' + events[i].day + '</h4></p>';
                text += '<img src = "' + events[i].image + '" class="img-responsive" style = "width:100%" alt = "Image" >';
                text += '<p>' + events[i].description + '</p>';
                text += '</div></div>';
            }
        }
        text += '</div></div>';
    }
    if(text !== null)
        document.getElementById('eventsList').innerHTML = text;
}
