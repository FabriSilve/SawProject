function drawUserData(userData) {
    text  = '<div class="row text-right">';
    text += '   <div class="row">';
    text += '       <div class="col-sm-3 text-right">';
    text += '           <table class="table-responsive">';
    text += '               <tr><td>username:</td><td>'+userData.username+'</td></tr>';
    text += '               <tr><td>nome:</td><td>'+userData.name+'</td></tr>';
    text += '               <tr><td>cognome:</td><td>'+userData.surname+'</td></tr>';
    text += '               <tr><td>residenza:</td><td>'+userData.residence+'</td></tr>';
    text += '               <tr><td>link:</td><td>'+userData.link+'</td></tr>';
    text += '           </table>';
    text += '       </div>';
    text += '       <div class="col-sm-3 text-right">';
    text += '           <h5>'+userData.description+'</h5>';
    text += '       </div>';
    text += '       <div class="col-sm-6 text-right">';
    text += '           <table class="table-responsive">';
    text += '               <tr><td>eventi inseriti:</td><td>'+4+'</td></tr>';  //TODO implement
    text += '               <tr><td>fans:</td><td>'+10+'</td></tr>';  //TODO implement
    text += '               <tr><td>segue:</td><td>'+2+'</td></tr>';  //TODO implement
    text += '               <tr><td>segnalati:</td><td>'+0+'</td></tr>';  //TODO implement
    text += '           </table>';
    text += '       </div>';
    text += '   </div>';
    text += '</div>';

    document.getElementById('userData').innerHTML = text;
}


